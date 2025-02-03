@extends('layouts.sidebar')

@section('title', 'Subjects')

@section('content')
    <h1 class="text-2xl font-bold mb-4 text-gray-200">Subjects Information Page</h1>
    <p class="mb-4 text-gray-300">Welcome, {{ auth()->user()->name }}! Here you can view, add, edit, and delete subjects information.</p>

    <div class="flex justify-between mb-4">
        <div class="flex space-x-2">
            <input type="text" placeholder="Search by subject name..." class="px-4 py-2 border rounded-lg">
            <select class="px-4 py-2 border rounded-lg">
                <option value="">Filter by Class</option>
                <option value="Grade 1">Grade 1</option>
                <option value="Grade 2">Grade 2</option>
            </select>
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Search</button>
        </div>
        <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">+ Add Subject</button>
    </div>

    <div class="overflow-x-auto mt-6">
        <table class="table-auto w-full bg-white rounded-lg shadow-lg">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="px-4 py-2">Class (Grade Level)</th>
                    <th class="px-4 py-2">Subject Name</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 10; $i++)
                    <tr class="{{ $i % 2 === 0 ? 'bg-gray-100' : 'bg-white' }}">
                        <td class="border px-4 py-2">Grade {{ $i }}</td>
                        <td class="border px-4 py-2">Subject {{ $i }}</td>
                        <td class="border px-4 py-2">
                            <div class="flex space-x-2">
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
