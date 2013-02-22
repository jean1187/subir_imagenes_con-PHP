<?php
if(!empty($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
   require_once 'class/ModifiedImage.php';
 
   $image = new ModifiedImage($_FILES['image']['tmp_name']);
   $original = 'original_' . $_FILES['image']['name'];
   /**
    * Position: top left
    * @see setPositionWatermark
    */
   $image->stringWatermark('forosdelweb.com', 20, 'ff0000', 'top left');
   $image->save($original);
?>
Imagen grabada:
<a href="images/p_images/<?php echo $original; ?>">Original</a>
<?php } ?>
 
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
   <input type="file" name="image" />
   <input type="submit" name="submit" value="Upload" />
</form>
