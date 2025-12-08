<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Bill;
use App\Models\Drug;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
// use Illuminate\Support\;

class BillController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Bill::query()->select('bills.*');
        $lastDays = $request->input('lastDays', '30');
        if ($search) {
            $query->where(function (Builder $q) use ($search) {
                $q->whereRaw('bills.name LIKE ?', ['%' . $search . '%'])
                    ->orWhereRaw('bills.last_name LIKE ?', ['%' . $search . '%'])
                    ->orWhereRaw('bills.date_of_birth LIKE ?', ['%' . $search . '%'])
                    ->orWhereRaw('bills.insurance LIKE ?', ['%' . $search . '%'])
                    ->orWhereRaw('bills.place_of_birth LIKE ?', ['%' . $search . '%']);
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
        $bills = $query->with('drugs', 'patient', 'user', 'BillDetails')->paginate(10);
        return Inertia::render('Bill/index', ['bills' => $bills, 'filters' => ['search' => $search,
        'lastDays' => $lastDays],]);
    }

    public function create()
    {
        $patients = Patient::all();
        $users = User::all();
        $drugs = Drug::all();
        return Inertia::render('Bill/create',['patients' => $patients, 'users' => $users, 'drugs' => $drugs]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
        'form.drug_id' => 'required|exists:drugs,id',
        'form.itbis' => 'required|string|max:255',
        'form.sub_total' => 'required|string|max:255',
        'form.total' => 'required|string|max:255',
        'form.payment_type' => 'required|string|max:255',
        'form.status' => 'boolean',
        'form.patient_id' => 'required|exists:patients,id',
        'form.users_id' => 'required|exists:users,id',

        'details' => 'required|array',
        'details.*.service' => 'required|string|max:255',
        'details.*.hour' => 'required',
        'details.*.price' => 'required|numeric|min:0',
        ]);
        Log::info($validated);
        $bill = $validated['form'];
        $created_bill = Bill::create($bill);
        $created_bill->BillDetails()->createMany($validated['details']);
        return redirect()->route('bills.index')->with('success', 'Factura creada correctamente.');
    }

    public function show(string $id)
    {
        $bill = Bill::findOrFail($id);
        $bill->load('drugs', 'patient', 'user', 'BillDetails');
        return Inertia::render("Bill/show", ['bills' => $bill]);
    }

    public function edit(string $id)
    {
        $bill = Bill::findOrFail($id);
        $users = User::all();
        $drugs = Drug::all();
        $bill->load('drugs', 'user', 'BillDetails');
        return Inertia::render('Bill/edit', ['bills' => $bill, 'users' => $users, 'drugs' => $drugs]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
        'form.drug_id' => 'required|exists:drugs,id',
        'form.itbis' => 'required|string|max:255',
        'form.sub_total' => 'required|string|max:255',
        'form.total' => 'required|string|max:255',
        'form.payment_type' => 'required|string|max:255',
        'form.status' => 'boolean',
        'form.patient_id' => 'required|exists:patients,id',
        'form.users_id' => 'required|exists:users,id',

        'details' => 'required|array',
        'details.*.service' => 'required|string|max:255',
        'details.*.hour' => 'required',
        'details.*.price' => 'required|numeric|min:0',
        ]); 
        $bill = Bill::findOrFail($id);
        $formData = $request->input('form');
        $bill->update($formData);

        $bill->BillDetails()->delete();
        $bill->BillDetails()->createMany($validated['details']);
        return redirect()->route('bills.index')->with('success', 'Factura actualizada correctamente.');
}

    public function destroy(string $id)
    {
        //
    }
}
