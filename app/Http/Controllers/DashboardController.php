<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Drug;
use App\Models\Appointment;
use App\Models\Bill;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $userId = Auth::id();

        return Inertia::render('Dashboard', [
            'Kpis' => [
                'PatientsAll' => Patient::all()->count(),
                'DrugsAll' => Drug::all()->count(),
                'AppointmentsAll' => Appointment::where('doctor_id', $userId)->count(),
                'TotalBilling' => Bill::where('users_id', $userId)->sum('total'),
            ],
        ]);
    }
}
