<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Room;
use Illuminate\Http\Request;

class TenantDashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = $request->input('status', 'all');

        $tenants = Tenant::with(['room', 'floor'])
            ->when($status !== 'all', function($query) use ($status) {
                return $query->where('status', $status);
            })
            ->latest()
            ->get();

        $availableRooms = Room::with('floor')
                            ->where('availability', 'available')
                            ->get();

        return view('admin.tenants.index', compact('tenants', 'availableRooms', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_tenant' => 'required|string|max:255',
            'email' => 'required|email|unique:tenants,email',
            'phone' => 'required|string|max:20',
            'id_room' => 'required|exists:rooms,id',
            'id_floor' => 'required|exists:floors,id',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_start',
            'status' => 'required|in:ongoing,waiting,finished',
        ]);

        try {
            // Create tenant without modifying room availability
            $tenant = Tenant::create($validated);

            return redirect()->route('tenants.index')
                ->with('success', 'Tenant successfully added');

        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Failed to add Tenant: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tenant = Tenant::with(['room', 'floor'])->findOrFail($id);
        return view('admin.tenants.detail', compact('tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tenant = Tenant::findOrFail($id);
        $rooms = Room::with('floor')->get();
        return view('admin.tenants.edit', compact('tenant', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tenant = Tenant::findOrFail($id);

        $validated = $request->validate([
            'name_tenant' => 'required|string|max:255',
            'email' => 'required|email|unique:tenants,email,'.$id,
            'phone' => 'required|string|max:20',
            'id_room' => 'required|exists:rooms,id',
            'id_floor' => 'required|exists:floors,id',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_start',
            'status' => 'required|in:ongoing,waiting,finished',
        ]);

        try {
            $tenant->update($validated);

            return redirect()->route('tenants.index')
                ->with('success', 'Tenant data updated successfully');

        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Failed to update tenant: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tenant = Tenant::findOrFail($id);

        try {
            $tenant->delete();

            return redirect()->route('tenants.index')
                ->with('success', 'Tenant deleted successfully');

        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete tenant: ' . $e->getMessage());
        }
    }
}
