<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ManageController extends Controller
{
    public function manageIntroduction()
    {
        $user = User::with('student')->where('id', Auth::user()->id)->firstOrFail();
        $pageData = [
            'header_title' => $user->student->pages->introduction_header_title,
            'content_text' => $user->student->pages->introduction_content_text,
            'content_color' => $user->student->pages->introduction_content_color,
            'content_image' => $user->student->pages->introduction_content_image,
            'content_layout' => $user->student->pages->introduction_content_layout,
        ];

        return view('manage', [
            'student' => $user->student,
            'pageData' => $pageData,
            'title' => 'Voorstellen aanpassen',
        ]);
    }

    public function processManageIntroduction(Request $request) {
        $user = User::with('student')->where('id', Auth::user()->id)->firstOrFail();
        $pages= $user->student->pages;
        $pages->introduction_header_title = $request->header_title;
        $pages->introduction_content_text = $request->content_text;
        $pages->introduction_content_color = $request->content_color;
        $pages->introduction_content_layout = $request->content_layout;

        $uploadedImage = $pages->introduction_content_image;
        if($request->content_image){
            if(!$uploadedImage = $this->uploadImage($request, $user)) {
                return back();
                // Add proper error message
            } elseif($uploadedImage) {
                // If image was uploaded successfully, delete the old image
                $this->deleteImage($pages->introduction_content_image);
            }
        }

        $pages->introduction_content_image = $uploadedImage;

        $pages->save();

        return redirect()->route('introduction', $user->student->slug);
    }

    public function manageQualities()
    {
        $user = User::with('student')->where('id', Auth::user()->id)->firstOrFail();
        $pageData = [
            'header_title' => $user->student->pages->qualities_header_title,
            'content_text' => $user->student->pages->qualities_content_text,
            'content_color' => $user->student->pages->qualities_content_color,
            'content_image' => $user->student->pages->qualities_content_image,
            'content_layout' => $user->student->pages->qualities_content_layout,
        ];

        return view('manage', [
            'student' => $user->student,
            'pageData' => $pageData,
            'title' => 'Kwaliteiten aanpassen',
        ]);
    }

    public function processManageQualities(Request $request) {
        $user = User::with('student')->where('id', Auth::user()->id)->firstOrFail();
        $pages= $user->student->pages;
        $pages->qualities_header_title = $request->header_title;
        $pages->qualities_content_text = $request->content_text;
        $pages->qualities_content_color = $request->content_color;
        $pages->qualities_content_layout = $request->content_layout;

        $uploadedImage = $pages->qualities_content_image;
        if($request->content_image){
            if(!$uploadedImage = $this->uploadImage($request, $user)) {
                return back();
                // Add proper error message
            } elseif($uploadedImage) {
                // If image was uploaded successfully, delete the old image
                $this->deleteImage($pages->qualities_content_image);
            }
        }

        $pages->qualities_content_image = $uploadedImage;

        $pages->save();

        return redirect()->route('qualities', $user->student->slug);
    }

    public function manageMotives() {
        $user = User::with('student')->where('id', Auth::user()->id)->firstOrFail();
        $pageData = [
            'header_title' => $user->student->pages->motives_header_title,
            'content_text' => $user->student->pages->motives_content_text,
            'content_color' => $user->student->pages->motives_content_color,
            'content_image' => $user->student->pages->motives_content_image,
            'content_layout' => $user->student->pages->motives_content_layout,
        ];

        return view('manage', [
            'student' => $user->student,
            'title' => 'Motieven aanpassen',
        ]);
    }

    public function processManageMotives(Request $request) {
        $user = User::with('student')->where('id', Auth::user()->id)->firstOrFail();
        $pages= $user->student->pages;
        $pages->motives_header_title = $request->header_title;
        $pages->motives_content_text = $request->content_text;
        $pages->motives_content_color = $request->content_color;
        $pages->motives_content_layout = $request->content_layout;

        $uploadedImage = $pages->motives_content_image;
        if($request->content_image){
            if(!$uploadedImage = $this->uploadImage($request, $user)) {
                return back();
                // Add proper error message
            } elseif($uploadedImage) {
                // If image was uploaded successfully, delete the old image
                $this->deleteImage($pages->motives_content_image);
            }
        }

        $pages->motives_content_image = $uploadedImage;

        $pages->save();

        return redirect()->route('motives', $user->student->slug);
    }

    public function manageExploration() {
        $user = User::with('student')->where('id', Auth::user()->id)->firstOrFail();
        $pageData = [
            'header_title' => $user->student->pages->exploration_header_title,
            'content_text' => $user->student->pages->exploration_content_text,
            'content_color' => $user->student->pages->exploration_content_color,
            'content_image' => $user->student->pages->exploration_content_image,
            'content_layout' => $user->student->pages->exploration_content_layout,
        ];

        return view('manage', [
            'student' => $user->student,
            'pageData' => $pageData,
            'title' => 'Werkexploratie aanpassen',
        ]);
    }

    public function processManageExploration(Request $request) {
        $user = User::with('student')->where('id', Auth::user()->id)->firstOrFail();
        $pages= $user->student->pages;
        $pages->exploration_header_title = $request->header_title;
        $pages->exploration_content_text = $request->content_text;
        $pages->exploration_content_color = $request->content_color;
        $pages->exploration_content_layout = $request->content_layout;

        $uploadedImage = $pages->exploration_content_image;
        if($request->content_image){
            if(!$uploadedImage = $this->uploadImage($request, $user)) {
                return back();
                // Add proper error message
            } elseif($uploadedImage) {
                // If image was uploaded successfully, delete the old image
                $this->deleteImage($pages->exploration_content_image);
            }
        }

        $pages->exploration_content_image = $uploadedImage;

        $pages->save();

        return redirect()->route('exploration', $user->student->slug);
    }

    public function manageExperience()
    {
        $user = User::with('student')->where('id', Auth::user()->id)->firstOrFail();
        $pageData = [
            'header_title' => $user->student->pages->experience_header_title,
            'content_text' => $user->student->pages->experience_content_text,
            'content_color' => $user->student->pages->experience_content_color,
            'content_image' => $user->student->pages->experience_content_image,
            'content_layout' => $user->student->pages->experience_content_layout,
        ];

        return view('manage', [
            'student' => $user->student,
            'pageData' => $pageData,
            'title' => 'Loopbaansturing aanpassen',
        ]);
    }

    public function processManageExperience(Request $request) {
        $user = User::with('student')->where('id', Auth::user()->id)->firstOrFail();
        $pages= $user->student->pages;
        $pages->experience_header_title = $request->header_title;
        $pages->experience_content_text = $request->content_text;
        $pages->experience_content_color = $request->content_color;
        $pages->experience_content_layout = $request->content_layout;

        $uploadedImage = $pages->experience_content_image;
        if($request->content_image){
            if(!$uploadedImage = $this->uploadImage($request, $user)) {
                return back();
                // Add proper error message
            } elseif($uploadedImage) {
                // If image was uploaded successfully, delete the old image
                $this->deleteImage($pages->experience_content_image);
            }
        }

        $pages->experience_content_image = $uploadedImage;

        $pages->save();

        return redirect()->route('experience', $user->student->slug);
    }

    public function manageNetworks() {
        $user = User::with('student')->where('id', Auth::user()->id)->firstOrFail();
        $pageData = [
            'header_title' => $user->student->pages->networks_header_title,
            'content_text' => $user->student->pages->networks_content_text,
            'content_color' => $user->student->pages->networks_content_color,
            'content_image' => $user->student->pages->networks_content_image,
            'content_layout' => $user->student->pages->networks_content_layout,
        ];

        return view('manage', [
            'student' => $user->student,
            'pageData' => $pageData,
            'title' => 'Netwerken aanpassen',
        ]);
    }

    public function processManageNetworks(Request $request) {
        $user = User::with('student')->where('id', Auth::user()->id)->firstOrFail();
        $pages= $user->student->pages;
        $pages->networks_header_title = $request->header_title;
        $pages->networks_content_text = $request->content_text;
        $pages->networks_content_color = $request->content_color;
        $pages->networks_content_layout = $request->content_layout;

        $uploadedImage = $pages->networks_content_image;
        if($request->content_image){
            if(!$uploadedImage = $this->uploadImage($request, $user)) {
                return back();
                // Add proper error message
            } elseif($uploadedImage) {
                // If image was uploaded successfully, delete the old image
                $this->deleteImage($pages->networks_content_image);
            }
        }

        $pages->networks_content_image = $uploadedImage;

        $pages->save();

        return redirect()->route('networks', $user->student->slug);
    }

    private function uploadImage(Request $request, User $user) {
        try{
            // Check if uploaded image is correct, and if the image name already exists
            if($request->validate(['content_image' => 'image|mimes:jpg,png,jpeg,gif|max:10240',])) {

                // Create directory if it does not already exist
                Storage::makeDirectory('public/images/'. $user->student->slug);

                // Upload the image
                $src = Storage::putFile('public/images/'. $user->student->slug, $request->content_image);
                $src = str_replace('public', 'storage', $src);

                return $src;
            } else {
                // TODO: Return proper "validation" error
                return false;
            }
        } catch (\Exception $e) {
            // TODO: Return proper "validation" error (form is likely missing encoding)
            return false;
        }
    }

    private function deleteImage($image) {
        $src = str_replace('storage/', 'public/', $image);
        Storage::delete($src);
    }

    
}
