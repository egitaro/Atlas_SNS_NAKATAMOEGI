<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RegisterFormRequest;  //RegisterFormRequestをつかうため

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

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

    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'username' => 'required|string|max:255',
    //         'mail' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:4|confirmed',
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    //  createの関数を準備したところ↓↓↓　下で使うためにね
    // 配列に一回入れるための関数みたいだよ　create関数にいれた
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']), //bcryptがパスワードをハッシュ化してくれている！
        ]);
    }

    public function registerShow(){  //get送信
        return view('auth.register');
    }

    public function register(RegisterFormRequest $request){  //post送信

            $data = $request->input();
            $username = $data['username'];

            $this->create($data);
            return redirect('added') -> with('username',$username);
        }


    public function added(){
        return view('auth.added');
    }
}
