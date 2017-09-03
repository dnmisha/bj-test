<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 02.09.17
 * Time: 16:50
 * @var $task Task
 */
use Mvc\Application\Models\Task;
use Mvc\Application\Models\User;

?>
<div class="row">
    <div class="col-lg-12">
        <table id="taskTable" class="display" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>id</th>
                <th>Имя пользователя</th>
                <th>E-mail</th>
                <th>Текст задачи</th>
                <th>Изображение</th>
                <th>
                    Статус
                    <select name="filter_value" id="statusFilter">
                        <option value="-"></option>
                        <?php foreach ( Task::getStatusName() as $key=>$option): ?>
                            <option value="<?=$option;?>"><?=$option;?></option>
                        <?php endforeach; ?>
                    </select>
                </th>
                <?php if(User::isAdmin(\Mvc\Core\MvcKernel::$app->user)): ?>
                    <th> </th>
                <?php endif; ?>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>id</th>
                <th>Имя пользователя</th>
                <th>E-mail</th>
                <th>Текст задачи</th>
                <th>Изображение</th>
                <th>
                </th>
                <?php if(User::isAdmin(\Mvc\Core\MvcKernel::$app->user)): ?>
                    <th> </th>
                <?php endif; ?>
            </tr>
            </tfoot>
            <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= $task->id;?></td>
                    <td><?= htmlspecialchars($task->user_name);?></td>
                    <td><?= htmlspecialchars($task->email);?></td>
                    <td><?= htmlspecialchars($task->text);?></td>
                    <td><img src="<?=$task->image?>" alt="<?= htmlspecialchars($task->user_name);?>"></td>
                    <td><?= Task::getStatusName((int)$task->status);?></td>
                    <?php if(User::isAdmin(\Mvc\Core\MvcKernel::$app->user)): ?>
                      <td><a href="/task/edit/<?= $task->id;?>">редактировать</a></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="col-lg-12">
        <hr>
        <a class=" pull-right btn btn-default" href="/task/add">Добавить задачу</a>
    </div>
</div>
