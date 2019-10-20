<!DOCTYPE html>

      <?php

      session_start();

      if ($_SESSION['email'] == true) {
        # code...
      }
      else{
      header("Location: ../login.html");
      }



  ?>




<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Searches</title>

         
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

       <link rel="stylesheet" href="../css/userpanel.css">

    </head>

   <style type="text/css">
   	
.mimg{
	width: 95px;

	
}

   </style>



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
        <a class="nav-link text-dark" href="searches.php">Searches</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="messages.php">Messages</a>
      </li>
  <li class="nav-item">
    <a class="nav-link text-dark" href="notification.php">Notification</a>
  </li>
 <li class="nav-item dropdown">
        
       
         
             <?php 

             require '../connection/conn.php';

             $i = $_SESSION['email'];

             $q = "SELECT * FROM customer WHERE EMAIL = '$i'";

             $res = mysqli_query($conn, $q);

             if ($res) {
                 while ($row = mysqli_fetch_array($res)) {
                      
                      ?>

                       <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo $row['CUSTOMER_NAME'];?>  </a>

                  <?php }}?>
         
            
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         <a class="dropdown-item" href="myprofile.php">My profile</a>
          <a class="dropdown-item" href="addqualification.php">Add Qualification</a>
          <a class="dropdown-item" href="#">Payment transactions</a>
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

    <hr>

        <br><br>

    <div class="container">

    	<div class="row">

    	

        <div class="col-md-2"></div>


       


         <section class="col-md-9">
         	 <form class="form-inline" action="searchresult.php" method="POST">

      <input class="form-control mr-sm-2" type="search" name="name" placeholder="Search Name"> <br>

   <br>
    <button class="btn text-white my-2 my-sm-0" name="sebtn" type="submit"><i class="fas fa-search"></i></button>
  </form>



         </section>



          <div class="col-md-1"></div>

      

  </div>  <br><br>



   <div class="row">
        

        <div class="col-md-4">
          
            <h3>Searches</h3>

        </div>


      </div> <br>






   <div class="row">
        

         <div class="col-md-8">
           
         <p class="lead"> Adnan Admed    Profession: Doctor    Type: Teeth    9/8/19 8:55  </p>

         </div>

         <div class="col-md-2">  9/11/2019 8:15 </div>


      </div> <hr> 

       <div class="row">
        

         <div class="col-md-8">
           
         <p class="lead"> Adnan Admed    Profession: Doctor    Type: Teeth    9/8/19 8:55  </p>

         </div>

         <div class="col-md-2">  9/11/2019 8:15 </div>


      </div> <hr> 

       <div class="row">
        

         <div class="col-md-8">
           
         <p class="lead"> Adnan Admed    Profession: Doctor    Type: Teeth    9/8/19 8:55  </p>

         </div>

         <div class="col-md-2">  9/11/2019 8:15 </div>


      </div> <hr> 

       <div class="row">
        

         <div class="col-md-8">
           
         <p class="lead"> Adnan Admed    Profession: Doctor    Type: Teeth    9/8/19 8:55  </p>

         </div>

         <div class="col-md-2">  9/11/2019 8:15 </div>


      </div> <hr> <br><br>




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
