<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function showHome() {
        $header = [
            'title' => 'Naam Student',
            'header_type' => 'header-home',
            'title_color' => 'header-home-title'
        ];
        View::share('page_color', 'content-home');
        return view('home', ['header' => $header]);
    }

    public function showIntroduction() {
        $header = [
            'title' => 'Dit ben ik',
            'header_type' => 'header-introduction',
            'title_color' => 'header-introduction-title'
        ];
        View::share('page_color', 'content-introduction');
        return view('introduction', ['header' => $header]);
    }

    public function showQualities()
    {
        $header = [
            'title' => 'Hier ben ik goed in!',
            'header_type' => 'header-qualities',
            'title_color' => 'header-qualities-title'
        ];
        View::share('page_color', 'content-qualities');
        return view('qualities', ['header' => $header]);
    }

    public function showMotives()
    {
        $header = [
            'title' => 'Dit vind ik leuk!',
            'header_type' => 'header-motives',
            'title_color' => 'header-motives-title'
        ];
        View::share('page_color', 'content-motives');
        return view('motives', ['header' => $header]);
    }

    public function showExploration()
    {
        $header = [
            'title' => 'Dit is mijn werkervaring',
            'header_type' => 'header-exploration',
            'title_color' => 'header-exploration-title'
        ];
        View::share('page_color', 'content-exploration');
        return view('exploration', ['header' => $header]);
    }

    public function showExperience()
    {
        $header = [
            'title' => 'Deze opleidingen heb ik gedaan',
            'header_type' => 'header-experience',
            'title_color' => 'header-experience-title'
        ];
        View::share('page_color', 'content-experience');
        return view('experience', ['header' => $header]);
    }

    public function showNetworks()
    {
        $header = [
            'title' => 'Deze mensen ken ik',
            'header_type' => 'header-networks',
            'title_color' => 'header-networks-title'
        ];
        View::share('page_color', 'content-networks');
        return view('networks', ['header' => $header]);
    }
}
