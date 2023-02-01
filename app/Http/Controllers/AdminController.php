<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showDashboard() {
        return view('admin.dashboard');
    }

    public function manageAdmins() {
        $users = User::orderBy('name')->doesntHave('student')->paginate(10);

        return view('admin.manage_admins', [
            'users' => $users
        ]);
    }

    public function toggleAdmin($userId) {
        $user = User::findOrFail($userId);

        if (Auth::id() != $user->id) {
            if($user->is_admin) {
                $user->is_admin = false;
            } else {
                $user->is_admin = true;
            }
            $user->save();
        }

        return redirect()->route('admin_manage_admins');
    }

    public function manageTeachers() {
        $users = User::orderBy('name')->has('teacher')->paginate(10);

        return view('admin.manage_teachers', [
            'users' => $users
        ]);
    }

    public function manageTeacher($teacherId) {
        $teacher = Teacher::findOrFail($teacherId);
        $classes = SchoolClass::all()->sortBy('code');
        return view('admin.manage_teacher', [
            'teacher' => $teacher,
            'classes' => $classes,
        ]);
    }

    public function toggleTeacherClass($teacherId, $classId) {
        $teacher = Teacher::findOrFail($teacherId);
        $class = SchoolClass::findOrFail($classId);

        if($teacher->classes->contains($class)) {
            $teacher->classes()->detach($class);
        } else {
            $teacher->classes()->attach($class);
        }

        return redirect()->route('admin_manage_teacher', $teacherId);
    }

    public function toggleTeacherActive($teacherId) {
        $teacher = Teacher::findOrFail($teacherId);

        if($teacher->user->active) {
            $teacher->user->active = false;
        } else {
            $teacher->user->active = true;
        }
        $teacher->user->save();

        return redirect()->route('admin_manage_teachers');
    }

    public function manageClasses() {
        $classes = SchoolClass::all()->sortBy('code');
        return view('admin.manage_classes', [
            'classes' => $classes
        ]);
    }

    public function manageStudents($classCode) {
        $class = SchoolClass::where('code', $classCode)->firstOrFail();
        $students = $class->students;
        return view('admin.manage_students', [
            'class' => $class,
            'students' => $students
        ]);
    }

    public function manageStudent($studentId) {
        $student = Student::findOrFail($studentId);
        $classes = SchoolClass::all()->sortBy('code');
        return view('admin.manage_student', [
            'student' => $student,
            'classes' => $classes
        ]);
    }

    public function processManageStudent(Request $request, $studentId) {
        $student = Student::findOrFail($studentId);
        $originalClassCode = $student->class->code;

        $student->class_id = $request->schoolClass;
        $student->save();

        return redirect()->route('admin_manage_students', $originalClassCode);
    }

    public function toggleStudentActive($studentId) {
        $student = Student::findOrFail($studentId);

        if($student->user->active) {
            $student->user->active = false;
        } else {
            $student->user->active = true;
        }
        $student->user->save();

        return redirect()->route('admin_manage_students', $student->class->code);
    }
}
