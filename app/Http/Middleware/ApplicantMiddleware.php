<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantMiddleware
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
        $user = Auth::user();

        if ($user->is_admin) {
            return back()->withErrors('You are not authorized');
        }

        $is_applicant = User::where('id', $user->id)->with('applicant')->first()->applicant;

        if (!$is_applicant) {
            return redirect(route('applicant.detail.add'))->withError('Please Update your job profile first');
        }


        return $next($request);
    }
}
