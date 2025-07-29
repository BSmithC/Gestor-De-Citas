<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\MedicalHistory;
use App\Models\Patient;
use App\Models\User;
use App\Models\Drug;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class MedicalHistoryController extends Controller
{

    public function index()
    {
        $medicalhistories = MedicalHistory::with(['patient', 'doctor', 'drug'])->get();
        return Inertia::render('MedicalHistory/index', ['medicalhistories' => $medicalhistories]);
    }


    public function create(Request $request)
    {
        $patients = $request->patient;
        $doctors = User::all();
        $drugs = Drug::all();
        return Inertia::render('MedicalHistory/create', ['patients' => $patients, 'doctors' => $doctors, 'drugs' => $drugs]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'diagnosis' => 'required|string|max:255',
            'reason' => 'required|string|max:255',
            'symptoms' => 'required|string|max:255',
            'diagnosis_description' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'blood_pressure' => 'required|string|max:255',
            'temperature' => 'required|string|max:255',
            'weight' => 'required|string|max:255',
            'heart_rate' => 'required|string|max:255',
            'observation' => 'required|string|max:255',
            'patient_id' => 'required|exists:patients,id',
            'drug_id' => 'required|exists:drugs,id',
            'doctor_id' => 'required|exists:users,id',
        ]);
        MedicalHistory::create($validated);
        return redirect()->route('medicalhistories.index')->with('success', 'Historia medico creado correctamente.');
    }

    public function show(string $id)
    {
        $medicalhistories = MedicalHistory::findOrFail($id);
        return Inertia::render('MedicalHistory/show', ['medicalhistories' => $medicalhistories]);
    }


    public function edit(string $id)
    {
        $doctors = User::all();
        $drugs = Drug::all();
        $medicalhistories = MedicalHistory::findOrFail($id);
        $medicalhistories->load('doctor','drug','patient');
        return Inertia::render('MedicalHistory/edit', ['medicalhistories' => $medicalhistories, 'doctors' => $doctors,'drugs' => $drugs
        ]);
    }


    public function update(Request $request, string $id)
    {
        $medicalhistory = MedicalHistory::findOrFail($id);
        $validated = $request->validate([
            'diagnosis' => 'required|string|max:255',
            'reason' => 'required|string|max:255',
            'symptoms' => 'required|string|max:255',
            'diagnosis_description' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'blood_pressure' => 'required|string|max:255',
            'temperature' => 'required|string|max:255',
            'weight' => 'required|string|max:255',
            'heart_rate' => 'required|string|max:255',
            'observation' => 'required|string|max:255',
            'drug_id' => 'required|exists:drugs,id',
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:users,id',
        ]);
        Log::info($validated);
        $medicalhistory->update($validated);
        return redirect()->route('medicalhistories.index')->with('success', 'Appointment updated successfully.');
    }

    public function destroy(string $id)
    {
        //
    }
}
