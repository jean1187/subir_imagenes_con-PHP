<?php
if(!empty($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
    require_once 'class/ModifiedImage.php';
 
    $image = new ModifiedImage($_FILES['image']['tmp_name']);
 
    $original = 'original_' . $_FILES['image']['name'];
    $image->save($original);
 
    if($image->getWidth() > 400){
        $image->resizeToWidth(400);
        $w400 = 'w400_' . $_FILES['image']['name'];
        $image->save($w400);
    }
 
    if($image->getWidth() > 300){
        $image->resizeToWidth(300);
        $w300 = 'w300_' . $_FILES['image']['name'];
        $image->save($w300);
    }
 
    if($image->getWidth() > 150){
        $image->resizeToWidth(150);
        $w150 = 'w150_' . $_FILES['image']['name'];
        $image->save($w150);
    }
?>
Imagenes grabadas:
<a href="images/p_images/<?php echo $original; ?>">Original</a>
<a href="images/p_images/<?php echo $w400; ?>">400</a>
<a href="images/p_images/<?php echo $w300; ?>">300</a>
<a href="images/p_images/<?php echo $w150; ?>">150</a>
<?php } ?>
 
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="image" />
    <input type="submit" name="submit" value="Upload" />
</form>
