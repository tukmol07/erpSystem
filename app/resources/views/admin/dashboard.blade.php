@extends('layouts.app')

@section('content')

    {{-- Register Button --}}
    <div class="mt-4">
        <a
        href="{{ route('admin.register') }}"
        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
        Register
    </a>    </div>
@endsection

@if(session('success'))
    <div class="p-3 mb-4 text-green-800 bg-green-100 rounded">
        {{ session('success') }}
    </div>
@endif

