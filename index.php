<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>


<!--  ============== Form =================== -->
    
<form  action = "index.php" method = "POST" enctype="multipart/form-data" >
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control"  name="txtname" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="txtpassword" id="exampleInputPassword1" placeholder="Password">
  </div>

  <div class="form-group">
    <label for="">Picture</label>
    <input type="file" class="form-control" name="pic" id="exampleInputEmail1" aria-describedby="emailHelp" >
  </div>
 
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>


<?php

if(isset($_POST["submit"])){

    $email=$_POST['txtname'];
    $password=$_POST['txtpassword'];
    $image= $_FILES['pic'];
    $imagename = $image['name'];
    $tempimagename = $image['tmp_name'];

    // new
    //$img_type = $_FILES["pic"]["type"];
//$img_size = $_FILES["pic"]["size"];

    
    //f($img_type == "image/bmp" || $img_type == "image/jpg" || $img_type == "image/png" || $img_type == "image/jpeg" ){
    

   // if($img_size <= 2000000){
   
    $conn = mysqli_connect("localhost","root","","imageupload");
    
    if(!$conn){
        echo "connection refuse";
    } else{
        echo "connection OKK";
    }
    
    $query = "INSERT INTO `userss`(`id`, `email`, `password`, `pic`) VALUES (null,'$email','$password','$imagename')";
    // "insert into user values(null,'$email','$password','$imagename')"
    
    move_uploaded_file($tempimagename,'./images/'.$imagename.'');
    $q = mysqli_query($conn,$query);
    
    if(!$q){
        echo "query not" ;
    }else{
        echo "query yes" ;
    
    }
    header('Location:index.php');
  }
 // else{
  //  echo "file is > 2 mb";
  //}
 // }
  //else{
   // echo "invalid type";
  //}
}

?>