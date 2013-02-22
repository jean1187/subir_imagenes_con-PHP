<?php
if(!empty($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
    require_once 'class/ModifiedImage.php';
 
    $image = new ModifiedImage($_FILES['image']['tmp_name']);
 
    $original = 'original_' . $_FILES['image']['name'];
    $image->save($original);
?>
Imagenes grabadas:
<img src="output.php?picture=<?php echo "images/p_images/".$original; ?>&resizeType=width&resizeValue=300" />
<img src="output.php?picture=<?php echo "images/p_images/".$original; ?>&resizeType=height&resizeValue=200" />
<img src="output.php?picture=<?php echo "images/p_images/".$original; ?>&resizeType=scale&resizeValue=50" />
<img src="output.php?picture=<?php echo "images/p_images/".$original; ?>&resizeType=resize&resizeValue=200,300" />
<?php } ?>
 
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="image" />
    <input type="submit" name="submit" value="Upload" />
</form>
