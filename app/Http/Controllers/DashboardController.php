<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\User;
use App\Models\Appointment;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $patients = Patient::all();
        $doctors = User::all();
        $appointments = Appointment::all();

        return Inertia::render('Dashboard', [
            'patients' => $patients,
            'doctors' => $doctors,
            'appointments' => $appointments,
        ]);
    }
}
