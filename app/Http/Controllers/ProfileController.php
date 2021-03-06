<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Carbon\Carbon;
use Hash;
class ProfileController extends Controller
{
    function profile(){
      return view('admin\profile\index');
    }

    function editProfilePost(Request $request){

        $request->validate([
            'name'=>'required'
        ]);

        if (Auth::user()->updated_at->addDays(30) < Carbon::now()) {

            User::find(Auth::id())->update([
                'name' => $request->name
            ]);
            return back()->with('name_change_status','Your name changed succussfully');

        }else {

            $left_days = Carbon::now()->diffInDays(Auth::user()->updated_at->addDays(30));
            return back()->with('name_change_status_error','You can change your name after '.$left_days. ' days');
        }
    }

     function editPasswordPost(Request $request)
        {

            // $request ->validate([
            //     'password'=>'confirmed|min:8|alpha_num'
            // ]);

            if (Hash::check($request->old_password, Auth::user()->password)) {

                if ($request->old_password == $request->password) {
                    return back()->with('password_error','Puran password abar disen');
                }else {

                    User::find(Auth::id())->update([

                        'password' =>  Hash::make($request->password)
                    ]);

                    return back();

                }
            }else {
                return back()->with('password_error','Your old password does not match with database');
            }
        }
}
