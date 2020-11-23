<?php 
require 'vendor/autoload.php';
require 'config-cloud.php';
echo cl_image_tag('sample');
if(isset($_POST['gui'])){
    $filetemp = $_FILES['file']['tmp_name']; 
    $slug = $_POST['slug'];
//     echo $slug;
\Cloudinary\Uploader::upload($filetemp,array("public_id" => $slug ));
}
?>

<form method="post" enctype="multipart/form-data">
<input type="text" name="slug">
<input type="file" name="file">
<button type="submit" name="gui">gui</button>
</form>

<!-- <?php echo cl_image_tag($slug); ?> -->