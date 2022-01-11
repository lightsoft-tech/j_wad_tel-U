<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::CUSTOMER;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        /* $customer = new \App\Models\User();
        $customer->name = $data['name'];
        $customer->email = $data['email'];
        $customer->email_verified_at = now();
        $customer->password = Hash::make($data['password']);
        $customer->telepon = $data['telepon'];
        $customer->avatar = 'avatar.png';
        $customer->remember_token = \Str::random(60);
        $customer->created_at = now();
        $customer->updated_at = now();
        $customer->save(); */

        $customer = User::create([
            /* 'name' => $data['name'],
            'email' => $data['email'],
            'telepon' => $data['telepon'],
            'password' => Hash::make($data['password']), */
            'name' => $data['name'],
            'email' => $data['email'],
            'email_verified_at' => now(),
            'password' => Hash::make($data['password']),
            'telepon' => $data['telepon'],
            'avatar' => 'avatar.png',
            'remember_token' => \Str::random(60),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return $customer->assignRole('customer');
    }
}
