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
     $password = base64_encode($_POST['password']);
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
    //insert qualification
if (isset($_POST['qasub'])) {
    
     $customerid = $_POST['cid'];
     $professionaltype = $_POST['ptype'];
     $degree = $_FILES['degree']['name'];
     $tmp=$_FILES['degree']['tmp_name'];
     $type = $_POST['type'];
     $designation = $_POST['designation'];
     $experience = $_POST['experience'];
     $mcertificate = $_FILES['mcertificate']['name'];
     $tmp=$_FILES['mcertificate']['tmp_name'];
     $icertificate = $_FILES['icertificate']['name'];
     $tmp=$_FILES['icertificate']['tmp_name'];
     $universityname = $_POST['university'];
     $schoolname = $_POST['scname'];
     $collagename = $_POST['coname']; 
 $query = "INSERT INTO `qualification`( `CUSTOMER_ID`, `PROFESSIONAL_TYPE`, `DEGREE`, `TYPE`, `DESIGNATION`, `EXPERINCE`, `MATRIC_CERTIFICATE`, `INTERMEDIATE_CERTIFICATE`, `UNIVERSITY_NAME`, `SCHOOL_NAME`, `COLLAGE_NAME`) VALUES ('$customerid','$professionaltype','$degree','$type','$designation','$experience','$mcertificate','$icertificate','$universityname','$schoolname','$collagename')";
    $res = mysqli_query($conn, $query);
if ($res) {
                
                move_uploaded_file($tmp, "../images/$degree");
        move_uploaded_file($tmp, "../images/$mcertificate");
        move_uploaded_file($tmp, "../images/$icertificate");
        header("Location: ../customer/addqualification.php");  
  
       }
else{
  header("Location: ../customer/addqualification.php");
}
     }
//update qualification
//update  professional type
if (isset($_POST['uptype'])) {
   
      $ptype = $_POST['ptype'];
      $q = "UPDATE qualification SET PROFESSIONAL_TYPE = '$ptype' WHERE CUSTOMER_ID = '$i'";
      $res = mysqli_query($conn, $q);
      
      if ($res) {
           
            header("Location: ../customer/settings.php");
      }
     header("Location: ../customer/settings.php");
  } 
//update  type
if (isset($_POST['utype'])) {
   
      $type = $_POST['type'];
      $q = "UPDATE qualification SET TYPE= '$type' WHERE CUSTOMER_ID = '$i'";
      $res = mysqli_query($conn, $q);
      
      if ($res) {
           
            header("Location: ../customer/settings.php");
      }
     header("Location: ../customer/settings.php");
  } 
//update  designation
if (isset($_POST['udesignation'])) {
   
      $designation = $_POST['designation'];
      $q = "UPDATE qualification SET DESIGNATION = '$designation' WHERE CUSTOMER_ID = '$i'";
      $res = mysqli_query($conn, $q);
      
      if ($res) {
           
            header("Location: ../customer/settings.php");
      }
     header("Location: ../customer/settings.php");
  } 
//update  experience
if (isset($_POST['uexperience'])) {
   
      $experience = $_POST['experience'];
      $q = "UPDATE qualification SET EXPERIENCE = '$experience' WHERE CUSTOMER_ID = '$i'";
      $res = mysqli_query($conn, $q);
      
      if ($res) {
           
            header("Location: ../customer/settings.php");
      }
     header("Location: ../customer/settings.php");
  } 
//update  university name
if (isset($_POST['uuniversity'])) {
   
      $university = $_POST['university'];
      $q = "UPDATE qualification SET UNIVERSITY_NAME = '$university' WHERE CUSTOMER_ID = '$i'";
      $res = mysqli_query($conn, $q);
      
      if ($res) {
           
            header("Location: ../customer/settings.php");
      }
     header("Location: ../customer/settings.php");
  } 
//update  degree
if (isset($_POST['udegree'])) {
   
      $degree = $_POST['degree'];
      $q = "UPDATE qualification SET DEGREE = '$degree' WHERE CUSTOMER_ID = '$i'";
      $res = mysqli_query($conn, $q);
      
      if ($res) {
           
            header("Location: ../customer/settings.php");
      }
     header("Location: ../customer/settings.php");
  } 
//update  matric certificate
if (isset($_POST['umcertificate'])) {
   
      $mcertificate = $_POST['mcertificate'];
      $q = "UPDATE qualification SET MATRIC_CERTIFICATE = '$mcertificate' WHERE CUSTOMER_ID = '$i'";
      $res = mysqli_query($conn, $q);
      
      if ($res) {
           
            header("Location: ../customer/settings.php");
      }
     header("Location: ../customer/settings.php");
  } 
//update  intermediate certificate
if (isset($_POST['uicertificate'])) {
   
      $icertificate = $_POST['icertificate'];
      $q = "UPDATE qualification SET INTERMEDIATE_CERTIFICATE = '$icertificate' WHERE CUSTOMER_ID = '$i'";
      $res = mysqli_query($conn, $q);
      
      if ($res) {
           
            header("Location: ../customer/settings.php");
      }
     header("Location: ../customer/settings.php");
  } 
//update  school name
if (isset($_POST['uscname'])) {
   
      $scname = $_POST['scname'];
      $q = "UPDATE qualification SET SCHOOL_NAME = '$scname' WHERE CUSTOMER_ID = '$i'";
      $res = mysqli_query($conn, $q);
      
      if ($res) {
           
            header("Location: ../customer/settings.php");
      }
     header("Location: ../customer/settings.php");
  } 
    
    //update  COLLEGE NAME
    
    if (isset($_POST['uconame'])) {
   
      $coname = $_POST['coname'];
      $q = "UPDATE qualification SET COLLAGE_NAME = '$coname' WHERE CUSTOMER_ID = '$i'";
      $res = mysqli_query($conn, $q);
      
      if ($res) {
           
            header("Location: ../customer/settings.php");
      }else{
     header("Location: ../customer/settings.php");
  } 
   }
    
?>