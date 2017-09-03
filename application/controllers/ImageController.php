<?php

namespace Mvc\Application\Controllers;

use Mvc\Application\Models\Task;
use Mvc\Components\ImageResize;
use Mvc\Components\UploadHandler;
use Mvc\Core\Base\BaseController;
use Mvc\Core\Base\BaseModel;
use Mvc\Core\Components\CoreHelper;
use Mvc\Core\MvcKernel;

/**
 * Created by PhpStorm.
 * User: misha
 * Date: 02.09.17
 * Time: 12:36
 */
class ImageController extends BaseController
{
    /**
     * @return string
     */
    public function actionTaskImageUpload()
    {
        if (isset($_FILES['imageUpload'])) {
            $uploadDir = 'web/files/task';
            $upload = UploadHandler::factory($uploadDir);
            $upload->file($_FILES['imageUpload']);
            $filename = uniqid() . '.' . pathinfo($_FILES['imageUpload']['name'], PATHINFO_EXTENSION);
            $upload->set_allowed_mime_types(['image/gif', 'image/jpeg', 'image/png']);
            if ($upload->check()) {
                $results= $upload->save($filename);
                $path = CoreHelper::baseUrl(true) . '/' . $results['path'];
                ImageResize::resizeImage($results['full_path'], '320x240', $results['full_path'], true);
                $_SESSION['lastImageUpload'] = $results['path'];
                unset($results['full_path']);
                $results['path'] = $path;
                echo json_encode($results);
                exit();
            } else {
                echo json_encode(['error' => $upload->get_errors()]);
                exit();
            }

        }
    }
}