<?php

namespace App\Http\Middleware;

use App\Models\Student;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActiveStudent
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
        if (Student::where('slug', $request->route()->studentSlug)->first()->user->active ||
            Auth::user()->is_admin ||
            Auth::user()->teacher ||
            Auth::user()->student->slug == $request->route()->studentSlug) {
            return $next($request);
        }

        abort(404);
    }
}
