<?php
    $image = "image.jpg";
    $image_data = exif_read_data($image);
    if( isset($image_data['Orientation']) ) {
        $degree = 0;
        switch ($image_data['Orientation']) {
            case 1:
                $degree = 0;
                break;
            case 3:
                $degree = 180;
                break;
            case 6:
                $degree = 90;
                break;
            case 8:
                $degree = 270;
                break;
        }
        $new_image = imagecreatefromjpeg($image);
        $new_image = imagerotate($new_image, $degree, 0);
    }
    $filename = "roted-file.jpg";
    imagejpeg($new_image, $filename, 100);
?>
<!DOCTYPE html>
<html>
<head>
    <title>EXIF Demo | Codezma</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <h1>EXIF Image Rotation Details</h1>
        <hr size="2" color="#e1e1e1">
        <div class="row">
            <div class="col-md-6">
                <h3>Old Image</h3>
            </div>

            <div class="col-md-6">
                <img class="img img-thumbnail" src="<?php echo $image ?>">
            </div>

            <div class="col-md-12">
                <hr>
            </div>

            <div class="col-md-6">
                <h3>Updated Image</h3>
            </div>

            <div class="col-md-6">
                <img class="img img-thumbnail" src="<?php echo $filename ?>">
            </div>
        </div>
        <hr>
    </div>

</body>
</html>