<?php
if(!empty($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
   require_once 'class/ModifiedImage.php';
 
   $image = new ModifiedImage($_FILES['image']['tmp_name'],true);
   $img = 'img_' . $_FILES['image']['name'];
   $image->resizeToFit(268, 202, true, 'alpha');
   $image->save($img);
?>
Imagen grabada:
<img src="images/p_images/<?php echo $img; ?>" />
<?php } ?>
 
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
   <input type="file" name="image" />
   <input type="submit" name="submit" value="Upload" />
</form>
