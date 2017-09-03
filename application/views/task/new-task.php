<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 02.09.17
 * Time: 18:24
 */
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
                       placeholder="Ваше имя">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" required id="email" name="email"
                       placeholder="Введите почтовый адрес">
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
                    <input type="hidden" value="" id="hiddenImage">
                </div>
            </div>
            <div id="preview" class="pull-left">
                <img src="" data-url="" alt="">
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <div class="col-sm-12">
                            <textarea name="text" class="form-control" rows="8" required id="text"
                                      placeholder="Ваш текст"></textarea>
            </div>
        </div>
    </div>

    <div class="col-lg-3 pull-right text-right">
        <div class="form-eml">
            <button type="submit" onclick="previewTask()" class="btn btn-default">Предпросмотр</button>
            <button type="submit" onclick="skipSubmit = true;" class="btn btn-default">Сохранить</button>
        </div>
    </div>
    <div class="clearfix"></div>
</form>
<button id="previewTaskTrigger" class="hide" data-toggle="modal" data-target="#previewTask"></button>
<div id="output"><!-- error or success results --></div>
<div id="previewTask" class="modal   ">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Предпросмотр записи</h4>
            </div>
            <div class="modal-body">
            </div>
        </div>

    </div>
</div>