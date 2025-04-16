<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmploymentRecord;

class EmploymentRecordController extends Controller
{
    public function create()
    {
        return view('hr.employment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_name' => 'required|string|max:255',
            'employee_number' => 'required|string|max:50',
            'visa_number' => 'required|string|max:50',
            'category_resident' => 'required|string|max:100',
            'nationality' => 'required|string|max:100',
            'date_arrival' => 'required|date',
            'date_hired' => 'required|date',
            'kiwa_contract_number' => 'required|string|max:100',
            'salary' => 'required|numeric',
            'educational_background' => 'nullable|string',
            'skills' => 'nullable|string',
            'ticket_provided' => 'required|string',
            'residence_renewal' => 'required|integer',
        ]);

        EmploymentRecord::create($request->all());

        return redirect()->route('hr.employment.index')->with('success', 'Employment record added.');
    }

    public function index()
    {
        $records = EmploymentRecord::all();
        $title = 'Employment Records';
        $department = 'HR';

        return view('hr.employment.index', compact('records', 'title', 'department'));
    }


    public function edit($id)
    {
        $record = EmploymentRecord::findOrFail($id);
        return view('hr.employment.edit', compact('record'));
    }

    public function update(Request $request, $id)
    {
        $record = EmploymentRecord::findOrFail($id);

        $validated = $request->validate([
            'employee_name' => 'required|string|max:255',
            'employee_number' => 'required|string|max:100',
            'visa_number' => 'required|string',
            'category_resident' => 'required|string',
            'nationality' => 'required|string',
            'date_arrival' => 'required|date',
            'date_hired' => 'required|date',
            'kiwa_contract_number' => 'required|string',
            'salary' => 'required|numeric',
            'educational_background' => 'nullable|string',
            'skills' => 'nullable|string',
            'ticket_provided' => 'required|boolean',
            'residence_renewal' => 'required|integer',
        ]);

        $record->update($validated);

        return redirect()->route('hr.hr.employment.index')->with('success', 'Record updated successfully.');
    }

    public function destroy($id)
    {
        $record = EmploymentRecord::findOrFail($id);
        $record->delete();

        return redirect()->route('hr.employment.index')
            ->with('success', 'Employment record deleted successfully.');
    }
}
