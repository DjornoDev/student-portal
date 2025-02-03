@extends('layouts.sidebar')

@section('title', 'Teachers Information Page')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Teachers Information Page</h1>
    <p class="mb-4">Welcome, {{ auth()->user()->name }}! Here you can search, view, edit, add, and delete teacher information.</p>

    <div class="flex justify-between mb-4">
        <div class="flex space-x-2">
            <input type="text" placeholder="Search by name..." class="px-4 py-2 border rounded-lg">
            <select class="px-4 py-2 border rounded-lg">
                <option value="">Filter by Category</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Search</button>
        </div>
        <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">+ Add Teacher</button>
    </div>

    <div class="overflow-x-auto mt-6">
        <table class="table-auto w-full bg-white rounded-lg shadow-lg">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Sex</th>
                    <th class="px-4 py-2">Date of Birth</th>
                    <th class="px-4 py-2">Address</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Mobile No.</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 10; $i++)
                    <tr class="{{ $i % 2 === 0 ? 'bg-gray-100' : 'bg-white' }}">
                        <td class="border px-4 py-2">Teacher {{ $i }}</td>
                        <td class="border px-4 py-2">{{ $i % 2 === 0 ? 'Female' : 'Male' }}</td>
                        <td class="border px-4 py-2">198{{ $i }}-01-01</td>
                        <td class="border px-4 py-2">456 Example St.</td>
                        <td class="border px-4 py-2">teacher{{ $i }}@example.com</td>
                        <td class="border px-4 py-2">987-654-321{{ $i }}</td>
                        <td class="border px-4 py-2">
                            <div class="flex space-x-2">
                                <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">View</button>
                                <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</button>
                                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                            </div>
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
@endsection
