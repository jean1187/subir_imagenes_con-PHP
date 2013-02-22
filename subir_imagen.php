<?php
if(!empty($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
    require_once 'class/ModifiedImage.php';
 
    $image = new ModifiedImage($_FILES['image']['tmp_name']);
    if(($message = $image->isValidExtension()) === true){
        $original = 'original_' . $_FILES['image']['name'];
        $image->save($original);
    }else{
        echo $message . '<br />';
    }
?>
Imagen grabada:
<a href="images/p_images/<?php echo $original; ?>">Original</a>
<?php } ?>
 
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="image" />
    <input type="submit" name="submit" value="Upload" />
</form>
