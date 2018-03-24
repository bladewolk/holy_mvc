<?php

namespace application\controllers;


use application\Core\Controller;
use application\Core\Validator;
use application\Models\User;

class AuthController extends Controller
{
    /**
     * @return \stdClass
     */
    public function index()
    {
        return view('login');
    }

    /**
     *
     */
    public function login()
    {
        $validator = new Validator($this->request->all(), [
            'login' => ['required'],
            'pass' => ['required'],
        ]);

        if ($validator->fails())
            redirectBack();

        $user = User::whereLogin($this->request->login)->first();

        if ($user == null) {
            session()->flashErrors(['auth' => 'Credential not found']);
            return redirectBack();
        }

        if (auth()->attempt($user, $this->request->pass, $user->pass)) {
            return redirect('/');
        }

        session()->flashErrors(['auth' => 'Credential not found']);

        return redirectBack();
    }

    /**
     *
     */
    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }
}