<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class OnlineStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){ // If the user is logged in, run some checks
            if (Auth::user()->teacher) { // If the user is a teacher, let them through
                return $next($request);
            } elseif(Auth::user()->student) { // If the user is a student, let them through if they are the student they are trying to access
                if (Auth::user()->student->id == $request->route()->studentId) {
                    return $next($request);
                } elseif (Student::where('id', $request->route()->studentId)->first()->online) { // If the user is a student, let them through if the student they are trying to access set their pages online
                    return $next($request);
                }
            }
        } elseif (Student::where('id', $request->route()->studentId)->first()->online) { // If the user is not a student, let them through if the student they are trying to access set their pages online
            return $next($request);
        }

        abort(404);
    }
}
