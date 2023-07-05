<?php
    $conn = mysqli_connect("localhost","root","","imageupload");
    $id = $_GET["id"];
    $query = "SELECT * FROM `userss` WHERE `id`   = $id";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)){
        while($row = mysqli_fetch_assoc($result)){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

            <!-- form -->
<!-- -------------------------------------------------------- -->

<form action="#" method="POST" enctype="multipart/form-data">

    <img src="./images/<?php echo $row["pic"]?>" width="200px" alt="">

    <br><br>
    <input type="file" name="img"/>
    <br><br>


    <input type="submit" name="submit"/>


    <a href="show.php">Back to List</a>
    

</form>



</body>
</html>

<?php

if(isset($_POST["submit"])){

    
    $img_name = $_FILES["img"]["name"];
    $img_tmp = $_FILES["img"]["tmp_name"];

    move_uploaded_file($img_tmp,'./images/'.$img_name.'');

    unlink("./images/".$row["pic"]);

    $update = "UPDATE `userss` SET `pic`='$img_name' WHERE `id` = $id";
    mysqli_query($conn,$update);

    
    header("Location: edit.php?id=". $id);

    
}
        }}

?>