<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'telepon' => 'required',
        ]);

        $id = auth()->user()->id;
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->telepon = $request->telepon;

        if ($request->file('profile_picture')) {
            $path = public_path("upload/profile/") . $user->avatar;
            try {
                unlink($path);
            } catch (\Throwable $th) {
            } finally {
                $date = date('H-i-s');
                $random = \Str::random(5);
                $request->file('profile_picture')->move('upload/profile', $date . $random . $request->file('profile_picture')->getClientOriginalName());
                $user->avatar = $date . $random . $request->file('profile_picture')->getClientOriginalName();
            }
        }
        $user->save();

        return redirect()->route('profile');
    }

    public function changePassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user != null) {
            return view('auth.passwords.reset2', compact('user'));
        }
        return redirect()->route('login');
    }

    public function updatePassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->password = app('hash')->make($request->password);
        $user->save();
        return redirect()->route('login');
    }
}
