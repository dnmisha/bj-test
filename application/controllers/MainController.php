<?php

namespace Mvc\Application\Controllers;

use Mvc\Application\Models\Task;
use Mvc\Core\Base\BaseController;
use Mvc\Core\Base\BaseModel;

/**
 * Created by PhpStorm.
 * User: misha
 * Date: 02.09.17
 * Time: 12:36
 */
class MainController extends BaseController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $tasks = BaseModel::find('task')->getRecord('*', 'ORDER BY id DESC')->all();
        return $this->render('index', compact('tasks'));
    }

    /**
     * @return string
     */
    public function actionDemo()
    {
        return $this->render('demo', ['rw' => 'wd']);
    }
}