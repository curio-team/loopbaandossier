<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class ManageController extends Controller
{
    public function manageIntroduction()
    {
        $user = User::where('id', Auth::user()->id)->firstOrFail();
        $pageData = [
            'header_title' => $user->student->pages->introduction_header_title,
            'header_color' => $user->student->pages->introduction_header_color,
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
        $this->validateForm($request);

        $user = User::where('id', Auth::user()->id)->firstOrFail();
        $pages = $user->student->pages;
        $pages->introduction_header_title = $request->header_title;
        $pages->introduction_header_color = $request->header_color;
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
        $user = User::where('id', Auth::user()->id)->firstOrFail();
        $pageData = [
            'header_title' => $user->student->pages->qualities_header_title,
            'header_color' => $user->student->pages->qualities_header_color,
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
        $this->validateForm($request);

        $user = User::where('id', Auth::user()->id)->firstOrFail();
        $pages= $user->student->pages;
        $pages->qualities_header_title = $request->header_title;
        $pages->qualities_header_color = $request->header_color;
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
        $user = User::where('id', Auth::user()->id)->firstOrFail();
        $pageData = [
            'header_title' => $user->student->pages->motives_header_title,
            'header_color' => $user->student->pages->motives_header_color,
            'content_text' => $user->student->pages->motives_content_text,
            'content_color' => $user->student->pages->motives_content_color,
            'content_image' => $user->student->pages->motives_content_image,
            'content_layout' => $user->student->pages->motives_content_layout,
        ];

        return view('manage', [
            'student' => $user->student,
            'pageData' => $pageData,
            'title' => 'Motieven aanpassen',
        ]);
    }

    public function processManageMotives(Request $request) {
        $this->validateForm($request);

        $user = User::where('id', Auth::user()->id)->firstOrFail();
        $pages= $user->student->pages;
        $pages->motives_header_title = $request->header_title;
        $pages->motives_header_color = $request->header_color;
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
        $user = User::where('id', Auth::user()->id)->firstOrFail();
        $pageData = [
            'header_title' => $user->student->pages->exploration_header_title,
            'header_color' => $user->student->pages->exploration_header_color,
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
        $this->validateForm($request);

        $user = User::where('id', Auth::user()->id)->firstOrFail();
        $pages= $user->student->pages;
        $pages->exploration_header_title = $request->header_title;
        $pages->exploration_header_color = $request->header_color;
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
        $user = User::where('id', Auth::user()->id)->firstOrFail();
        $pageData = [
            'header_title' => $user->student->pages->experience_header_title,
            'header_color' => $user->student->pages->experience_header_color,
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
        $this->validateForm($request);

        $user = User::where('id', Auth::user()->id)->firstOrFail();
        $pages= $user->student->pages;
        $pages->experience_header_title = $request->header_title;
        $pages->experience_header_color = $request->header_color;
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
        $user = User::where('id', Auth::user()->id)->firstOrFail();
        $pageData = [
            'header_title' => $user->student->pages->networks_header_title,
            'header_color' => $user->student->pages->networks_header_color,
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
        $this->validateForm($request);

        $user = User::where('id', Auth::user()->id)->firstOrFail();
        $pages= $user->student->pages;
        $pages->networks_header_title = $request->header_title;
        $pages->networks_header_color = $request->header_color;
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

    public function processFeedback($studentSlug, $feedbackId) {
        $feedback = Feedback::findOrFail($feedbackId);
        if ($feedback->student->slug != $studentSlug) {
            abort(404);
        }

        $feedback->confirmed = true;
        $feedback->save();

        $this->assertAllFeedbackConfirmed($feedback->student);

        return back();
    }

    private function validateForm(Request $request) {
        $this->validate($request, [
            'header_color' => 'required|integer|min:1|max:15',
            'content_color' => 'required|integer|min:1|max:15',
            'content_image' => 'image|mimes:jpg,png,jpeg,gif|max:10240',
            'content_layout' => 'required|integer|min:1|max:4',
        ]);
    }

    private function uploadImage(Request $request, User $user) {
        // Create directory if it does not already exist
        Storage::makeDirectory('public/images/'. $user->student->slug);

        // Upload the image
        $src = Storage::putFile('public/images/'. $user->student->slug, $request->content_image);
        $src = str_replace('public', 'storage', $src);

        //ImageOptimizer::optimize($src);

        return $src;
    }

    private function deleteImage($image) {
        $src = str_replace('storage/', 'public/', $image);
        Storage::delete($src);
    }

    private function assertAllFeedbackConfirmed(Student $student) {
        $feedback = $student->feedback;
        foreach ($feedback as $feedbackItem) {
            if (!$feedbackItem->confirmed) {
                return;
            }
        }

        $student->requires_feedback = true;
        $student->save();
    }

}
