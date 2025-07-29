<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use App\Models\Patient;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class PatientController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Patient::query()->select('patients.*');
        $lastDays = $request->input('lastDays', '30');

        if ($search) {
            $query->where(function (Builder $q) use ($search) {
                $q->whereRaw('patients.name LIKE?' , ['%' . $search . '%'])
                    ->orWhereRaw('patients.last_name LIKE ?', ['%' . $search . '%'])
                    ->orWhereRaw('patients.date_of_birth LIKE ?', ['%' . $search . '%'])
                    ->orWhereRaw('patients.insurance LIKE ?', ['%' . $search . '%'])
                    ->orWhereRaw('patients.place_of_birth LIKE ?', ['%' . $search . '%']);
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
        $patients = $query->with('medicalhistory')->get();
        return Inertia::render('Patient/index', ['patients' => $patients, 'filters' => [
        'search' => $search,'lastDays' => $lastDays],]);
    }

    public function create()
    {
        return Inertia::render('Patient/create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'DNI' => 'required|string|max:255|unique:patients,DNI',
            'name' => 'required|string|max:255',
            'sur_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'second_sur_name' => 'nullable|string|max:255',
            'date_of_birth' => 'required|date',
            'phone_number' => 'nullable|string|max:20',
            'nacionality' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'gender' => 'required|string|max:50',
            'sex' => 'required|string|max:50',
            'marital_status' => 'required|string|max:50',
            'ocupation' => 'nullable|string|max:255',
            'place_of_birth' => 'required|string|max:255',
            'blood_type' => 'nullable|string|max:3',
            'insurance' => 'nullable|string|max:255',
            'place_of_birth' => 'required|string|max:255',
            'status' => 'boolean',
            'email' => 'required|email|max:255|unique:patients,email',
        ]);
        Patient::create($validated);
        
        return redirect()->route('patients.index')->with('success', 'Paciente creado correctamente.');
    }

    public function show()
    {
        // $patient = Patient::findOrFail($id);
        // return Inertia::render('Patient/show', ['showpatients' => $patient]);
        return Inertia::render('Patient/show');
    }

    public function edit(string $id)
    {
        $patient = Patient::findOrFail($id);
        return Inertia::render('Patient/edit', ['Patients' => $patient]);
        
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'DNI' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'sur_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'second_sur_name' => 'nullable|string|max:255',
            'date_of_birth' => 'required|date',
            'phone_number' => 'nullable|string|max:20',
            'nacionality' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'gender' => 'required|string|max:50',
            'sex' => 'required|string|max:50',
            'marital_status' => 'required|string|max:50',
            'ocupation' => 'nullable|string|max:255',
            'place_of_birth' => 'required|string|max:255',
            'blood_type' => 'nullable|string|max:3',
            'insurance' => 'nullable|string|max:255',
            'place_of_birth' => 'required|string|max:255',
            'status' => 'boolean',
            'email' => 'required|email|max:255',
        ]); 
        $patient = Patient::findOrFail($id);
        $patient->update($validated);
        
        return redirect()->route('patients.index')->with('success', 'Paciente actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        //
    }
}
