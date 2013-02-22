<html>
<head>
<style>
body{ background-color: #369; }
</style>
</head>
<body>
<?php
if(!empty($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
    require_once 'class/ModifiedImage.php';
 
    $image = new ModifiedImage($_FILES['image']['tmp_name'], true);
    $image->resizeToWidth($image->getWidth());
    $original = $_FILES['image']['name'];
    $image->save($original);
?>
Imagen grabada:
<img src="images/p_images/<?php echo $original; ?>" />
<?php } ?>
 
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="image" />
    <input type="submit" name="submit" value="Upload" />
</form>
</body>
</html>
