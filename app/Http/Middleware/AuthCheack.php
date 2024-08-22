<?php

namespace App\Http\Middleware;

use App\Models\Users;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View as FacadesView;
use Symfony\Component\HttpFoundation\Response;

class AuthCheack
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Session()->has('loginId')){
            return redirect()->route('homelogin')->with('fail','Something weong');
        }
        $users = Users::find(Session::get('loginId'));

        if (!$users) {
            return redirect()->route('homelogin')->with('fail', 'User not found');
        }
        FacadesView::share('users', $users);
        // ตรวจสอบบทบาทของผู้ใช้
        if ($users->role === '1') {
            // สิทธิ์ admin ในการเข้าถึง

            return $next($request);
        } elseif ($users->role === '2') {
            // สิทธิ์ user ในการเข้าถึง
            return redirect()->route('logout')->with('fail', 'ไม่มีสิทธิ์');
        } else {
            // ผู้ใช้ไม่มีบทบาทที่ถูกกำหนด
            return redirect()->route('homelogin')->with('fail', 'User ไม่ถูกต้อง');
        }


    }
}
