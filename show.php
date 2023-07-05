<!doctype html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<title>Hello, world!</title>
</head>
<body>

<a href="index.php" class="btn btn-primary">ADD USER</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">email</th>
      <th scope="col">password</th>
      <th scope="col">Image</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>


  <?php
    $conn = mysqli_connect("localhost","root","","imageupload");
    
    $q = mysqli_query($conn,"select * from userss");
    while ($row = mysqli_fetch_assoc($q)) {
    ?>

    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= $row['email'] ?></td>
      <td><?= $row['password'] ?></td>
      <td><img src="./images/<?php echo $row['pic']; ?>" width="100px"></td>

      <td><a href="edit.php?id=<?php echo $row["id"];?>" class="btn btn-success">Edit</a></td>
      <td><a href="" class="btn btn-danger">Delete</a></td>
    </tr>
    
    <?php
    }
  ?>
    
  </tbody>
</table>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>