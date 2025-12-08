<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class DrugController extends Controller
{
    public function index(Request $request)
    {        
        $search = $request->input('search');
        $query = Drug::query()->select('drugs.*');
        $lastDays = $request->input('lastDays', '30');
        
            if ($search) {
            $query->where(function (Builder $q) use ($search) {
                $q->whereRaw('drugs.name LIKE ?', ['%' . $search . '%'])
                    ->orWhereRaw('drugs.description LIKE ?', ['%' . $search . '%'])
                    ->orWhereRaw('drugs.route LIKE ?', ['%' . $search . '%'])
                    ->orWhereRaw('drugs.frequency LIKE ?', ['%' . $search . '%'])
                    ->orWhereRaw('drugs.duration LIKE ?', ['%' . $search . '%']);
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

        $drugs = $query->paginate(10);
        return Inertia::render('Drug/index', ['drugs' => $drugs, 'filters' => [
                'search' => $search,'lastDays' => $lastDays],]);
    }

    public function create()
    {
        return Inertia::render('Drug/create'); 
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'route' => 'required|string|max:255',
            'frequency' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
        ]);
        Drug::create($validated);

        return redirect()->route('drugs.index')->with('success', 'Medicamento creado correctamente.');
    }
    public function show(string $id)
    {
        $drugs = Drug::findOrFail($id);
        return Inertia::render('Drug/show', ['drugs' => $drugs]);
    }

    public function edit(string $id)
    {
        $drugs = Drug::findOrFail($id);
        return Inertia::render('Drug/edit', ['drugs' => $drugs]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
        'route' => 'required|string|max:255',
        'frequency' => 'required|string|max:255',
        'duration' => 'required|string|max:255',
        ]);
        $drugs = Drug::findOrFail($id);
        $drugs->update($validated);
        return redirect()->route('drugs.index')->with('success', 'Medicamento actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
