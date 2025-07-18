<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\MedicalHistory;

class MedicalHistoryController extends Controller
{

    public function index()
    {
        return Inertia::render('MedicalHistory/index');
    }


    public function create()
    {
        return Inertia::render('MedicalHistory/create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        return Inertia::render('MedicalHistory/edit');
    }


    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
