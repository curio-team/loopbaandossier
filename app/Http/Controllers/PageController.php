<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Student;

class PageController extends Controller
{
    public function showHome() {
        return view('home');
    }
    
    public function showMain($studentSlug) {
        $student = Student::where('slug', $studentSlug)->first();
        
        $pageColor = $student->pages->main_content_color;
        
        return view('main', [
            'student' => $student,
            'pageColor' => $pageColor,
        ]);
    }
    
    public function showIntroduction($studentSlug) {
        $student = Student::where('slug', $studentSlug)->first();
        
        $pageColor = $student->pages->introduction_content_color;
        
        return view('page', [
            'student' => $student,
            'pageColor' => $pageColor,
        ]);
    }
    
    public function showQualities($studentSlug)
    {
        $student = Student::where('slug', $studentSlug)->first();
        
        $pageColor = $student->pages->qualities_content_color;

        return view('page', [
            'student' => $student,
            'pageColor' => $pageColor,
        ]);
    }
    
    public function showMotives($studentSlug)
    {
        $student = Student::where('slug', $studentSlug)->first();        
        
        $pageColor = $student->pages->motives_content_color;

        return view('page', [
            'student' => $student,
            'pageColor' => $pageColor,
        ]);
    }
    
    public function showExploration($studentSlug)
    {
        $student = Student::where('slug', $studentSlug)->first();
        
        $pageColor = $student->pages->exploration_content_color;
        
        return view('page', [
            'student' => $student,
            'pageColor' => $pageColor,
        ]);
    }
    
    public function showExperience($studentSlug)
    {
        $student = Student::where('slug', $studentSlug)->first();
        
        $pageColor = $student->pages->experience_content_color;
        
        return view('page', [
            'student' => $student,
            'pageColor' => $pageColor,
        ]);
    }
    
    public function showNetworks($studentSlug)
    {
        $student = Student::where('slug', $studentSlug)->first();
        
        $pageColor = $student->pages->networks_content_color;
        
        return view('page', [
            'student' => $student,
            'pageColor' => $pageColor,
        ]);
    }
}
            