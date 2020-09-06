<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CekStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->jabatan === 'admin') {
        // $user =\App\Users::where('email',$request->email)->first();
        // // dd($user->jabatan);
        // if ($user->jabatan === 'admin') {
            return redirect('/admin');
        }
        
        return $next($request);
    }

}

// }if (Auth::user()->jabatan !== 'admin')
// // {
//     return redirect()->route('test');
// }
// return $next($request);
