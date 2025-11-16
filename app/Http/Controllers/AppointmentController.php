<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\appointment;
=======
use App\Models\Appointment;
>>>>>>> 75b04bc (Modificaciones con los show, paginaciones y index)
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
<<<<<<< HEAD
        $query = appointment::query()->select('appointments.*');
=======
        $query = Appointment::query()->select('appointments.*');
>>>>>>> 75b04bc (Modificaciones con los show, paginaciones y index)
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
<<<<<<< HEAD
        $appointments = $query->with('patient', 'doctor')->get();
=======
        $appointments = $query->with('patient', 'doctor')->paginate(10);
>>>>>>> 75b04bc (Modificaciones con los show, paginaciones y index)
        return Inertia::render('Appointment/index', ['appointments' => $appointments, 'filters' => [
            'search' => $search,
            'lastDays' => $lastDays
        ],]);
    }

    public function create(Request $request)
<<<<<<< HEAD
    {
        $patients = $request->patient;
=======
    {   
        $patients = Patient::all();
>>>>>>> 75b04bc (Modificaciones con los show, paginaciones y index)
        $doctors = User::all();
        $drugs = Drug::all();
        return Inertia::render('Appointment/create', ['patients' => $patients, 'doctors' => $doctors, 'drugs' => $drugs]);
    }

    public function store(Request $request)
    {
<<<<<<< HEAD
=======
    Log::info($request);
>>>>>>> 75b04bc (Modificaciones con los show, paginaciones y index)
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'doctor_id' => 'required|exists:users,id',
            'patient_id' => 'required|exists:patients,id',
<<<<<<< HEAD
            'drug_id' => 'required|exists:users,id',
=======
>>>>>>> 75b04bc (Modificaciones con los show, paginaciones y index)
            'attended' => 'required|boolean',
            'starttime'  => ['required', 'date_format:H:i', 'before:endtime'],
            'endtime'    => ['required', 'date_format:H:i', 'after:starttime'],
            'date' => 'required|date',
<<<<<<< HEAD
            // 'endtime' => 'required|date',
            // 'starttime' => 'required|date',
=======
>>>>>>> 75b04bc (Modificaciones con los show, paginaciones y index)
            'active' => 'required|boolean',
        ]);
        Log::info($validated);
        appointment::create($validated);
        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
    }

    public function show(string $id)
    {
<<<<<<< HEAD
        $appointment = appointment::findOrFail($id);
        return Inertia::render('Appointment/show', ['appointment' => $appointment]);
=======
        $appointment = Appointment::findOrFail($id);
        return Inertia::render('Appointment/show', ['appointments' => $appointment]);
>>>>>>> 75b04bc (Modificaciones con los show, paginaciones y index)
    }

    public function edit(string $id)
    {
<<<<<<< HEAD
        $appointment = appointment::findOrFail($id);
        $patients = Patient::all();
        $drugs = Drug::all();
        $doctors = User::all();
        return Inertia::render('Appointment/edit', ['appointment' => $appointment, 'patients' => $patients, 'doctors' => $doctors, 'drugs' => $drugs]);
=======
        $appointment = Appointment::findOrFail($id);
        $patients = Patient::all();
        $drugs = Drug::all();
        $doctors = User::all();
        return Inertia::render('Appointment/edit', ['appointments' => $appointment, 'patients' => $patients, 'doctors' => $doctors, 'drugs' => $drugs]);
>>>>>>> 75b04bc (Modificaciones con los show, paginaciones y index)
    }

    public function update(Request $request, string $id)
    {
<<<<<<< HEAD
        $appointment = appointment::findOrFail($id);
=======
        $appointment = Appointment::findOrFail($id);
>>>>>>> 75b04bc (Modificaciones con los show, paginaciones y index)
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'doctor_id' => 'required|exists:users,id',
            'drug_id' => 'required|exists:users,id',
            // 'patient_id' => 'required|exists:patients,id',
            'attended' => 'required|boolean',
            'date' => 'required|date',
            'starttime' => ['required', 'date_format:H:i', 'before:endtime'],
            'endtime' => ['required', 'date_format:H:i', 'after:starttime'],
<<<<<<< HEAD
            // 'endtime' => 'required|date',
            // 'starttime' => 'required|date',
=======
>>>>>>> 75b04bc (Modificaciones con los show, paginaciones y index)
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
