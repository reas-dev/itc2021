<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

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
    public function redirectTo(){

        // User role
        $role = Auth::user()->role;

        // Check user role
        switch ($role) {
            case 'admin':
                    return '/admin';
                break;
            case 'participant':
                    return '/participant';
                break;
            default:
                    return '/logout';
                break;
        }
    }

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
            'name' => ['required', 'string', 'min:4', 'max:50'],
            'email' => ['required', 'string', 'email:rfc', 'min:10', 'max:50','unique:users'],
            'username' => ['required', 'string', 'min:4', 'max:16','unique:users', 'alpha_num'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'key-access' => [
                'required',
                Rule::in(['macanfasilkom', 'collaborative']),
            ],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if ($data['key-access'] == 'macanfasilkom')
        {
            return User::create([
                'name' => $data['name'],
                'username' => $data['username'],
                'email' => $data['email'],
                'role' => 'participant',
                'password' => Hash::make($data['password']),
            ]);
        }
        elseif ($data['key-access'] == 'collaborative')
        {
            return User::create([
                'name' => $data['name'],
                'username' => $data['username'],
                'email' => $data['email'],
                'role' => 'admin',
                'password' => Hash::make($data['password']),
            ]);
        }
        else
        {
            return back();
        }
    }
}
