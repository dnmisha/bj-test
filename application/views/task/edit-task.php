<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 02.09.17
 * Time: 18:24
 * @var $task \Mvc\Application\Models\Task
 */
use Mvc\Application\Models\Task;

?>
<?php if (isset($error)): ?>
    <div class="alert alert-warning">
        <?= $error; ?>
    </div>
<?php endif; ?>
<form id="formNewTask" name="new-task" method="post" class="form-horizontal">

    <div class="col-lg-4">
        <div class="form-group">
            <label class="control-label col-sm-2" for="user_name">Имя:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" required id="user_name" name="user_name"
                       value="<?= htmlspecialchars($task->user_name); ?>"
                       placeholder="Ваше имя">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" required id="email" name="email"
                       value="<?= htmlspecialchars($task->email); ?>"
                       placeholder="Введите почтовый адрес">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Статус:</label>
            <div class="col-sm-10">

                <select name="status" id="statusFilter">
                    <?php foreach (Task::getStatusName() as $key => $option): ?>
                        <option <?= ($key == $task->status) ? 'selected' : '' ?>
                                value="<?= $key; ?>"><?= $option; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="form-group">
            <div class="pull-left">
                <label class="control-label col-sm-2" for="image">Изображение:</label><br>
                <div class="clearfix"></div>
                <div class="col-sm-10">
                    <input id="fileupload" type="file" name="imageUpload" data-url="/image/task-image-upload"
                           multiple>
                    <input type="hidden" name="image" value="<?= $task->image ?>" id="hiddenImage">
                </div>
            </div>
            <div id="preview" class="pull-left">
                <img src="<?= htmlspecialchars($task->image); ?>" data-url="" alt="">
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <div class="col-sm-12">
                            <textarea name="text" class="form-control" rows="8" required id="text"
                                      placeholder="Ваш текст"><?= htmlspecialchars($task->text); ?></textarea>
            </div>
        </div>
    </div>

    <div class="col-lg-3 pull-right text-right">
        <div class="form-eml">
            <button type="submit" onclick="skipSubmit = true;" class="btn btn-default">Сохранить</button>
        </div>
    </div>
    <div class="clearfix"></div>
</form>