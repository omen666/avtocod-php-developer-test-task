<?php

namespace App\Http\Controllers\Auth;

use App\Models\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/';

    private $data = [];

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct() {
        $this->middleware('guest');
    }


    public function index() {
        return view('auth.register', $this->data);
    }

    public function register(Request $request) {

        $data = $request->all();
        $validator = $this->validator($request->all($data));
        if ($validator->fails()) {
            $this->data['messages'] = $validator->messages();
            return $this->index();
        }
        $this->create($data);
        return redirect()->route('main');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
            'name' => 'required|string|max:255|min:6|regex:/^\S*(?=\S*[a-z])(?=\S*[\d])\S*$/i',
            'password' => 'required|string|min:6|confirmed|regex:/^\S*(?=\S*[a-z])(?=\S*[\d])\S*$/',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     *
     * @return \App\Models\Users
     */
    protected function create(array $data) {
        return Users::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
