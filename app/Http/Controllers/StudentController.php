<?php
// app/Http/Controllers/StudentController.php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    // This method is for students to view their dashboard
    public function dashboard()
    {
        return view('student.dashboard');
    }

    // This method is for admins to manage students
    public function index()
    {
        $students = Student::all();
        $classes = Student::distinct()->orderBy('class')->pluck('class');
        $sections = Student::distinct()->orderBy('section')->pluck('section');

        return view('admins.student', compact('students', 'classes', 'sections'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sex' => 'required|in:Male,Female,Other',
            'dob' => 'required|date',
            'address' => 'required|string',
            'email' => 'required|email|unique:students',
            'mobile_no' => 'required|string',
            'lrn' => 'required|string|unique:students',
            'class' => 'required|string',
            'section' => 'required|string',
            'password' => 'required|min:8',
            'fathers_name' => 'required|string',
            'mothers_name' => 'required|string',
            'guardians_name' => 'required|string',
            'emergency_contact_no' => 'required|string',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'student'; // Add default role

        Student::create($validated);

        return redirect()->route('admins.student')->with('success', 'Student added successfully');
    }

    public function show(Student $student)
    {
        return response()->json($student);
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'sex' => 'in:Male,Female,Other', // Corrected
            'dob' => 'date',
            'address' => 'string',
            'email' => 'email|unique:students,email,' . $student->id,
            'mobile_no' => 'string',
            'lrn' => 'string|unique:students,lrn,' . $student->id,
            'class' => 'string',
            'section' => 'string',
            'fathers_name' => 'string',
            'mothers_name' => 'string',
            'guardians_name' => 'string',
            'emergency_contact_no' => 'string',
            'role' => 'string',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        }

        $student->update($validated);

        return response()->json(['success' => 'Student updated successfully.']);
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json(['message' => 'Student deleted successfully']);
    }
}
