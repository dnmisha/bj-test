<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 02.09.17
 * Time: 16:50
 */

namespace Mvc\Application\Models;


use Mvc\Core\Base\BaseModel;
use Mvc\Core\MvcKernel;

class Task extends BaseModel
{
    public $currentTable = 'task';

    public $user_name;
    public $email;
    public $text;
    public $image;
    public $created;
    public $updated;
    public $status;

    const STATUS_NEW = 1;
    const STATUS_CANCELED = 2;
    const STATUS_FINISHED = 3;
    const STATUS_NEED_FIX = 4;
    const STATUS_COMPLETED = 5;

    public function fields()
    {
        return [
            'user_name',
            'email',
            'text',
            'image',
            'created',
            'updated',
            'status',
        ];
    }

    public static function generateRandomTask()
    {
        for ($i = 0; $i <= 100; $i++) {
            $task = new Task();
            $task->user_name = uniqid();
            $task->email = $task->user_name . '@mail.com';
            $task->text = uniqid();
            $task->created = time();
            $task->updated = time();
            $task->status = self::STATUS_NEW;
            $task->save();
        }
    }

    /**
     * @param null $status
     * @return array
     */
    public static function getStatusName($status = null)
    {
        $statuses = [
            self::STATUS_NEW => 'Новая',
            self::STATUS_CANCELED => 'Отменена',
            self::STATUS_FINISHED => 'Завершена исполнителем',
            self::STATUS_NEED_FIX => 'Требует правки',
            self::STATUS_COMPLETED => 'Выполнена',
        ];
        if ($status !== null) {
            return (array_key_exists($status, $statuses)) ? $statuses[$status] : '-';
        }
        return $statuses;
    }

    /**
     * @param $data
     * @return Task
     */
    public static function createNewTask($data){
        $task = new Task();
        $task->loadData($data);
        if(isset($_SESSION['lastImageUpload'])){
            $task->image = $_SESSION['lastImageUpload'];
            unset($_SESSION['lastImageUpload']);
        }
        $task->status = Task::STATUS_NEW;
        $task->text = preg_replace('/\s+?(\S+)?$/', '', substr($task->text, 0, 2000));;
        $task->save();
        return $task;
    }

    /**
     * @param $data
     * @param $taskId
     */
    public static function updateTask($data,$taskId){
        $taskModel = new Task();
        $taskModel->loadData($data);
        if(isset($_SESSION['lastImageUpload'])){
            $taskModel->image = $_SESSION['lastImageUpload'];
            unset($_SESSION['lastImageUpload']);
        }
        $taskModel->update(' WHERE id = '.(int)$taskId);
    }

}