@extends('layouts.app')

@section('content')
<div class="max-w-6xl p-6 mx-auto bg-white rounded shadow">
    <h2 class="mb-6 text-2xl font-bold">Employment Records</h2>

    <a href="{{ route('hr.dashboard') }}" class="inline-block px-6 py-2 mb-4 text-sm font-semibold text-black transition duration-300 ease-in-out bg-gray-600 rounded-md font-size hover:bg-gray-700"><-Back</a>


    <table class="min-w-full table-auto font-size">
        <thead>
            <tr class="text-left bg-gray-100">
                <th class="px-4 py-2">Employee Name</th>
                <th class="px-4 py-2">Employee Number</th>
                <th class="px-4 py-2">Nationality</th>
                <th class="px-4 py-2">Visa Number</th>
                <th class="px-4 py-2">Residence Category</th>
                <th class="px-4 py-2">Kiwa Number</th>
                <th class="px-4 py-2">Date Arrival</th>
                <th class="px-4 py-2">Educational Background</th>
                <th class="px-4 py-2">Skills</th>
                <th class="px-4 py-2">Ticket Provide</th>
                <th class="px-4 py-2">Date Hired</th>
                <th class="px-4 py-2">Salary</th>
                <th class="px-4 py-2">Residence Renewal</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $record)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $record->employee_name }}</td>
                <td class="px-4 py-2">{{ $record->employee_number }}</td>
                <td class="px-4 py-2">{{ $record->nationality }}</td>
                <td class="px-4 py-2">{{ $record->visa_number }}</td>
                <td class="px-4 py-2">{{ $record->category_resident }}</td>
                <td class="px-4 py-2">{{ $record->kiwa_contract_number }}</td>
                <td class="px-4 py-2">{{ $record->date_arrival }}</td>
                <td class="px-4 py-2">{{ $record->educational_background }}</td>
                <td class="px-4 py-2">{{ $record->skills }}</td>
                <td class="px-4 py-2">{{ $record->ticket_provided ? 'Yes' : 'No' }}</td>
                <td class="px-4 py-2">{{ $record->date_hired }}</td>
                <td class="px-4 py-2">${{ $record->salary }}</td>
                <td class="px-4 py-2">{{ $record->residence_renewal }} years</td>
                <td class="w-48 px-4 py-2">
                    <!-- Edit Button -->
                    <a href="{{ route('hr.hr.employment.edit', $record->id) }}" class="inline-block px-5 py-2 text-sm font-semibold text-black transition duration-300 ease-in-out bg-blue-600 rounded-md hover:bg-blue-700">Edit</a>

                    <!-- Delete Button -->
                    <form action="{{ route('hr.hr.employment.destroy', $record->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this record?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-5 py-2 text-sm font-semibold text-white transition duration-300 ease-in-out bg-red-600 rounded-md hover:bg-red-700">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
