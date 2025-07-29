<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use App\Models\Patient;
use App\Models\User;
use App\Models\Drug;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = appointment::query()->select('appointments.*');
        $lastDays = $request->input('lastDays', '30');
        if ($search) {
            $query->where(function (Builder $q) use ($search) {
                $q->whereRaw('appointments.title LIKE ?', ['%' . $search . '%'])
                    ->orWhereRaw('appointments.doctor_id LIKE ?', ['%' . $search . '%'])
                    ->orWhereRaw('appointments.patient_id LIKE ?', ['%' . $search . '%'])
                    ->orWhereRaw('appointments.date LIKE ?', ['%' . $search . '%'])
                    ->orWhereRaw('appointments.attended LIKE ?', ['%' . $search . '%']);
            });
        }
        if ($lastDays && $lastDays !== 'all') {
            if (is_numeric($lastDays)) {
                $dateFrom = Carbon::now()->subDays((int) $lastDays)->startOfDay();
                $query->where('created_at', '>=', $dateFrom);
            } elseif ($lastDays === 'month') {
                $dateFrom = Carbon::now()->startOfMonth();
                $query->where('created_at', '>=', $dateFrom);
            } elseif ($lastDays === 'year') {
                $dateFrom = Carbon::now()->startOfYear();
                $query->where('created_at', '>=', $dateFrom);
            }
        }
        $appointments = $query->with('patient', 'doctor')->get();
        return Inertia::render('Appointment/index', ['appointments' => $appointments, 'filters' => [
            'search' => $search,
            'lastDays' => $lastDays
        ],]);
    }

    public function create(Request $request)
    {
        $patients = $request->patient;
        $doctors = User::all();
        $drugs = Drug::all();
        return Inertia::render('Appointment/create', ['patients' => $patients, 'doctors' => $doctors, 'drugs' => $drugs]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'doctor_id' => 'required|exists:users,id',
            'patient_id' => 'required|exists:patients,id',
            'drug_id' => 'required|exists:users,id',
            'attended' => 'required|boolean',
            'starttime'  => ['required', 'date_format:H:i', 'before:endtime'],
            'endtime'    => ['required', 'date_format:H:i', 'after:starttime'],
            'date' => 'required|date',
            // 'endtime' => 'required|date',
            // 'starttime' => 'required|date',
            'active' => 'required|boolean',
        ]);
        Log::info($validated);
        appointment::create($validated);
        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
    }

    public function show(string $id)
    {
        $appointment = appointment::findOrFail($id);
        return Inertia::render('Appointment/show', ['appointment' => $appointment]);
    }

    public function edit(string $id)
    {
        $appointment = appointment::findOrFail($id);
        $patients = Patient::all();
        $drugs = Drug::all();
        $doctors = User::all();
        return Inertia::render('Appointment/edit', ['appointment' => $appointment, 'patients' => $patients, 'doctors' => $doctors, 'drugs' => $drugs]);
    }

    public function update(Request $request, string $id)
    {
        $appointment = appointment::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'doctor_id' => 'required|exists:users,id',
            'drug_id' => 'required|exists:users,id',
            // 'patient_id' => 'required|exists:patients,id',
            'attended' => 'required|boolean',
            'date' => 'required|date',
            'starttime' => ['required', 'date_format:H:i', 'before:endtime'],
            'endtime' => ['required', 'date_format:H:i', 'after:starttime'],
            // 'endtime' => 'required|date',
            // 'starttime' => 'required|date',
            'active' => 'required|boolean',
        ]);
        Log::info($validated);
        $appointment->update($validated);
        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
