@extends('layouts.app')

@section('content')

<style>
    .form-container {
        max-inline-size: 900px;
        margin: 2rem auto;
        padding: 2rem;
        background: #fff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
    }

    .form-title {
        font-size: 2rem;
        font-weight: bold;
        color: #333;
        margin-block-end: 1.5rem;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        margin-block-end: 0.5rem;
        font-weight: 600;
        color: #444;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 1rem;
    }

    .form-group textarea {
        resize: vertical;
        min-block-size: 80px;
    }

    .submit-btn {
        margin-block-start: 2rem;
        padding: 0.75rem 1.5rem;
        background-color: #007BFF;
        color: #fff;
        font-weight: bold;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
        background-color: #0056b3;
    }

    @media (max-inline-size: 768px) {
        .form-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="form-container">
    <h2 class="form-title">Add Employment Record</h2>

    <form action="{{ route('hr.employment.store') }}" method="POST">
        @csrf

        <div class="form-grid">
            <div class="form-group">
                <label>Employee Name</label>
                <input type="text" name="employee_name" required>
            </div>

            <div class="form-group">
                <label>Employee Number</label>
                <input type="text" name="employee_number" required>
            </div>

            <div class="form-group">
                <label>Visa Number</label>
                <input type="text" name="visa_number" required>
            </div>

            <div class="form-group">
                <label>Category Resident</label>
                <input type="text" name="category_resident" required>
            </div>

            <div class="form-group">
                <label>Nationality</label>
                <input type="text" name="nationality" required>
            </div>

            <div class="form-group">
                <label>Date Arrival</label>
                <input type="date" name="date_arrival" required>
            </div>

            <div class="form-group">
                <label>Date Hired</label>
                <input type="date" name="date_hired" required>
            </div>

            <div class="form-group">
                <label>Kiwa Contract Number</label>
                <input type="text" name="kiwa_contract_number" required>
            </div>

            <div class="form-group">
                <label>Salary</label>
                <input type="number" name="salary" required>
            </div>

            <div class="form-group">
                <label>Educational Background</label>
                <textarea name="educational_background"></textarea>
            </div>

            <div class="form-group">
                <label>Skills</label>
                <textarea name="skills"></textarea>
            </div>

            <div class="form-group">
                <label>Ticket Provided</label>
                <select name="ticket_provided" required>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            <div class="form-group">
                <label>Renewal of Residence</label>
                <select name="residence_renewal" required>
                    <option value="2">2 Years</option>
                    <option value="4">4 Years</option>
                    <option value="6">6 Years</option>
                    <option value="8">8 Years</option>
                    <option value="10">10 Years</option>
                </select>
            </div>
        </div>

        <button type="submit" class="submit-btn">Save Record</button>
        <a href="{{ route('hr.dashboard') }}" class="inline-block px-6 py-2 mb-4 text-sm font-semibold text-black transition duration-300 ease-in-out bg-gray-600 rounded-md hover:bg-gray-700"><-Back</a>

    </form>
</div>

@endsection
