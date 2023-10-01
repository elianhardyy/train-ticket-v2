<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {   
        $param = $request->route('username');
        $title = "Profile";
        $method = $request->method();
        $user = User::where('username',$param)->first();
        $profile = Profile::where('users_id',$user->id)->first();
        
        return view('admin.profile',compact('profile','title'));
    }
    public function postprofile(Request $request)
    {
        $profile = $request->validate([
            "photo"=>"image|file",
            "users_id"=>"required"
        ]);
        if ($request->file('photo')) {
            $profile['photo'] = $request->file('photo')->store('profiles');
        }
        Profile::create($profile);
        return redirect('/dashboard');
    }

    public function editprofile(Request $request)
    {
        $param = $request->route('id');
                $profile = $request->validate([
                    "photo"=>"image|file",
                    "users_id"=>"required"
                ]);
                if ($request->file('image')) {
                    if ($request->oldImage) {
                        Storage::delete($request->oldImage);
                    }
                    $profile['photo'] = $request->file('image')->store('profiles');
                }
                Profile::where('users_id',$param)->update($profile);
        return redirect("/admin");
    }
}
