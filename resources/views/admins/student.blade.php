@extends('layouts.sidebar')

@section('title', 'Students Information Page')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Students Information Page</h1>
    <p class="mb-4">Welcome, {{ auth()->user()->name }}! Here you can search, view, add, edit, and delete student
        information.</p>

    <div class="flex justify-between mb-4">
        <div class="flex space-x-2">
            <input type="text" id="searchName" placeholder="Search by name..." class="px-4 py-2 border rounded-lg">
            <select id="filterClass" class="px-4 py-2 border rounded-lg">
                <option value="">Filter by Class</option>
                @foreach ($classes as $class)
                    <option value="{{ $class }}">{{ $class }}</option>
                @endforeach
            </select>
            <select id="filterSection" class="px-4 py-2 border rounded-lg">
                <option value="">Filter by Section</option>
                @foreach ($sections as $section)
                    <option value="{{ $section }}">{{ $section }}</option>
                @endforeach
            </select>
        </div>
        <button onclick="openAddModal()" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">+ Add
            Student</button>
    </div>

    <!--  Student Table -->
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
                    <th class="px-4 py-2">LRN</th>
                    <th class="px-4 py-2">Class</th>
                    <th class="px-4 py-2">Section</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-white' }}">
                        <td class="border px-4 py-2">{{ $student->name }}</td>
                        <td class="border px-4 py-2">{{ $student->sex }}</td>
                        <td class="border px-4 py-2">{{ $student->dob }}</td>
                        <td class="border px-4 py-2">{{ $student->address }}</td>
                        <td class="border px-4 py-2">{{ $student->email }}</td>
                        <td class="border px-4 py-2">{{ $student->mobile_no }}</td>
                        <td class="border px-4 py-2">{{ $student->lrn }}</td>
                        <td class="border px-4 py-2">{{ $student->class }}</td>
                        <td class="border px-4 py-2">{{ $student->section }}</td>
                        <td class="border px-4 py-2">
                            <div class="flex space-x-2">
                                <button onclick="viewStudent({{ $student->id }})"
                                    class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">View</button>
                                <button onclick="editStudent({{ $student->id }})"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</button>
                                <button onclick="deleteStudent({{ $student->id }})"
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Student Modal -->
    <div id="addModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-2/3 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Add New Student</h3>
                <form id="addStudentForm" action="{{ route('admin.student.store') }}" method="POST"
                    class="mt-4 grid grid-cols-2 gap-4">
                    @csrf
                    <!-- Personal Information -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Sex</label>
                        <select name="sex" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
                        <input type="date" name="dob" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Address</label>
                        <textarea name="address" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" rows="2"></textarea>
                    </div>

                    <!-- Contact Information -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Mobile Number</label>
                        <input type="tel" name="mobile_no" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>

                    <!-- Academic Information -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">LRN (Learner Reference Number)</label>
                        <input type="text" name="lrn" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Class</label>
                        <input type="text" name="class" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Section</label>
                        <input type="text" name="section" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>

                    <!-- Family Information -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Father's Name</label>
                        <input type="text" name="fathers_name" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Mother's Name</label>
                        <input type="text" name="mothers_name" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Guardian's Name</label>
                        <input type="text" name="guardians_name" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Emergency Contact Number</label>
                        <input type="tel" name="emergency_contact_no" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>

                    <div class="col-span-2 mt-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save
                            Student</button>
                        <button type="button" onclick="closeAddModal()"
                            class="ml-2 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div id="success-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div id="error-message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- View Student Modal -->
    <div id="viewModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-2/3 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium leading-6 text-gray-900">View Student Details</h3>
                <div class="mt-4 grid grid-cols-2 gap-4">
                    <!-- Personal Information -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <p id="view_name" class="mt-1 block w-full rounded-md bg-gray-100 p-2"></p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Sex</label>
                        <p id="view_sex" class="mt-1 block w-full rounded-md bg-gray-100 p-2"></p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
                        <p id="view_dob" class="mt-1 block w-full rounded-md bg-gray-100 p-2"></p>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Address</label>
                        <p id="view_address" class="mt-1 block w-full rounded-md bg-gray-100 p-2"></p>
                    </div>

                    <!-- Contact Information -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <p id="view_email" class="mt-1 block w-full rounded-md bg-gray-100 p-2"></p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Mobile Number</label>
                        <p id="view_mobile_no" class="mt-1 block w-full rounded-md bg-gray-100 p-2"></p>
                    </div>

                    <!-- Academic Information -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">LRN</label>
                        <p id="view_lrn" class="mt-1 block w-full rounded-md bg-gray-100 p-2"></p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Class</label>
                        <p id="view_class" class="mt-1 block w-full rounded-md bg-gray-100 p-2"></p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Section</label>
                        <p id="view_section" class="mt-1 block w-full rounded-md bg-gray-100 p-2"></p>
                    </div>

                    <!-- Family Information -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Father's Name</label>
                        <p id="view_fathers_name" class="mt-1 block w-full rounded-md bg-gray-100 p-2"></p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Mother's Name</label>
                        <p id="view_mothers_name" class="mt-1 block w-full rounded-md bg-gray-100 p-2"></p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Guardian's Name</label>
                        <p id="view_guardians_name" class="mt-1 block w-full rounded-md bg-gray-100 p-2"></p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Emergency Contact</label>
                        <p id="view_emergency_contact_no" class="mt-1 block w-full rounded-md bg-gray-100 p-2"></p>
                    </div>

                    <div class="col-span-2 mt-4">
                        <button onclick="document.getElementById('viewModal').classList.add('hidden')"
                            class="ml-2 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Student Modal -->
    <div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-2/3 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Edit Student</h3>
                <form id="editStudentForm" method="POST" class="mt-4 grid grid-cols-2 gap-4">
                    @csrf
                    @method('PUT')
                    <!-- Personal Information -->
                    <!-- Inside the edit form -->
                    <input type="hidden" name="id" id="edit_student_id">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="edit_name"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Sex</label>
                        <select name="sex" id="edit_sex"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
                        <input type="date" name="dob" id="edit_dob"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Address</label>
                        <textarea name="address" id="edit_address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            rows="2"></textarea>
                    </div>

                    <!-- Contact Information -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="edit_email"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Mobile Number</label>
                        <input type="tel" name="mobile_no" id="edit_mobile_no"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>

                    <!-- Academic Information -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">LRN (Learner Reference Number)</label>
                        <input type="text" name="lrn" id="edit_lrn"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Class</label>
                        <input type="text" name="class" id="edit_class"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Section</label>
                        <input type="text" name="section" id="edit_section"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Password (leave blank to keep
                            current)</label>
                        <input type="password" name="password"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" readonly>
                    </div>

                    <!-- Family Information -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Father's Name</label>
                        <input type="text" name="fathers_name" id="edit_fathers_name"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Mother's Name</label>
                        <input type="text" name="mothers_name" id="edit_mothers_name"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Guardian's Name</label>
                        <input type="text" name="guardians_name" id="edit_guardians_name"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Emergency Contact Number</label>
                        <input type="tel" name="emergency_contact_no" id="edit_emergency_contact_no"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>

                    <div class="col-span-2 mt-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update
                            Student</button>
                        <button type="button" onclick="closeEditModal()"
                            class="ml-2 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="deleteModal" class="hidden">
        <p>Are you sure you want to delete this student?</p>
        <button id="confirmDelete">Confirm</button>
        <button onclick="closeDeleteModal()">Cancel</button>
    </div>


    @push('scripts')
        <script>
            function openAddModal() {
                document.getElementById('addModal').classList.remove('hidden');
            }

            function closeAddModal() {
                document.getElementById('addModal').classList.add('hidden');
            }

            function viewStudent(id) {
                fetch(`/admins/student/${id}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Failed to fetch student details.');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Show the view modal
                        const viewModal = document.getElementById('viewModal');
                        if (viewModal) {
                            viewModal.classList.remove('hidden');

                            // Populate data
                            document.getElementById('view_name').innerText = data.name;
                            document.getElementById('view_sex').innerText = data.sex;
                            document.getElementById('view_dob').innerText = data.dob;
                            document.getElementById('view_address').innerText = data.address;
                            document.getElementById('view_email').innerText = data.email;
                            document.getElementById('view_mobile_no').innerText = data.mobile_no;
                            document.getElementById('view_lrn').innerText = data.lrn;
                            document.getElementById('view_class').innerText = data.class;
                            document.getElementById('view_section').innerText = data.section;
                            document.getElementById('view_fathers_name').innerText = data.fathers_name;
                            document.getElementById('view_mothers_name').innerText = data.mothers_name;
                            document.getElementById('view_guardians_name').innerText = data.guardians_name;
                            document.getElementById('view_emergency_contact_no').innerText = data.emergency_contact_no;
                        } else {
                            console.error('View modal element not found');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Failed to load student details.');
                    });
            }

            function editStudent(id) {
                fetch(`/admins/student/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('edit_student_id').value = id;
                        document.getElementById('edit_name').value = data.name;
                        document.getElementById('edit_sex').value = data.sex;
                        document.getElementById('edit_dob').value = data.dob;
                        document.getElementById('edit_address').value = data.address;
                        document.getElementById('edit_email').value = data.email;
                        document.getElementById('edit_mobile_no').value = data.mobile_no;
                        document.getElementById('edit_lrn').value = data.lrn;
                        document.getElementById('edit_class').value = data.class;
                        document.getElementById('edit_section').value = data.section;
                        document.getElementById('edit_fathers_name').value = data.fathers_name;
                        document.getElementById('edit_mothers_name').value = data.mothers_name;
                        document.getElementById('edit_guardians_name').value = data.guardians_name;
                        document.getElementById('edit_emergency_contact_no').value = data.emergency_contact_no;

                        document.getElementById('editModal').classList.remove('hidden');
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Failed to load student details.');
                    });
            }

            document.getElementById('editStudentForm').onsubmit = function(e) {
                e.preventDefault(); // Prevent default form submission

                let id = document.getElementById('edit_student_id').value;

                let formData = new FormData(this);
                fetch(`/admins/student/${id}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json'
                        },
                        body: formData
                    })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(err => {
                                throw err;
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        alert(data.success || 'Student updated successfully!');
                        location.reload();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert(error.message || error.errors ? Object.values(error.errors).join('\n') :
                            'Failed to update student.');
                    });
            };


            function deleteStudent(id) {
                let deleteModal = document.getElementById('deleteModal');
                if (!deleteModal) {
                    console.error('Delete modal not found.');
                    alert('Error: Delete modal is missing.');
                    return;
                }

                deleteModal.classList.remove('hidden');

                document.getElementById('confirmDelete').onclick = function() {
                    fetch(`/admins/student/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log('Deleted:', data);
                            location.reload();
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Failed to delete student.');
                        });
                };
            }

            function closeEditModal() {
                document.getElementById('editModal').classList.add('hidden');
            }
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchName = document.getElementById('searchName');
                const filterClass = document.getElementById('filterClass');
                const filterSection = document.getElementById('filterSection');

                function filterStudents() {
                    const nameValue = searchName.value.toLowerCase();
                    const classValue = filterClass.value;
                    const sectionValue = filterSection.value;

                    document.querySelectorAll('tbody tr').forEach(row => {
                        const name = row.querySelector('td:first-child').textContent.toLowerCase();
                        const rowClass = row.querySelector('td:nth-child(8)').textContent;
                        const rowSection = row.querySelector('td:nth-child(9)').textContent;

                        const nameMatch = name.includes(nameValue);
                        const classMatch = classValue === '' || rowClass === classValue;
                        const sectionMatch = sectionValue === '' || rowSection === sectionValue;

                        row.style.display = (nameMatch && classMatch && sectionMatch) ? '' : 'none';
                    });
                }

                // Attach event listeners for real-time filtering
                searchName.addEventListener('input', filterStudents);
                filterClass.addEventListener('change', filterStudents);
                filterSection.addEventListener('change', filterStudents);
            });
        </script>
        <script>
            // Function to hide a message after a delay
            function hideMessage(elementId, delay) {
                const element = document.getElementById(elementId);
                if (element) {
                    setTimeout(() => {
                        element.style.display = 'none';
                    }, delay);
                }
            }

            // Hide success message after 5 seconds (5000 milliseconds)
            hideMessage('success-message', 5000);

            // Hide error message after 5 seconds (5000 milliseconds)
            hideMessage('error-message', 5000);
        </script>
    @endpush
@endsection
