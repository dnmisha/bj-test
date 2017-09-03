<?php

namespace Mvc\Application\Controllers;

use Mvc\Application\Models\User;
use Mvc\Core\Base\BaseController;
use Mvc\Core\MvcKernel;


class UserController extends BaseController
{
    /**
     * @return string
     */
    public function actionLogin()
    {
        if(MvcKernel::$app->user == null){
            if(MvcKernel::$app->request->isPost()){
                $user = User::signin(MvcKernel::$app->request->post());
                if(array_key_exists('error',$user)){
                    return $this->render('login',['error'=>$user['error']]);
                }
                MvcKernel::$app->request->redirect('/');
            }
            return $this->render('login');
        }
        MvcKernel::$app->request->redirect('/');
    }
    /**
     * @return string
     */
    public function actionRegistration()
    {

    }
}