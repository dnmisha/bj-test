<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 02.09.17
 * Time: 15:16
 */
use Mvc\Application\Models\User;

?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/"><?=MvcKernel::$app->getAppName();?></a>
        </div>
        <ul class="nav navbar-nav pull-right">
            <?php if(!User::isAdmin(\Mvc\Core\MvcKernel::$app->user)): ?>
                <li><a href="/login">Login</a></li>
            <?php endif; ?>

        </ul>
    </div>
</nav>