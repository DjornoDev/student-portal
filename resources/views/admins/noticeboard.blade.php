@extends('layouts.sidebar')

@section('title', 'Announcement')

@section('content')
    <h1 class="text-2xl font-bold mb-4 text-gray-200">{{ auth()->user()->name }} Announcements</h1>
    <p class="mb-4 text-gray-300">Welcome, {{ auth()->user()->name }}! Here you can view, </p>
@endsection
