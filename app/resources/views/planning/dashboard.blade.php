@extends('layouts.app')

@section('content')
<div class="container p-6 mx-auto">
    <div class="p-4 bg-white rounded shadow-md">
        <h1 class="mb-4 text-2xl font-bold">{{ $title ?? 'Department Dashboard' }}</h1>
        <p class="text-gray-700">Welcome to the {{ $department ?? 'Department' }} Dashboard.</p>
