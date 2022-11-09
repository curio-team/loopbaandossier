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

        $header = [
            'title' => 'Naam Student',
            'header_type' => 'header-home',
            'title_color' => 'header-home-title'
        ];
        View::share('page_color', 'content-home');
        return view('main', [
            'student' => $student,
            'header' => $header
        ]);
    }

    public function showIntroduction($studentSlug) {
        $student = Student::where('slug', $studentSlug)->first();

        $header = [
            'title' => 'Dit ben ik',
            'header_type' => 'header-introduction',
            'title_color' => 'header-introduction-title'
        ];
        View::share('page_color', 'content-introduction');
        return view('page', [
            'student' => $student,
            'header' => $header
        ]);
    }

    public function showQualities($studentSlug)
    {
        $student = Student::where('slug', $studentSlug)->first();

        $header = [
            'title' => 'Hier ben ik goed in!',
            'header_type' => 'header-qualities',
            'title_color' => 'header-qualities-title'
        ];
        View::share('page_color', 'content-qualities');
        return view('page', [
            'student' => $student,
            'header' => $header
        ]);
    }

    public function showMotives($studentSlug)
    {
        $student = Student::where('slug', $studentSlug)->first();        
        
        $header = [
            'title' => 'Dit vind ik leuk!',
            'header_type' => 'header-motives',
            'title_color' => 'header-motives-title'
        ];
        View::share('page_color', 'content-motives');
        return view('page', [
            'student' => $student,
            'header' => $header
        ]);
    }

    public function showExploration($studentSlug)
    {
        $student = Student::where('slug', $studentSlug)->first();

        $header = [
            'title' => 'Dit is mijn werkervaring',
            'header_type' => 'header-exploration',
            'title_color' => 'header-exploration-title'
        ];
        View::share('page_color', 'content-exploration');
        return view('page', [
            'student' => $student,
            'header' => $header
        ]);
    }

    public function showExperience($studentSlug)
    {
        $student = Student::where('slug', $studentSlug)->first();

        $header = [
            'title' => 'Deze opleidingen heb ik gedaan',
            'header_type' => 'header-experience',
            'title_color' => 'header-experience-title'
        ];
        View::share('page_color', 'content-experience');
        return view('page', [
            'student' => $student,
            'header' => $header
        ]);
    }

    public function showNetworks($studentSlug)
    {
        $student = Student::where('slug', $studentSlug)->first();

        $header = [
            'title' => 'Deze mensen ken ik',
            'header_type' => 'header-networks',
            'title_color' => 'header-networks-title'
        ];
        View::share('page_color', 'content-networks');
        return view('page', [
            'student' => $student,
            'header' => $header
        ]);
    }
}
