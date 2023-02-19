<?php
    
    include 'connect.php';
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $image = $_FILES['file'];

        $imageName=$image['name'];
        $imageTempName=$image['tmp_name'];
        $imageError=$image['error'];

        // seperating extention from image name;
        $imageExtensionSeperate = explode('.',$imageName);
        $imageExtension = strtolower($imageExtensionSeperate[1]);
        $extensionArray = ['jpeg','jpg','png'];

        if(in_array($imageExtension,$extensionArray)){
            $upload_image = 'images/'.$imageName;
            move_uploaded_file($imageTempName,$upload_image);
            $sql = "insert into `gallary_images`(name,image) values('$name','$upload_image')";
            $result = mysqli_query($con,$sql);
            if($result){
                header('location:display.php');
            }else{
                die(mysqli_error($con));
            }
        }
    }

?>