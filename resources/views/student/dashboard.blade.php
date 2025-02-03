@extends('layouts.sidebar')

@section('title', 'Student Dashboard')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Student Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }}! Here you can report lost items and check for updates.</p>
@endsection
