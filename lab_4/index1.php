<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style">
    <title>Image Gallery</title>
</head>
<body>

    <div class="jumbotron jumbotron-fluid">
        <div class="container-fluid">
            
                <h1>Image Gallery</h1>
            
        </div>
    </div>
    
        <div class="container-fluid">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="MAX_FILE_SIZE" value="100000000">
                <input class="btn btn-primary" type="file" name="file_upload">
                <input class="btn btn-primary" type="submit" name="submit" value="Upload">
            </form>    
        </div>
   

    <div class="container-fluid mt-3">

<?php

$upload_dir = "photos";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
         
        $tmp_file = $_FILES['file_upload']['tmp_name'];

        $target_file = basename($_FILES['file_upload']['name']);

        if (move_uploaded_file($tmp_file, $upload_dir . "/" . $target_file)) {
            //echo "<a href='$upload_dir'><img src='photos/$target_file' width='400' height='250' /></a>";
        
}}

if (is_dir($upload_dir)) {
    echo '<div class="card-columns">';
    $dir_array = scandir($upload_dir);
    foreach ($dir_array as $target_file) {
        if (strpos($target_file, '.') > 0) {
        
        echo "<div class='card'><img src='photos/$target_file' width='335px'/>
              <br><a class='btn btn-block btn-danger mt-1' name='del' href='?del=$target_file'>DELETE</a></div>";
    }
}
echo "</div>";
}

if (isset($_GET['del'])) {
    //unlink('uploads/flower.png') unlink("dir/".$_GET['delete'];
    //var_dump($_GET['del']); 
    unlink("./photos/" . $_GET['del']);
    header("location: index1.php");
    }

?>
</div>

</body>
</html>