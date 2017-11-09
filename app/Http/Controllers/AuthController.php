<?php

namespace App\Http\Controllers;

use App\Model\Log;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function index(Request $request)
    {

        $count = null;
        $name = null;

        if ($authId = $request->session()->get('user')) {
            $user = User::find($authId);
            $count = Log::getCountAuth($user->email);
            $name = $user->name;
        }

        return view('index', compact('authId', 'count', 'name'));
    }

    public function in()
    {
        return view('layouts.header_in');
    }

    public function out()
    {
        return view('layouts.header_out');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function forgotPass()
    {
        return view('auth/forgot_pass');
    }

    public function changePassword(Request $request)
    {
        $email = $request->input('email');
        $user = User::findEmail($email);

        if ($request->input('password') === $request->input('repassword')) {
            $user->password = md5($request->input('password'));
            $user->save();

            return response(Response::HTTP_OK);
        } else {
            return response('Пароли не совпадают', Response::HTTP_BAD_REQUEST);
        }
    }

    public function passwordRecovery(Request $request)
    {
        if($user = User::findEmail($request->input('email'))) {
            if($user->secret_phrase == md5($request->input('secret_phrase'))){
                return response(Response::HTTP_OK);
            }
        }

        return response(
            'Неверна секретная фраза или почта',
            Response::HTTP_BAD_REQUEST
        );
    }

    public function home(Request $request)
    {
        $authId = $request->session()->get('user');
        $user = User::find($authId);
        $count = Log::getCountAuth($user->email);
        $name = $user->name;

        return view('home', compact('name','count', 'authId'));
    }

    public function authenticate(Request $request)
    {
        $success = false;

        $record = User::findEmail($request->input('email'));
        if ($record != null) {
            if ($record->password == md5($request->input('password'))) {
                $success = true;
            }
        }

        Log::create([
            'ip_address' => $request->ip(),
            'login' => $request->input('email'),
            'password' => $request->input('password'),
            'success' => $success,
        ]);

        if ($success) {
            $request->session()->put('user', $record->getKey());
            $countAuth = Log::getCountAuth($record->email);

            return view('home', [
                'name' => $record->name,
                'count' => $countAuth,
                'authId' => $record->id
            ]);
        } else {
            return response(
                'Неправильный логин или пароль',
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    public function logOut(Request $request)
    {
        $request->session()->remove('user');
        $authId = null;

        return view('auth.login', compact('authId'));
    }

    public function performRegister(Request $request)
    {
        if(User::findEmail($request->input('email'))) {
            return response(
                'Пользователь с таким почтовым адресом уже имеется.
            Пожалуйста, выберите другой',
            Response::HTTP_BAD_REQUEST);
        }

        if ($request->input('password') !== $request->input('password-confirm')) {
            return response('Пароли не совпадают', Response::HTTP_BAD_REQUEST);
        }

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'remember_token' => $request->input('_token'),
            'password' => md5($request->input('password')),
            'secret_phrase' => md5($request->input('secret_phrase')),
        ]);

        return response(Response::HTTP_OK);
    }
}

