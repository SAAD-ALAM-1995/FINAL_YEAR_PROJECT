<?php

    session_start();


    require 'conn.php';
  
  
    //insert customer


  if (isset($_POST['csub'])) {
     $name = $_POST['name'];
     $email = $_POST['email'];
     $img = $_FILES['picture']['name'];
     $tmp = $_FILES['picture']['tmp_name'];
     $gender = $_POST['gender'];
     $nic = $_POST['nic'];
     $password = md5($_POST['password']);
     $dob = $_POST['dob'];
     $city = $_POST['city'];
     $country = $_POST['country'];
     $review = $_POST['review'];
     $role = $_POST['role'];
     $fees = $_POST['fees'];



     $query = "INSERT INTO customer (CUSTOMER_NAME, PICTURE, EMAIL, GENDER, CNIC_NUMBER, PASSWORD, DATE_OF_BIRTH, CITY, COUNTRY, REVIEW, FEES, ROLE) VALUES ('$name', '$img', '$email', '$gender', '$nic', '$password', '$dob', '$city', '$country', '$review', '$fees', '$role')";
                    
                  $res = mysqli_query($conn, $query);
                  
    

       if ($res) {
       	        
                move_uploaded_file($tmp, "../images/$img");
        $id = mysqli_insert_id($conn);
        $q = "INSERT INTO user (CUSTOMER_ID) VALUES ($id)";
        $res1 = mysqli_query($conn, $q);
        header("Location: ../login.html");  
  
       }


      else {
             header("Location: ../signup.html");  
       	         
       } 
  }



         //login customer and professional
     

 if (isset($_POST['clbtn'])) {
  
    $email = $_POST['email'];
      $pass = base64_encode($_POST['password']);


          $query = "SELECT * FROM customer WHERE EMAIL = '$email' AND PASSWORD = '$pass'";
                    
                  $res = mysqli_query($conn, $query);

                  $count = mysqli_num_rows($res);
                  
                if ($count == 1) {
               
       $_SESSION['email'] = $email;
        header("Location: ../customer/customerpanel.php");
     }
     else{
      header("Location: ../login.html");
     }    
  
       }



      
  //for customer id

  $a = $_SESSION['email'];

    $cid = "SELECT CUSTOMER_ID FROM customer WHERE EMAIL = '$a'";

    $res = mysqli_query($conn, $cid);

    if ($res) {
        while ($row = mysqli_fetch_array($res)) {
            
       $i = $row['CUSTOMER_ID'];



  //update name

  if (isset($_POST['cnsub'])) {
   
      $name = $_POST['name'];

      $q = "UPDATE customer SET CUSTOMER_NAME = '$name' WHERE CUSTOMER_ID = '$i'";

      $res = mysqli_query($conn, $q);

      if ($res) {
           
            header("Location: ../customer/settings.php");
      }
     header("Location: ../customer/settings.php");
  }

  //update email

  if (isset($_POST['cesub'])) {
      $email = $_POST['email'];

      $q = "UPDATE customer SET EMAIL = '$email' WHERE CUSTOMER_ID = '$i'";

      $res = mysqli_query($conn, $q);

      if ($res) {
           
           header("Location: ../customer/settings.php");
      }
      header("Location: ../customer/settings.php");
  }


//update gender

  if (isset($_POST['cgsub'])) {
 
      $gender = $_POST['gender'];

      $q = "UPDATE customer SET GENDER = '$gender' WHERE CUSTOMER_ID = '$i'";

      $res = mysqli_query($conn, $q);

      if ($res) {
           
           header("Location: ../customer/settings.php");
      }
      header("Location: ../customer/settings.php");
  }



//update nic

  if (isset($_POST['cnicsub'])) {
  
      $nic = $_POST['nic'];

      $q = "UPDATE customer SET CNIC_NUMBER = '$nic' WHERE CUSTOMER_ID = '$i'";

      $res = mysqli_query($conn, $q);

      if ($res) {
           
           header("Location: ../customer/settings.php");
      }
      header("Location: ../customer/settings.php");
  }


//update dob

  if (isset($_POST['cdobsub'])) {
  
      $dob = $_POST['dob'];

      $q = "UPDATE customer SET DATE_OF_BIRTH = '$dob' WHERE CUSTOMER_ID = '$i'";

      $res = mysqli_query($conn, $q);

      if ($res) {
           
          header("Location: ../customer/settings.php");
      }
      header("Location: ../customer/settings.php");
  }


  //update city

  if (isset($_POST['ccitysub'])) {
  
      $city = $_POST['city'];

      $q = "UPDATE customer SET CITY = '$city' WHERE CUSTOMER_ID = '$i'";

      $res = mysqli_query($conn, $q);

      if ($res) {
           
          header("Location: ../customer/settings.php");
      }
      header("Location: ../customer/settings.php");
  }


    //update country

  if (isset($_POST['cconsub'])) {
  
      $country = $_POST['country'];

      $q = "UPDATE customer SET COUNTRY = '$country' WHERE CUSTOMER_ID = '$i'";

      $res = mysqli_query($conn, $q);

      if ($res) {
           
           header("Location: ../customer/settings.php");
      }
      header("Location: ../customer/settings.php");
  }


    //update password

  if (isset($_POST['cpasssub'])) {
  
      $password = base64_encode($_POST['password']);

      $q = "UPDATE customer SET PASSWORD = '$password' WHERE CUSTOMER_ID = '$i'";

      $res = mysqli_query($conn, $q);

      if ($res) {
           
           header("Location: ../customer/settings.php");
      }
      header("Location: ../customer/settings.php");
  }





    //delete user account

 if (isset($_POST['cdeldub'])) {
       

       $q = "DELETE FROM customer WHERE CUSTOMER_ID = '$i'";

       $res = mysqli_query($conn, $q);

        if ($res) {
          
          header("Location: ../login.html");
          
        }else{
          header("Location: ../customer/settings.php");
        }
        
   }


   }
    }

  

     

    //insert customer search


  if (isset($_POST['sebtn'])) {

     $name = $_POST['name'];
      $cid = $_POST['cid'];
      $date = $_POST['date'];
      $time = $_POST['time'];
    
    


     $query = "INSERT INTO search (NAME, `DATE`, `TIME`, CUSTOMER_ID ) VALUES ('$name', '$date', '$time', '$cid')";
                    
                  $res = mysqli_query($conn, $query);
                  
    

       if ($res) {
                
               
        header("Location: ../customer/searches.php");  
  
       }


      else {
             header("Location: ../customer/searches.php");  
                 
       } 
  }




    //insert notification


    if (isset($_POST['nsub'])) {
        $ncid = $_POST['ncid'];
        $ntocid = $_POST['ntocid'];
        $ntxt = $_POST['ntxt'];


        $query = "INSERT INTO notification (to_CUSTOMER_ID, `TEXT`, CUSTOMER_ID) VALUES ('ntocid', 'ntxt', 'ncid')";

        $res = mysqli_query($conn, $query);

        
       if ($res) {
                
               
        header("Location: ../customer/chat.php");  
  
       }


      else {
             header("Location: ../customer/searchresult.php");  
                 
       } 
    }
   




    //insert notification for done chat between user and professional


    if (isset($_POST['no_sub'])) {
        $cid = $_POST['cid'];
        $tocid = $_POST['tocid'];
        $txt = $_POST['text'];
         $fees = $_POST['fees'];


        $query = "INSERT INTO notification (PAYMENT, to_CUSTOMER_ID, `TEXT`, CUSTOMER_ID) VALUES ('$fees',   '$tocid', '$txt', '$cid')";

        $res = mysqli_query($conn, $query);

        
      
    }




    //insert review


    if (isset($_POST['rewsub'])) {
        $cid = $_POST['cid'];
        $tocid = $_POST['tocid'];
        $review = $_POST['review'];
         ;


        $query = "INSERT INTO rate (REVIEW, CUSTOMER_ID,  to_CUSTOMER_ID) VALUES ('$review',   '$cid', '$tocid')";

        $res = mysqli_query($conn, $query);

        
       if ($res) {
                
               
        header("Location: ../customer/customerpanel.php");  
  
       }


      else {
             header("Location: ../customer/chat.php");  
                 
       } 
    }
   

    




?>