<?php
    include 'connect.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Photo_Gallary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- css stylesheet -->
    <link rel="stylesheet" href="style.css">
    <!-- js link -->
    <script src="script.js" defer></script>
</head>

<body>

    <!-- navbar starts -->
    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand title">Photo_Gallary</a>
            <a class="btn btn-danger" href="#upload">Upload</a>
        </div>
    </nav>
    <!-- navbar ends -->

    <!-- gallary section starts -->
    <div class="container mt-5 text-center">
<!-- php logic to display data on screen -->
        <?php
            $sql = "select * from `gallary_images`";
            $result = mysqli_query($con,$sql);
            echo '<div class="row">';
            while($row = mysqli_fetch_assoc($result)){
                echo'
                    <div class="col my-1">
                        <img src='.$row['image'].'>
                        <p class="uploaderName">By:'.$row['name'].'</p>
                    </div>
                ';
            }
            echo '</div>';
        ?>

    </div>
    <!-- gallary section ends -->

    <!-- upload section starts -->
    <div class="container bg-body-tertiary my-5" style="width: 50%;padding: 1rem;font-weight: bold;" id="upload">
        <form action="server.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Your Name</label>
              <input type="text" name="name" placeholder="Enter your name here..." class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword2" class="form-label">Upload Your Image</label>
              <input type="file" name="file" class="form-control" id="exampleInputPassword2">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- upload section ends -->

    <!-- javascript cdn bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>