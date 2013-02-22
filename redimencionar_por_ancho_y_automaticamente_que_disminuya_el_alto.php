<?php
if(!empty($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
    require_once 'class/ModifiedImage.php';
 
    $image = new ModifiedImage($_FILES['image']['tmp_name']);
 
    if($image->getWidth() > 400){
        $image->resizeToWidth(400);
        $w400 = 'w400_' . $_FILES['image']['name'];
        $image->save($w400);
    }
?>
Imagen grabada:
<a href="images/p_images/<?php echo $w400; ?>">400</a>
<?php } ?>
 
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="image" />
    <input type="submit" name="submit" value="Upload" />
</form>
