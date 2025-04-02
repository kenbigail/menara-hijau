<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Room;
use Carbon\Carbon;
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
            ->where('status', '!=', 'finished') // Always exclude finished tenants
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
            'email' => 'required|email|unique:tenants',
            'phone' => 'required|string|max:20',
            'id_room' => 'required|exists:rooms,id',
            'id_floor' => 'required|exists:floors,id',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_start'
        ]);

        // Create tenant first without status
        $tenant = Tenant::create($validated);

        // Then determine and update status
        $today = now()->startOfDay();
        $start = Carbon::parse($tenant->date_start)->startOfDay();
        $end = Carbon::parse($tenant->date_end)->startOfDay();

        if ($end->lessThan($today)) {
            $status = 'finished';
        } elseif ($today->between($start, $end)) {
            $status = 'ongoing';
        } else {
            $status = 'waiting';
        }

        $tenant->update(['status' => $status]);

        return back()->with('success', "Tenant created! Status: {$status}");
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
            'date_end' => 'required|date|after_or_equal:date_start'
        ]);

        // Update status immediately when dates change
        $today = Carbon::today();
        $start = Carbon::parse($validated['date_start']);
        $end = Carbon::parse($validated['date_end']);

        if ($today->greaterThan($end)) {
            $validated['status'] = 'finished';
        } elseif ($today->greaterThanOrEqualTo($start) && $today->lessThanOrEqualTo($end)) {
            $validated['status'] = 'ongoing';
        } else {
            $validated['status'] = 'waiting';
        }

        $tenant->update($validated);

        return redirect()->route('tenants.index')
            ->with('success', 'Tenant updated! Status set to: '.$validated['status']);
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
