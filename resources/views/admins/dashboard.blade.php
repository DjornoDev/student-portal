@extends('layouts.sidebar')

@section('title', 'Dashboard')

@section('content')
    <h1 class="text-2xl font-bold mb-4 text-gray-200">Dashboard</h1>
    <p class="mb-4 text-gray-300">Welcome, {{ auth()->user()->name }}! Here you can manage users and oversee the system.</p>

    <!-- Dashboard Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
        <div class="bg-blue-700 text-white p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold">Total Enrolled Students</h2>
            <p class="text-2xl font-bold">{{ $totalStudents ?? '100' }}</p>
        </div>
        <div class="bg-green-700 text-white p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold">Total Teachers</h2>
            <p class="text-2xl font-bold">{{ $totalTeachers ?? '20' }}</p>
        </div>
    </div>

    <div class="overflow-x-auto mt-6">
        <table class="table-auto w-full bg-gray-800 text-gray-300 rounded-lg shadow-lg">
            <thead class="bg-gray-700 text-gray-200">
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Username</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Phone Number</th>
                    <th class="px-4 py-2">Role</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 10; $i++)
                    <tr class="{{ $i % 2 === 0 ? 'bg-gray-700' : 'bg-gray-900' }}">
                        <td class="border px-4 py-2">{{ $i }}</td>
                        <td class="border px-4 py-2">User {{ $i }}</td>
                        <td class="border px-4 py-2">username{{ $i }}</td>
                        <td class="border px-4 py-2">user{{ $i }}@example.com</td>
                        <td class="border px-4 py-2">123-456-789{{ $i }}</td>
                        <td class="border px-4 py-2">{{ $i % 2 === 0 ? 'Admin' : 'Student' }}</td>
                        <td class="border px-4 py-2">
                            <div class="flex space-x-2">
                                <a href="#"
                                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500">Edit</a>
                                <a href="#"
                                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
@endsection
