<?php

  session_start();

  require_once 'conn.php';

   //LOGIN ADMIN

    if (isset($_POST['adsub'])) {
      $email = $_POST['email'];
      $pass = base64_encode($_POST['password']);
    

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


   // MAIN ADMIN PROFILE UPDATE

   //UPDATE PICTURE

  $a = $_SESSION['email'];

 if (isset($_POST['pic_up_btn'])) {
  
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

  //UPDATE NAME

  if (isset($_POST['nam_up_btn'])) {
  
      $name = $_POST['name'];

      $q = "UPDATE admin SET AD_NAME = '$name' WHERE EMAIL = '$a'";

      $res = mysqli_query($conn, $q);

      if ($res) {
           
           header("Location: ../admin/settings.php");
      } else {
      header("Location: ../admin/settings.php");
  }
} 


  //UPDATE EMAIL

 if (isset($_POST['ema_up_btn'])) {
  
      $email = $_POST['email'];

      $q = "UPDATE admin SET EMAIL = '$email' WHERE EMAIL = '$a'";

      $res = mysqli_query($conn, $q);

      if ($res) {
           
           header("Location: ../admin/settings.php");
      } else{
      header("Location: ../admin/settings.php");
  }
}


  //UPDATE PASSWORD

 if (isset($_POST['password_up_btn'])) {
  
      $pass = base64_encode($_POST['password']);

      $q = "UPDATE admin SET PASSWORD = '$pass' WHERE EMAIL = '$a'";

      $res = mysqli_query($conn, $q);

      if ($res) {
           
           header("Location: ../admin/settings.php");
      } else{
      header("Location: ../admin/settings.php");
  }

}

  
  //DELETE ADMIN 
      
    if (isset($_POST['ad_del_sub'])) {

        $adid = $_POST['adid'];

        $q = "DELETE FROM admin WHERE AD_ID = '$adid'";

        $res = mysqli_query($conn, $q);

        if ($res) {
          header("Location: ../admin/index.html");
        }
        else {
          header("Location: ../admin/settings.php");
        }
      }


   //INSERT NEW ADMIN

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
        header("Location: ../admin/index.html");
      }
     else{
      header("Location: ../admin/addnewadmin.php");;
     } 
  }


    // UPDATE ADMIN PART FROM ADMIN PANEL

   //UPDATE PICTURE

  

 if (isset($_POST['adpic_up_btn'])) {
  
  $id = $_FILES['adid'];
      $picture = $_FILES['picture']['name'];
      $tmp = $_FILES['picture']['tmp_name'];

      $q = "UPDATE admin SET PICTURES = '$picture' WHERE AD_ID = '$id'";

      $res = mysqli_query($conn, $q);

      if ($res) {
        move_uploaded_file($tmp, "../images/$picture");
        header("Location: ../admin/adminpanel.php");
      }

      else {
      header("Location: ../admin/editprofile_admin.php");
  }
}

  //UPDATE NAME

  if (isset($_POST['n_up_btn'])) {
  
      $adid = $_POST['adid'];

      $name = $_POST['name'];

      $q = "UPDATE admin SET AD_NAME = '$name' WHERE AD_ID = '$adid'";

      $res = mysqli_query($conn, $q);

      if ($res) {
        header("Location: ../admin/editprofile_admin.php");
      }

      else {
        header("Location: ../admin/editprofile_admin.php");
  }
} 


  //UPDATE PASSWORD

    if (isset($_POST['pass_up_btn'])) {
  
      $adid = $_POST['adid'];
      
      $pass = base64_encode($_POST['password']);

      $q = "UPDATE admin SET PASSWORD = '$pass' WHERE AD_ID = '$adid'";

      $res = mysqli_query($conn, $q);

      if ($res) {
        header("Location: ../admin/editprofile_admin.php");
      } 
      else {
        header("Location: ../admin/editprofile_admin.php");
  }
}

    //DELETE FROM ADMIN LIST
      
      if (isset($_POST['ad_del_btn'])) {

        $adid = $_POST['adid'];

        $q = "DELETE FROM admin WHERE AD_ID = '$adid'";

        $res = mysqli_query($conn, $q);

        if ($res) {
          header("Location: ../admin/adminpanel.php");
        }
        else {
          header("Location: ../admin/adminpanel.php");
        }
      } 
    
    // ENDED UPDATE ADMIN PART FROM ADMIN PANEL

      // UPDATE CUSTOMER PART FROM ADMIN PANEL

   //UPDATE PICTURE

  $a = $_SESSION['email'];

 if (isset($_POST['pic_cus_up_btn'])) {
  
      $picture = $_FILES['picture']['name'];
      $tmp = $_FILES['picture']['tmp_name'];

      $q = "UPDATE customer SET PICTURES = '$picture' WHERE EMAIL = '$a'";

      $res = mysqli_query($conn, $q);

      if ($res) {
        move_uploaded_file($tmp, "../images/$picture");
        header("Location: ../admin/editprofile.php");
      }

      else {
      header("Location: ../admin/editprofile.php");
  }
}

  //UPDATE NAME

  if (isset($_POST['n_cus_up_btn'])) {
  
     $id = $_POST['id'];
     $name = $_POST['name'];

      $q = "UPDATE customer SET CUSTOMER_NAME = '$name' WHERE CUSTOMER_ID = '$id'";

      $res = mysqli_query($conn, $q);

      if ($res) {
        header("Location: ../admin/editprofile.php");
      }

      else {
        header("Location: ../admin/editprofile.php");
  }
} 

  
    //UPDATE GENDER

  if (isset($_POST['gen_cus_up_btn'])) {
  
      $id = $_POST['id'];
      $gen = $_POST['gender'];

      $q = "UPDATE customer SET GENDER = '$gen' WHERE CUSTOMER_ID = '$id'";

      $res = mysqli_query($conn, $q);

      if ($res) {
        header("Location: ../admin/editprofile.php");
      }

      else {
        header("Location: ../admin/editprofile.php");
  }
} 


  //UPDATE CNIC NUMBER

 if (isset($_POST['cnic_cus_up_btn'])) {
  
      $id = $_POST['id'];
      $cnic = $_POST['cnicnumber'];


      $q = "UPDATE customer SET CNIC_NUMBER = '$cnic' WHERE CUSTOMER_ID = '$id'";

      $res = mysqli_query($conn, $q);

      if ($res) {
        header("Location: ../admin/editprofile.php");
      } 
      else {
        header("Location: ../admin/editprofile.php");
  }
}


    //UPDATE DATE OF BIRTH

  if (isset($_POST['dob_cus_up_btn'])) {
  
      $id = $_POST['id'];
      $dob = $_POST['date_of_birth'];

      $q = "UPDATE customer SET DATE_OF_BIRTH = '$dob' WHERE CUSTOMER_ID = '$id'";

      $res = mysqli_query($conn, $q);

      if ($res) {
        header("Location: ../admin/editprofile.php");
      }

      else {
        header("Location: ../admin/editprofile.php");
  }
} 


  //UPDATE CITY

 if (isset($_POST['city_cus_up_btn'])) {
  
      $id = $_POST['id'];
      $city = $_POST['city'];

      $q = "UPDATE customer SET CITY = '$city' WHERE CUSTOMER_ID = '$id'";

      $res = mysqli_query($conn, $q);

      if ($res) {
        header("Location: ../admin/editprofile.php");
      } 
      else {
        header("Location: ../admin/editprofile.php");
  }
}


    //UPDATE COUNTRY

  if (isset($_POST['coun_cus_up_btn'])) {
  
      $id = $_POST['id'];
      $country = $_POST['country'];

      $q = "UPDATE customer SET COUNTRY = '$country' WHERE CUSTOMER_ID = '$id'";

      $res = mysqli_query($conn, $q);

      if ($res) {
        header("Location: ../admin/editprofile.php");
      }

      else {
        header("Location: ../admin/editprofile.php");
  }
} 


  //UPDATE REVIEW

 if (isset($_POST['rev_cus_up_btn'])) {
  
      $id = $_POST['id'];
      $rev = $_POST['rev'];

      $q = "UPDATE customer SET REVIEW = '$rev' WHERE CUSTOMER_ID = '$id'";

      $res = mysqli_query($conn, $q);

      if ($res) {
        header("Location: ../admin/editprofile.php");
      } 
      else {
        header("Location: ../admin/editprofile.php");
  }
}


    //UPDATE FEES

  if (isset($_POST['fees_cus_up_btn'])) {
  
      $id = $_POST['id'];
      $fees = $_POST['fees'];

      $q = "UPDATE customer SET FEES = '$fees' WHERE CUSTOMER_ID = '$id'";

      $res = mysqli_query($conn, $q);

      if ($res) {
        header("Location: ../admin/editprofile.php");
      }

      else {
        header("Location: ../admin/editprofile.php");
  }
} 


  //UPDATE ROLE

    /*if (isset($_POST['role_cus_up_btn'])) {
  
      $id = $_POST['id']
      $Role = $_POST['role'];

      $q = "UPDATE customer SET ROLE = '$Role' WHERE CUSTOMER_ID = '$id'";

      $res = mysqli_query($conn, $q);

      if ($res) {
        header("Location: ../admin/editprofile.php");
      } 
      else {
        header("Location: ../admin/editprofile.php");
  }
}*/


  //UPDATE PASSWORD

    if (isset($_POST['pass_cus_up_btn'])) {
  
      $id = $_POST['id'];
      $pass = base64_encode($_POST['password']);

      $q = "UPDATE customer SET PASSWORD = '$pass' WHERE CUSTOMER_ID = '$id'";

      $res = mysqli_query($conn, $q);

      if ($res) {
        header("Location: ../admin/editprofile.php");
      } 
      else {
        header("Location: ../admin/editprofile.php");
  }
}

      //DELETE CUSTOMER FROM ADMIN PANEL 
      
    if (isset($_POST['cus_del_sub'])) {

        $id = $_POST['id'];

        $q = "DELETE FROM customer WHERE CUSTOMER_ID = '$id'";

        $res = mysqli_query($conn, $q);

        if ($res) {
          header("Location: ../admin/adminpanel.php");
        }
        else {
          header("Location: ../admin/adminpanel.php");
        }
      }

    //ENDED UPDATE CUSTOMER PART FROM ADMIN PANEL      

      // UPDATE REVIEW PART FROM ADMIN PANEL    

      if (isset($_POST['rev_up_btn'])) {

      $id = $_POST['id'];

      $review = $_POST['name'];

      $q = "UPDATE customer SET REVIEW = '$review' WHERE CUSTOMER_ID = '$id'";

      $res = mysqli_query($conn, $q);

      if ($res) {
        header("Location: ../admin/editreview.php");
      }

      else {
        header("Location: ../admin/editreview.php");
        }
      }

      //ENDED UPDATE REVIEW PART FROM ADMIN PANEL  


      //DELETE NOTIFICATIONS FROM ADMIN PANEL 

      if (isset($_POST['not_del_sub'])) {

        $id = $_POST['id'];

        $q = "DELETE FROM notification WHERE NOTIFICATIONS ID = '$id'";

        $res = mysqli_query($conn, $q);

        if ($res) {
          header("Location: ../admin/adminpanel.php");
        }
        else {
          header("Location: ../admin/adminpanel.php");
        }
      }

    //ENDED DELETE NOTIFICATION PART FROM ADMIN PANEL 

?>