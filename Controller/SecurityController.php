<?php

/**
 * Created by PhpStorm.
 * User: PHP acedemy
 * Date: 24.03.2016
 * Time: 20:06
 */
class SecurityController extends Controller
{
    public function loginAction(Request $request)
    {
        $form = new LoginForm($request);

        if ($request->isPost()) {
            if ($form->isValid()) {

                $model = new UserModel();
                $password = new Password($form->password);
                $email = $form->email;

                if ($user = $model->find($email, $password)) {
                    Session::set('user', $user['email']);

                    Session::setFlash('Signed in');
                    Router::redirect('/admin');
                }

                Session::setFlash('User not found');
                Router::redirect('/login');
            }

            Session::setFlash('Fill the fields');
        }

        return $this->render('login', compact('form'));
    }

    public function logoutAction(Request $request)
    {
        Session::remove('user');
        Router::redirect('/');
    }


    public function adminAction(Request $request)
    {
        if (!Session::has('user')) {
            Router::redirect('/');
        }

        return $this->render('admin');
    }

}