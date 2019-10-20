<?php

  session_start();

  require_once 'conn.php';

//login admin

 if (isset($_POST['adsub'])) {
    $email = $_POST['email'];
      $pass = md5($_POST['password']);
    

    $query = "SELECT * FROM admin WHERE EMAIL = '$email' AND PASSWORD = '$pass'";

    $result = mysqli_query($conn, $query);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
    $_SESSION['email'] = $email;
    header("Location: ../admin/adminpanel.php");
    }
    else{
      header("Location: ../admin/index.html");
    }
  }



   // admin edit profile

   //update picture

  $a = $_SESSION['email'];

 if (isset($_POST['picbtn'])) {
  
      $picture = $_FILES['picture']['name'];
      $tmp = $_FILES['picture']['tmp_name'];

      $q = "UPDATE admin SET PICTURES = '$picture' WHERE EMAIL = '$a'";

      $res = mysqli_query($conn, $q);

      if ($res) {
           move_uploaded_file($tmp, "../images/$picture");
           header("Location: ../admin/settings.php");
      } else {
      header("Location: ../admin/settings.php");
  }
}

  //update name

  if (isset($_POST['namupbtn'])) {
  
      $name = $_POST['name'];

      $q = "UPDATE admin SET AD_NAME = '$name' WHERE EMAIL = '$a'";

      $res = mysqli_query($conn, $q);

      if ($res) {
           
           header("Location: ../admin/settings.php");
      } else {
      header("Location: ../admin/settings.php");
  }
} 


  //update email

 if (isset($_POST['emaupbtn'])) {
  
      $email = $_POST['email'];

      $q = "UPDATE admin SET EMAIL = '$email' WHERE EMAIL = '$a'";

      $res = mysqli_query($conn, $q);

      if ($res) {
           
           header("Location: ../admin/settings.php");
      } else{
      header("Location: ../admin/settings.php");
  }
}


  //password

 if (isset($_POST['passupbtn'])) {
  
      $pass = md5($_POST['password']);

      $q = "UPDATE admin SET PASSWORD = '$pass' WHERE EMAIL = '$a'";

      $res = mysqli_query($conn, $q);

      if ($res) {
           
           header("Location: ../admin/settings.php");
      } else{
      header("Location: ../admin/settings.php");
  }

}

   //insert new admin


  if (isset($_POST['asub'])) {
      $name = $_POST['name'];
      $img = $_FILES['picture']['name'];
      $tmp = $_FILES['picture']['tmp_name'];
      $pass = md5($_POST['password']);
      $email = $_POST['email'];

      $q = "INSERT INTO admin (AD_NAME, PASSWORD, PICTURES, EMAIL) VALUES ('$name', '$pass', '$img', '$email') ";

      $res = mysqli_query($conn, $q);

      if ($res) {
        move_uploaded_file($tmp, "../images/$img");
        header("Location: ../admin/addnewadmin.php");
      }
     else{
      header("Location: ../admin/addnewadmin.php");;
     } 
  }

?>