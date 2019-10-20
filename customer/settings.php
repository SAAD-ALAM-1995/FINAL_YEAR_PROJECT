<!DOCTYPE html>

  <?php


  session_start();


  if ($_SESSION['email'] == true ) {
    # code...
  }
  else{
    header("Location: login.html");
  }






  ?>


<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Settings</title>

         
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/0596f7a650.js"></script>

     <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all">

     <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-font-face.min.css" media="all">

     <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-shims.min.css" media="all">
  

      <link rel="stylesheet" href="../css/footer.css">

       <link rel="stylesheet" href="../css/login.css">

        <link rel="stylesheet" href="../css/professionalpanel.css">

    </head>

   



    <body>



      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand text-primary" href="#">Professional Connect</a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="nav ml-auto">
       <li class="nav-item">
      <a class="nav-link text-dark" href="customerpanel.php">Home</a>
      </li>
   <li class="nav-item">
        <a class="nav-link text-dark" href="review.php">Reviews and Ratings</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link text-dark" href="messages.php">Messages</a>
      </li>
  <li class="nav-item">
    <a class="nav-link text-dark" href="notification.php">Notification</a>
  </li>
 <li class="nav-item dropdown">
        

             <?php

         $i = $_SESSION['email'];

        require '../connection/conn.php';

            $q = "SELECT CUSTOMER_NAME FROM customer WHERE EMAIL = '$i'";

              $res = mysqli_query($conn, $q);

            if ($res) {
              while ($row = mysqli_fetch_array($res)) {
                   ?>

                   <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo $row['CUSTOMER_NAME'];?> </a>
            <?php }}?>

        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="myprofile.php">My profile</a>
             <a class="dropdown-item" href="addqualification.php">Add Qualification</a>
          <a class="dropdown-item" href="#">Payment transactions</a>
           <a class="dropdown-item" href="settngs.php">Settings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
  <li class="nav-item">
    <a class="nav-link text-dark" href="logout.php">Logout</a>
  </li>
</ul>
   
    
  </div>
</nav>

    <hr>

        <br>

    <div class="container">

      
   <div class="row">

        <div class="col-md-4"> 

          <h3> Profile Details </h3>

           </div>

        <div class="col-md-4"></div>


        <div class="col-md-4"></div>
    

   </div> <br>

   <div class="card">
  <div class="card-body">

     <div class="row">

        <div class="col-md-3"> 

          <h5> Name </h5>
          
            <?php

          $i = $_SESSION['email'];

          require '../connection/conn.php';

            $q = "SELECT * FROM customer WHERE EMAIL = '$i'";

            $res = mysqli_query($conn, $q);

            if ($res) {
              while ($row = mysqli_fetch_array($res)) {

                ?>

            <p class="lead"> <?php echo $row['CUSTOMER_NAME'];?> </p>
                    
             <?php }}?>
         


           </div>

            <div class="col-md-1">
              
                 <!-- Button trigger modal -->
<button type="button" class="btn text-white" data-toggle="modal" data-target="#updatename">
  Edit
</button> 

<!-- Modal -->
<div class="modal fade" id="updatename" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Update Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="../connection/customerconn.php" method="POST">
  <div class="form-group">
    <label>Enter Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter Name">
   
  </div>
  <button type="submit" name="cnsub" class="btn text-white">Update</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

            </div>

        <div class="col-md-2"></div>


        <div class="col-md-3">
          
          <h5> Email </h5>
         
           <?php

          $i = $_SESSION['email'];

          require '../connection/conn.php';

            $q = "SELECT * FROM customer WHERE EMAIL = '$i'";

            $res = mysqli_query($conn, $q);

            if ($res) {
              while ($row = mysqli_fetch_array($res)) {

                ?>

            <p class="lead"> <?php echo $row['EMAIL'];?> </p>
                    
             <?php }}?>
         


        </div>

         <div class="col-md-1">
           
               <!-- Button trigger modal -->
<button type="button" class="btn text-white" data-toggle="modal" data-target="#updateemail">
  Edit
</button>

<!-- Modal -->
<div class="modal fade" id="updateemail" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Update Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="../connection/customerconn.php" method="POST">
  <div class="form-group">
    <div class="form-group">
    <label>Enter Email</label>
    <input type="email" class="form-control" name="email" placeholder="Enter email">
    
  </div>
   
  </div>
  <button type="submit" name="cesub" class="btn text-white">Update</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

         </div>

        <div class="col-md-2"></div>
    

   </div>

    <div class="row">

        <div class="col-md-3"> 

          <h5> Gender </h5>
          
            <?php

          $i = $_SESSION['email'];

          require '../connection/conn.php';

            $q = "SELECT * FROM customer WHERE EMAIL = '$i'";

            $res = mysqli_query($conn, $q);

            if ($res) {
              while ($row = mysqli_fetch_array($res)) {

                ?>

            <p class="lead"> <?php echo $row['GENDER'];?> </p>
                    
             <?php }}?>
         


           </div>

        <div class="col-md-1">
              
              <!-- Button trigger modal -->
<button type="button" class="btn text-white" data-toggle="modal" data-target="#updategender">
  Edit
</button>

<!-- Modal -->
<div class="modal fade" id="updategender" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Update Gender</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="../connection/customerconn.php" method="POST">
  
    <div class="form-group">
    <label>Gender</label>
   <div class="form-check" >
  <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Male">
  <label class="form-check-label" for="exampleRadios1" >
   Male
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="Female">
  <label class="form-check-label" for="exampleRadios2">
    Female
  </label>
</div>

    
  </div>
   
  
  <button type="submit" name="cgsub" class="btn text-white">Update</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

            </div>

        <div class="col-md-2"></div>


        <div class="col-md-3">
          
          <h5> NIC.NO </h5>
          

            <?php

          $i = $_SESSION['email'];

          require '../connection/conn.php';

            $q = "SELECT * FROM customer WHERE EMAIL = '$i'";

            $res = mysqli_query($conn, $q);

            if ($res) {
              while ($row = mysqli_fetch_array($res)) {

                ?>

            <p class="lead"> <?php echo $row['CNIC_NUMBER'];?> </p>
                    
             <?php }}?>
         


        </div>

        <div class="col-md-1">
              
                          <!-- Button trigger modal -->
<button type="button" class="btn text-white" data-toggle="modal" data-target="#updatenic">
  Edit
</button>

<!-- Modal -->
<div class="modal fade" id="updatenic" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Update NIC.no</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="../connection/customerconn.php" method="POST">
  <div class="form-group">
    <div class="form-group">
    <label>NIC.no</label>
    <input type="text" class="form-control" name="nic" placeholder="Enter NIC.no">
    
  </div>

  </div>
  <button type="submit" name="cnicsub" class="btn text-white">Update</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

            </div>

        <div class="col-md-2"></div>
    

   </div>

    <div class="row">

        <div class="col-md-3"> 

          <h5> Date of Birth </h5>
        

          <?php

          $i = $_SESSION['email'];

          require '../connection/conn.php';

            $q = "SELECT * FROM customer WHERE EMAIL = '$i'";

            $res = mysqli_query($conn, $q);

            if ($res) {
              while ($row = mysqli_fetch_array($res)) {

                ?>

            <p class="lead"> <?php echo $row['DATE_OF_BIRTH'];?> </p>
                    
             <?php }}?>
         


           </div>

       <div class="col-md-1">
              
                      <!-- Button trigger modal -->
<button type="button" class="btn text-white" data-toggle="modal" data-target="#updatedob">
  Edit
</button>

<!-- Modal -->
<div class="modal fade" id="updatedob" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Update Date of Birth</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="../connection/customerconn.php" method="POST">
  <div class="form-group">
    <div class="form-group">
    <label>Date of Birth</label>
    <input type="date" class="form-control" name="dob">
    
  </div>

  </div>
  <button type="submit" name="cdobsub" class="btn text-white">Update</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


            </div>

        <div class="col-md-2"></div>


        <div class="col-md-3">
          
          <h5> City </h5>
          
                 <?php

          $i = $_SESSION['email'];

          require '../connection/conn.php';

            $q = "SELECT * FROM customer WHERE EMAIL = '$i'";

            $res = mysqli_query($conn, $q);

            if ($res) {
              while ($row = mysqli_fetch_array($res)) {

                ?>

            <p class="lead"> <?php echo $row['CITY'];?> </p>
                    
             <?php }}?>
         



        </div>
    
           <div class="col-md-1">
              
             
                             <!-- Button trigger modal -->
<button type="button" class="btn text-white" data-toggle="modal" data-target="#updatecity">
  Edit
</button>

<!-- Modal -->
<div class="modal fade" id="updatecity" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Update City</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="../connection/customerconn.php" method="POST">
  <div class="form-group">
    <div class="form-group">
    <label>City</label>
    <input type="text" class="form-control" name="city" placeholder="Enter City">
    
  </div>

  </div>
  <button type="submit" class="btn text-white" name="ccitysub">Update</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

            </div>

        <div class="col-md-2"></div>

   </div>

    <div class="row">

        <div class="col-md-3"> 

          <h5> Country </h5>
          

            <?php

          $i = $_SESSION['email'];

          require '../connection/conn.php';

            $q = "SELECT * FROM customer WHERE EMAIL = '$i'";

            $res = mysqli_query($conn, $q);

            if ($res) {
              while ($row = mysqli_fetch_array($res)) {

                ?>

            <p class="lead"> <?php echo $row['COUNTRY'];?> </p>
                    
             <?php }}?>
         


           </div>

        <div class="col-md-1">
              
                <!-- Button trigger modal -->
<button type="button" class="btn text-white" data-toggle="modal" data-target="#updatecountry">
  Edit
</button>

<!-- Modal -->
<div class="modal fade" id="updatecountry" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Update Country</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="../connection/customerconn.php" method="POST">
  <div class="form-group">
    <div class="form-group">
    <label>Country</label>
    <input type="text" class="form-control" name="country" placeholder="Enter Country">
    
  </div>

  </div>
  <button type="submit" name="cconsub" class="btn text-white">Update</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


            </div>

        <div class="col-md-2"></div>


        <div class="col-md-3"> 

          <h5> Password </h5>
        

          <?php

          $i = $_SESSION['email'];

          require '../connection/conn.php';

            $q = "SELECT * FROM customer WHERE EMAIL = '$i'";

            $res = mysqli_query($conn, $q);

            if ($res) {
              while ($row = mysqli_fetch_array($res)) {

                ?>

            <p class="lead"> <?php echo $row['PASSWORD'];?> </p>
                    
             <?php }}?>
         


           </div>

        <div class="col-md-1">
              
                  <!-- Button trigger modal -->
<button type="button" class="btn text-white" data-toggle="modal" data-target="#updatepassword">
  Edit
</button>

<!-- Modal -->
<div class="modal fade" id="updatepassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Update Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="../connection/customerconn.php" method="POST">
  <div class="form-group">
    <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" name="password" placeholder="Enter Password">
    
  </div>

  </div>
  <button type="submit" name="cpasssub" class="btn text-white">Update</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

            </div>

        <div class="col-md-2"></div>
    

   </div>
    
  </div>
</div> <br>

<br>

<div class="row">

        <div class="col-md-4"> 

          <h3> Qualifation and Work </h3>

           </div>

        <div class="col-md-4"></div>


        <div class="col-md-4"></div>
    

   </div> <br>

   <div class="card">
  <div class="card-body">

     <div class="row">

        <div class="col-md-3"> 

          <h5> Professional Type </h5>
          <p class="lead"> Doctor or Teacher </p>

           </div>

           <div class="col-md-1">
             
                  <!-- Button trigger modal -->
<button type="button" class="btn text-white" data-toggle="modal" data-target="#updateptype">
  Edit
</button>

<!-- Modal -->
<div class="modal fade" id="updateptype" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Update Professional Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form>
  <div class="form-group">
    <div class="form-group">
    <label>Professional type</label>
   <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>Doctor</option>
        <option>Teacher</option>
      </select>
    
  </div>

  </div>
  <button type="submit" class="btn text-white">Update</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

           </div>

        <div class="col-md-2"></div>


        <div class="col-md-3">
          
          <h5> Type </h5>
          <p class="lead"> Doctor (Theeth. Nose, heart, bones, etc) or Teacher (Math, physics, computer, etc.) </p>

        </div>

        <div class="col-md-1">
          
                <!-- Button trigger modal -->
<button type="button" class="btn text-white" data-toggle="modal" data-target="#updatetype">
  Edit
</button>

<!-- Modal -->
<div class="modal fade" id="updatetype" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Update Professional Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form>
  <div class="form-group">
    <div class="form-group">
    <label>Type</label>
  <input type="text" name="" class="form-control" placeholder="Enter Type">
    
  </div>

  </div>
  <button type="submit" class="btn text-white">Update</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

        </div>

        <div class="col-md-2"></div>
    

   </div>

    <div class="row">

        <div class="col-md-3"> 

          <h5> Designation </h5>
          <p class="lead"> Where are you work currently or recently </p>

           </div>

           <div class="col-md-1">
             
                   <!-- Button trigger modal -->
<button type="button" class="btn text-white" data-toggle="modal" data-target="#updatedesg">
  Edit
</button>

<!-- Modal -->
<div class="modal fade" id="updatedesg" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Update Designation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form>
  <div class="form-group">
    <div class="form-group">
    <label>Designation</label>
   <input type="text" name="" class="form-control" placeholder="Enter Designation">
    
  </div>

  </div>
  <button type="submit" class="btn text-white">Update</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

           </div>

        <div class="col-md-2"></div>


        <div class="col-md-3">
          
          <h5> Experience </h5>
          <p class="lead"> 7 years </p>

        </div>

        <div class="col-md-1">
          
           <!-- Button trigger modal -->
<button type="button" class="btn text-white" data-toggle="modal" data-target="#updateexp">
  Edit
</button>

<!-- Modal -->
<div class="modal fade" id="updateexp" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Update Experience</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form>
  <div class="form-group">
    <div class="form-group">
    <label>Experience</label>
  <input type="text" name="" class="form-control" placeholder="Enter Experience">
    
  </div>

  </div>
  <button type="submit" class="btn text-white">Update</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

        </div>
    
    <div class="col-md-2"></div>

   </div>

    <div class="row">

        <div class="col-md-3"> 

          <h5> University Name </h5>
          <p class="lead"> university name </p>

           </div>

           <div class="col-md-1">
             
               <!-- Button trigger modal -->
<button type="button" class="btn text-white" data-toggle="modal" data-target="#updateuni">
  Edit
</button>

<!-- Modal -->
<div class="modal fade" id="updateuni" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Update University Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form>
  <div class="form-group">
    <div class="form-group">
    <label>University</label>
  <input type="text" name="" class="form-control" placeholder="Enter University Name">
    
  </div>

  </div>
  <button type="submit" class="btn text-white">Update</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

           </div>

        <div class="col-md-2"></div>


      <div class="col-md-3"> 

          <h5> Degree </h5>
          <p class="lead"> degree  </p>

           </div>

           <div class="col-md-1">
             
                 <!-- Button trigger modal -->
<button type="button" class="btn text-white" data-toggle="modal" data-target="#updatedeg">
  Edit
</button>

<!-- Modal -->
<div class="modal fade" id="updatedeg" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Update Degree</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form>
  <div class="form-group">
    <div class="form-group">
    <label>Degree</label>
    <input type="text" name="" class="form-control" placeholder="Enter University">
  <input type="file" name="" class="form-control">

    
  </div>

  </div>
  <button type="submit" class="btn text-white">Update</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

           </div>

        <div class="col-md-2"></div>
    

   </div>

    <div class="row">

        <div class="col-md-3">
          
          <h5> Matric Certificate </h5>
          <p class="lead"> school name and picture </p>

        </div>

        <div class="col-md-1">
          
                  <!-- Button trigger modal -->
<button type="button" class="btn text-white" data-toggle="modal" data-target="#updatemcer">
  Edit
</button>

<!-- Modal -->
<div class="modal fade" id="updatemcer" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Update Matric Certificate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form>
  <div class="form-group">
    <div class="form-group">
    <label>Matric Certificate</label>
    <input type="text" name="" class="form-control" placeholder="Enter School name">
  <input type="file" name="" class="form-control">

    
  </div>

  </div>
  <button type="submit" class="btn text-white">Update</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


        </div>

        <div class="col-md-2"></div>


        <div class="col-md-3"> 

          <h5> Intermediate Certificate </h5>
          <p class="lead"> collage name and picture </p>

           </div>

           <div class="col-md-1">
             
                <!-- Button trigger modal -->
<button type="button" class="btn text-white" data-toggle="modal" data-target="#updateicer">
  Edit
</button>

<!-- Modal -->
<div class="modal fade" id="updateicer" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Update Intermediate Certificate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form>
  <div class="form-group">
    <div class="form-group">
    <label> Intermediate Certificate </label>
    <input type="text" name="" class="form-control" placeholder="Enter Collage name">
  <input type="file" name="" class="form-control">

    
  </div>

  </div>
  <button type="submit" class="btn text-white">Update</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



           </div>

        <div class="col-md-2"></div>

    

   </div>


  <div class="row">

        <div class="col-md-3">
          
          <h5> Fees </h5>
          <p class="lead"> 1000 Rs </p>

        </div>

        <div class="col-md-1">
          
               <!-- Button trigger modal -->
<button type="button" class="btn text-white" data-toggle="modal" data-target="#updatefee">
  Edit
</button>

<!-- Modal -->
<div class="modal fade" id="updatefee" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Update Fees</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form>
  <div class="form-group">
    <div class="form-group">
    <label>Fees</label>
  <input type="text" name="" class="form-control" placeholder="Enter Fees">

    
  </div>

  </div>
  <button type="submit" class="btn text-white">Update</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


        </div>

        <div class="col-md-2"></div>


        <div class="col-md-5"> 

          

           </div>

        <div class="col-md-2"></div>

    

   </div>

   
    
  </div>
</div> 

    <br>


   <div class="card">
  <div class="card-body">
    <h3 class="card-title">Delete an Account</h3>
    <br>

      <div class="row">

      <div class="col-md-4">
        
        <p class="lead"> Are you sure to delete this account </p>

      </div>

      <div class="col-md-1"> 

         <form action="../connection/customerconn.php" method="POST">

  <button type="submit" name="cdelsub" class="btn text-white">DELETE</button>
</form>
 
 
      </div>
   
        </div>
  </div>
</div>

<br><br>


</div>

  <footer class="page-footer font-small mdb-color pt-4">

 
  <div class="container text-center text-md-left">

   
    <div class="row text-center text-md-left mt-3 pb-3">

      <div class="col-md-4 mx-auto mt-3 text-center">
         <figure>
                <img src="../images/logo.png" alt="Image" class="img-fluid">
              </figure>
        <h2 class="text-white">Professional Connect</h2>
      </div>


      <hr class="w-100 clearfix d-md-none">

   
      <div class="col-md-4 mx-auto mt-3 text-center">
        <h6 class="text-uppercase mb-4 font-weight-bold text-white">Contact</h6>
        <p class="text-white">
          <i class="fas fa-home mr-3 text-white"></i> Gulshan e Iqbal, Karachi, Pakistan</p>
        <p class="text-white">
          <i class="fas fa-envelope mr-3 text-white"></i> professional_connect@gmail.com</p>
        <p class="text-white">
          <i class="fas fa-phone mr-3 text-white"></i> +92 2654465453</p>
        
      </div>
    

      <hr class="w-100 clearfix d-md-none">

     
      <div class="col-md-4 mx-auto mt-3 text-center">

         <h3 class="mb-4 text-white">Follow us</h3>

        <ul class="list-unstyled list-inline">
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1 text-white">
                <i class="fab fa-facebook-f fa-2x"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1 text-white">
                <i class="fab fa-twitter fa-2x"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1 text-white">
                <i class="fab fa-instagram fa-2x"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1 text-white">
                <i class="fab fa-linkedin-in fa-2x"></i>
              </a>
            </li>
          </ul>
      </div>
   

    </div>
  

    <hr>

   
    <div class="row d-flex align-items-center">

    
      <div class="col-md-4">

        
      </div>
      
      <div class="col-md-5">
 
               <p class="text-center text-md-left text-white"> Copyright © 2019:
          <a href="https://mdbootstrap.com/education/bootstrap/">
            <strong class="text-white"> www.professionalpeople.com</strong>
          </a>
        </p>
      
        

      </div>

       <div class="col-md-3">

      

      </div>
      

    </div>
 

  </div>
 

</footer>

              
    </body>
</html>
