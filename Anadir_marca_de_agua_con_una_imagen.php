<?php
if(!empty($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
   require_once 'class/ModifiedImage.php';
 
   $image = new ModifiedImage($_FILES['image']['tmp_name']);
   $original = 'original_' . $_FILES['image']['name'];
   /**
    * Position: middle center
    * @see setPositionWatermark
    */
   $image->imgWatermark('http://www.forosdelweb.com/w/skins/common/images/wiki.png', 30, 'middle center', 0, 0);
   $image->save($original);
?>
Imagen grabada:
<a href="images/p_images/<?php echo $original; ?>">Original</a>
<?php } ?>
 
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
   <input type="file" name="image" />
   <input type="submit" name="submit" value="Upload" />
</form>
