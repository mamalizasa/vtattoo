<?php
    require_once '../config/connect.php';
   $target_dir = "/";
   $target_file = $target_dir . basename($_FILES["photo"]['name']);
   $uploadOk = 1;
   $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
   if(isset($_FILES["photo"]['name'])) {
       $check = getimagesize($_FILES["photo"]["tmp_name"]);
       if($check !== false) {
           move_uploaded_file($_FILES["photo"]["tmp_name"], '../img_admin/'.$_FILES['photo']['name']);
           $uploadOk = 1;
           $theme_sql = $_POST['theme'];
           $file_path =  '/img_admin/'.$_FILES["photo"]['name'];
           $pics = $conn->query("INSERT INTO `galya`(`category`, `img_path`) VALUES ('$theme_sql','$file_path')");
           if ($pics == True) {
               echo "Фото добавлено в дб";
           } else {
               echo '<h2>Не получилось, не фортануло!</h2>';
           }
       } else {
           echo "File is not an image.";
           $uploadOk = 0;
       }
   }

?>