<?php
if(!empty($_GET['picture']) && !empty($_GET['resizeType']) && !empty($_GET['resizeValue'])){
    require_once 'ModifiedImage.php';
 
    $image = new ModifiedImage($_GET['picture']);
    switch(strtolower($_GET['resizeType'])){
        case 'width':
            $image->resizeToWidth($_GET['resizeValue']);
            break;
        case 'height':
            $image->resizeToHeight($_GET['resizeValue']);
            break;
        case 'scale':
            $image->scale($_GET['resizeValue']);
            break;
        case 'resize':
            $e = explode(',', $_GET['resizeValue']);
            $image->resize($e[0], $e[1]);
            break;
    }
    header('Content-Type: ' . $image->getImageType());
    $image->output();
}
