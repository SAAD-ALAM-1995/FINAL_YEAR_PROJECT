<?php

   require 'conn.php';

    //insert chat message

      if (isset($_POST['messsub'])) {
           $text = base64_encode($_POST['text']);
      	  $cid = $_POST['cid'];
      	  $tocid = $_POST['tocid'];
      	  $date = $_POST['date'];
           $time = $_POST['time'];
           $type = $_POST['type'];
      	  

      	  $q  = "INSERT INTO connection (`TEXT`, to_CUSTOMER_ID, `DATE`, `TIME`, CUSTOMER_ID, TYPE) VALUES ('$text', '$tocid', '$date', '$time', '$cid', '$type')";

      	  $res = mysqli_query($conn, $q);

      	  if ($res) {
      	  	header("Location: ../customer/chat.php");
      	  }
      	  else{
      	  	  header("Location: ../customer/chat.php");
      	  }
      }







?>