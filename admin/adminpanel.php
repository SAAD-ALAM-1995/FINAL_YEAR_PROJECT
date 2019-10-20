<!DOCTYPE html>


   <?php


    session_start();


     if ($_SESSION['email'] == true) {
       # code...
     }
     else{
       header("Location: index.html");
     }





   ?>



<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <?php

         require '../connection/conn.php';

          $i = $_SESSION['email'];

         $q = "SELECT AD_NAME FROM admin WHERE EMAIL = '$i'";

         $res = mysqli_query($conn, $q);

         if ($res) {
             while ($row = mysqli_fetch_array($res)) {
                 ?>

                 <title> <?php echo $row['AD_NAME'];?> </title>
             
             <?php }} ?>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


         <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
        


        <script src="https://kit.fontawesome.com/0596f7a650.js"></script>

     <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all">

     <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-font-face.min.css" media="all">

     <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-shims.min.css" media="all">


        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="../css/sidenavbar.css">

        <link rel="stylesheet" href="../css/login.css">

    </head>


   <style type="text/css">
     

   #img{
    width: 65px;
   }



   </style>




    <body>



        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Professional Connect</h3>
                    <strong> PC </strong>
                </div>

                <ul class="list-unstyled components">
                    <li class="active">
                        <a href="#homeSubmenu">
                            <i class="fas fa-tachometer-alt fa-2x"></i>
                            Dashboard
                        </a>
                        
                    </li>
                    <hr class="text-dark">
                    <li>
                        <a href="#">
                           <i class="fas fa-users fa-2x"></i>
                           Customers
                        </a>
                    </li>
                  
                    <li>
                        <a href="#">
                            <i class="fas fa-search fa-2x"></i>
                            Review Profile
                        </a>
                    </li>
                    <li>
                        <a href="#">
                          <i class="fas fa-bell fa-2x"></i>
                            Notifications
                        </a>
                    </li>
                   
                     <li>
                        <a href="#">
                           <i class="fas fa-sign-out-alt fa-2x"></i>
                            Logout
                        </a>
                    </li>
                </ul>

               
            </nav>

           
            <div id="content">


<nav class="navbar navbar-expand-lg navbar-light bg-light">
        
      </button>
       <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="fas fa-align-justify"></i>
                               
                            </button>
                        
    </div>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="nav ml-auto">
    
  <li class="nav-item">
    <a class="nav-link text-dark" href="notification.php">Notification</a>
  </li>
  <li class="nav-item dropdown">
       
       
         
              <?php 

             require '../connection/conn.php';

             $i = $_SESSION['email'];

             $q = "SELECT * FROM admin WHERE EMAIL = '$i'";

             $res = mysqli_query($conn, $q);

             if ($res) {
                 while ($row = mysqli_fetch_array($res)) {
                      
                      ?>

                       <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo $row['AD_NAME'];?>  </a>

                  <?php }}?> 
         
        
        
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="profile.php">My profile</a>
          <a class="dropdown-item" href="addnewadmin.php">Add new admin</a>
           <a class="dropdown-item" href="settings.php">Settings</a>
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


                <h2>Dashboard</h2>
                  
                <br>

           

             <div class="row">
             
             <div class="col-md-3 dash"> 

               <h2 class="text-white"> User </h2>  <br>

                <?php

         require '../connection/conn.php';


         $q = "SELECT COUNT(CUSTOMER_ID) FROM customer";

         $res = mysqli_query($conn, $q);

         if ($res) {
             while ($row = mysqli_fetch_array($res)) {
                 ?>

              <p class="text-white"> <?php echo $row[0];?> </p>

             
             <?php }} ?>

              </div>  

             <div class="col-md-1"></div>    <br>

           <div class="col-md-3 dash"> 

           <h2 class="text-white"> Payment </h2>  <br>

              <p class="text-white"> - </p>

           
               </div>   

             <div class="col-md-1"></div>   

           <br>

         
             
             <div class="col-md-3 dash">
 
                <h2 class="text-white"> Admin Payment </h2>  <br>

              <p class="text-white"> - </p>

             </div>

             <div class="col-md-1"> </div>

               </div>



                <div class="line"></div>

                <h2> Customers </h2>

        
              <div class="table-responsive">
  <table class="table">
    
        <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">PICTURE</th>
      <th scope="col">EMAIL</th>
      <th scope="col">GENDER</th>
      <th scope="col">CNIC NUMBER</th>
      <th scope="col">PASSWORD</th>
      <th scope="col">DATE OF BIRTH</th>
      <th scope="col">CITY</th>
      <th scope="col">COUNTRY</th>
      <th scope="col">UPDATE</th>
      <th scope="col">DELETE</th>
    </tr>
  </thead>

       <?php

         require '../connection/conn.php';

         $q = "SELECT * FROM customer";

         $res = mysqli_query($conn, $q);

         if ($res) {
             while ($row = mysqli_fetch_array($res)) {
                 ?>


  <tbody>
    <tr>
      <td scope="row"> <?php echo $row['CUSTOMER_ID'];?> </td>
      <td scope="row"> <?php echo $row['CUSTOMER_NAME'];?> </td>
      <td scope="row"> <?php echo  '<img src="../images/'.$row['PICTURE'].'" id="img" class="img-fluid">'; ?> </td>
      <td scope="row"> <?php echo $row['EMAIL']?> </td>
      <td scope="row"> <?php echo $row['GENDER']?> </td>
      <td scope="row"> <?php echo $row['CNIC_NUMBER']?> </td>
      <td scope="row"> <?php echo $row['PASSWORD']?> </td>
      <td scope="row"> <?php echo $row['DATE_OF_BIRTH']?> </td>
      <td scope="row"> <?php echo $row['CITY']?> </td>
      <td scope="row"> <?php echo $row['COUNTRY']?> </td>
      <td scope="row"> <a href="editprofile.php?uid= <?php echo $row['CUSTOMER_ID']; ?>"> <button type="submit" class="btn"> Update </button> </a> </td>
      <td scope="row"> <input type="submit" name="delbtn" class="btn" value="Delete"> </td>
    </tr>

  </tbody>

        
 <?php }} ?>


  </table>
</div>

                <div class="line"></div>

                <h3>Review Profile</h3>
               <div class="table-responsive">
  <table class="table">
    
        <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">PICTURE</th>
      <th scope="col">EMAIL</th>
      <th scope="col">GENDER</th>
      <th scope="col">CNIC NUMBER</th>
      <th scope="col">PASSWORD</th>
      <th scope="col">DATE OF BIRTH</th>
      <th scope="col">CITY</th>
      <th scope="col">COUNTRY</th>
      <th scope="col">UPDATE</th>
      <th scope="col">DELETE</th>
    </tr>
  </thead>

       <?php

         require '../connection/conn.php';

         $q = "SELECT * FROM customer WHERE REVIEW = 'Review'";

         $res = mysqli_query($conn, $q);

         if ($res) {
             while ($row = mysqli_fetch_array($res)) {
                 ?>


  <tbody>
    <tr>
      <td scope="row"> <?php echo $row['CUSTOMER_ID'];?> </td>
      <td scope="row"> <?php echo $row['CUSTOMER_NAME'];?> </td>
      <td scope="row"> <?php echo  '<img src="../images/'.$row['PICTURE'].'" id="img" class="img-fluid">'; ?> </td>
      <td scope="row"> <?php echo $row['EMAIL']?> </td>
      <td scope="row"> <?php echo $row['GENDER']?> </td>
      <td scope="row"> <?php echo $row['CNIC_NUMBER']?> </td>
      <td scope="row"> <?php echo $row['PASSWORD']?> </td>
      <td scope="row"> <?php echo $row['DATE_OF_BIRTH']?> </td>
      <td scope="row"> <?php echo $row['CITY']?> </td>
      <td scope="row"> <?php echo $row['COUNTRY']?> </td>
       <td scope="row"> <?php echo $row['REVIEW']?> </td>
      <td scope="row"> <a href="editreview.php?uid= <?php echo $row['CUSTOMER_ID']; ?>"> <button type="submit" class="btn"> Update </button> </a> </td>
      <td scope="row"> <input type="submit" name="delbtn" class="btn" value="Delete"> </td>
    </tr>

  </tbody>

        
 <?php }} ?>
</table>
</div>
            <div class="line"></div>

                <h3>Notifications</h3>
              
            </div>
        </div>




         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
    </body>
</html>
