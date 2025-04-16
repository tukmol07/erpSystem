@extends('layouts.app')

@section('content')
<div class="container p-6 mx-auto">
    <div class="p-6 mb-6 bg-white rounded shadow-md">
        <h1 class="mb-2 text-3xl font-bold text-gray-800">HR Dashboard</h1>
        <p class="text-gray-600">Welcome to the Human Resources Management Panel.</p>
    </div>

    <!-- Action Buttons -->
    <div class="flex flex-wrap gap-4">
        <a href="{{ route('hr.employment.create') }}"
           class="inline-block px-6 py-3 font-semibold text-black transition duration-200 bg-indigo-500 rounded-lg shadow hover:bg-indigo-600">
            ➕ Input Employment Record
        </a>
        <a href="{{ route('hr.employment.index') }}"
           class="inline-block px-6 py-3 font-semibold text-black transition duration-200 rounded-lg shadow bg-emerald-500 hover:bg-emerald-600">
            📄 View Employment Records
        </a>
    </div>
</div>
@endsection
