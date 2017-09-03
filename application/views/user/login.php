<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 02.09.17
 * Time: 13:31
 */
?>
<?php if(isset($error)): ?>
    <div class="alert alert-warning">
      <?=$error;?>
    </div>
<?php endif; ?>

<form id="userLoginForm" method="post" class="form-horizontal">
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">login:</label>
        <div class="col-sm-10">
            <input type="text" name="login" class="form-control" required  placeholder="Enter login">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Password:</label>
        <div class="col-sm-10">
            <input type="password" name="password" class="form-control" required id="pwd" placeholder="Enter password">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
    </div>
</form>