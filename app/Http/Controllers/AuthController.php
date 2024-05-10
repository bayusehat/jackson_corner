<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function createAdmin($code)
    {
        if($code === '213387'){
            $user = new User;
            $user->name = 'Superadmin';
            $user->email = 'superadmin';
            $user->password = Hash::make('superadmin123');
            if($user->save()){
                return 'Success';
            }else{
                return  'Error';
            }
        }else if($code === '8888'){
            $user = new User;
            $user->name = 'user';
            $user->email = 'user';
            $user->password = Hash::make('user123');
            if($user->save()){
                return 'Success';
            }else{
                return  'Error';
            }
        }else if($code === 'all'){
            $data = [
                ['sumatera1','atera123'],
                ['sumatera2','atera234'],
                ['strategic','tegic123'],
                ['greater','eater123'],
                ['store','store123'],
                ['wjava','java123'],
                ['cjava','java234'],
                ['ejava','java345'],
                ['earea','area123'],
                ['balkan','balkan123'],
                ['eindo','indo123'],

            ];
            foreach($data as $item){
                $user = new User;
                $user->name = $item[0];
                $user->email = $item[0];
                $user->password = Hash::make($item[1]);
                if($user->save()){
                    echo 'Success <br>';
                }else{
                    echo  'Error <br>';
                }
            }
        }
    }

    public function doLogin(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        $message = [
            'email.required' => 'Username is required.',
            'password.required' => 'Password is required.',
        ];

        $isValid = Validator::make($request->all(), $rules, $message);
        if($isValid->fails()){
            return back()->withErrors($isValid->errors())->withInput();
        }else{
            $data = [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ];

            if (Auth::Attempt($data)) {
                return redirect('/peserta');
            }else{
                return redirect('/')->with('failed','Terjadi kesalahan saat melalukan Login, periksa kembali inputan anda!')->withInput();
            }
        }
    }

    public function doLogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
