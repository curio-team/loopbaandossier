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
        $pageData = [
            'headerTitle' => $student->pages->introduction_header_title ? $student->pages->introduction_header_title : 'Dit ben ik!',
            'contentText' => $student->pages->introduction_content_text,
            'contentImage' => $student->pages->introduction_content_image ? asset($student->pages->introduction_content_image) : asset('/images/default.jpg'),
        ];
        
        return view('pages.type-'.$student->pages->introduction_content_layout, [
            'student' => $student,
            'pageColor' => $pageColor,
            'pageData' => $pageData,
        ]);
    }
    
    public function showQualities($studentSlug)
    {
        $student = Student::where('slug', $studentSlug)->first();
        
        $pageColor = $student->pages->qualities_content_color;
        $pageData = [
            'headerTitle' => $student->pages->qualities_header_title ? $student->pages->qualities_header_title : 'Dit zijn mijn kwaliteiten!',
            'contentText' => $student->pages->qualities_content_text,
            'contentImage' => $student->pages->qualities_content_image ? asset($student->pages->qualities_content_image) : asset('/images/default.jpg'),
        ];

        return view('pages.type-'.$student->pages->qualities_content_layout, [
            'student' => $student,
            'pageColor' => $pageColor,
            'pageData' => $pageData,
        ]);
    }
    
    public function showMotives($studentSlug)
    {
        $student = Student::where('slug', $studentSlug)->first();        
        
        $pageColor = $student->pages->motives_content_color;
        $pageData = [
            'headerTitle' => $student->pages->motives_header_title ? $student->pages->motives_header_title : 'Hierdoor raak ik gemotiveerd!',
            'contentText' => $student->pages->motives_content_text,
            'contentImage' => $student->pages->motives_content_image ? asset($student->pages->motives_content_image) : asset('/images/default.jpg'),
        ];

        return view('pages.type-'.$student->pages->motives_content_layout, [
            'student' => $student,
            'pageColor' => $pageColor,
            'pageData' => $pageData,
        ]);
    }
    
    public function showExploration($studentSlug)
    {
        $student = Student::where('slug', $studentSlug)->first();
        
        $pageColor = $student->pages->exploration_content_color;
        $pageData = [
            'headerTitle' => $student->pages->exploration_header_title ? $student->pages->exploration_header_title : 'Dit is mijn onderzoek!',
            'contentText' => $student->pages->exploration_content_text,
            'contentImage' => $student->pages->exploration_content_image ? asset($student->pages->exploration_content_image) : asset('/images/default.jpg'),
        ];
        
        return view('pages.type-'.$student->pages->exploration_content_layout, [
            'student' => $student,
            'pageColor' => $pageColor,
            'pageData' => $pageData,
        ]);
    }
    
    public function showExperience($studentSlug)
    {
        $student = Student::where('slug', $studentSlug)->first();
        
        $pageColor = $student->pages->experience_content_color;
        $pageData = [
            'headerTitle' => $student->pages->experience_header_title ? $student->pages->experience_header_title : 'Hier komt mijn ervaring vandaan!',
            'contentText' => $student->pages->experience_content_text,
            'contentImage' => $student->pages->experience_content_image ? asset($student->pages->experience_content_image) : asset('/images/default.jpg'),
        ];
        
        return view('pages.type-'.$student->pages->experience_content_layout, [
            'student' => $student,
            'pageColor' => $pageColor,
            'pageData' => $pageData,
        ]);
    }
    
    public function showNetworks($studentSlug)
    {
        $student = Student::where('slug', $studentSlug)->first();
        
        $pageColor = $student->pages->networks_content_color;
        $pageData = [
            'headerTitle' => $student->pages->networks_header_title ? $student->pages->networks_header_title : 'Deze mensen en bedrijven kennen mij!',
            'contentText' => $student->pages->networks_content_text,
            'contentImage' => $student->pages->networks_content_image ? asset($student->pages->networks_content_image) : asset('/images/default.jpg'),
        ];
        
        return view('pages.type-'.$student->pages->networks_content_layout, [
            'student' => $student,
            'pageColor' => $pageColor,
            'pageData' => $pageData,
        ]);
    }
}
            