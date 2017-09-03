<?php

namespace Mvc\Application\Controllers;

use Exception;
use Mvc\Application\Models\Task;
use Mvc\Application\Models\User;
use Mvc\Components\ImageResize;
use Mvc\Components\UploadHandler;
use Mvc\Core\Base\BaseController;
use Mvc\Core\Base\BaseException;
use Mvc\Core\MvcKernel;


class TaskController extends BaseController
{
    /**
     * @return string
     */
    public function actionAdd()
    {
        if(MvcKernel::$app->request->isPost()){
            Task::createNewTask(MvcKernel::$app->request->post());
            MvcKernel::$app->request->redirect('/');
        }
        return $this->render('new-task');
    }

    public function actionEdit($id = null)
    {
        if(is_numeric($id) && MvcKernel::$app->user && User::isAdmin(MvcKernel::$app->user)){
            $task = Task::find('task')->getRecord('*','WHERE id = :id',['id'=>(int)$id])->one();
            if(!$task) throw new BaseException('Task not found',404);
            if(MvcKernel::$app->request->isPost()){
                Task::updateTask(MvcKernel::$app->request->post(),$id);
                MvcKernel::$app->request->redirect('/task/edit/'.(int)$id);
            }
            $task = Task::find('task')->getRecord('*','WHERE id = :id',['id'=>(int)$id])->one();
            return $this->render('edit-task', compact('task'));
        }
        throw new BaseException('Access denied',403);
    }
}