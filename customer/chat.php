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

        <title> Messages </title>

         
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

   



    <body>



      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand text-primary" href="index.html">Professional Connect</a>

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

        <br><br>

    <div class="container">

    

   <div class="row">
        
          <div class="col-md-4">
        
          
            <h3>Messages</h3>

             </div>

              </div> <br>


              <div class="row">

                <div class="col-md-2"></div>


                <div class="col-md-8">


               <div class="card" id="message" style="width: 100%;">    
                  
                  
 



          <?php       


                      require '../connection/conn.php';

                 
           $i = $_SESSION['email'];

           $q1 = "SELECT * FROM customer WHERE Email = '$i'";

           $res = mysqli_query($conn, $q1);

           if ($res) {
             while ($row1 = mysqli_fetch_array($res)) {
                         
                         $cid = $row1['CUSTOMER_ID'];
                             
                             ?>
                             
              <?php

               if (isset($_GET['cid'])) {
               $tcid = $_GET['cid'];

               $q2 = "SELECT * FROM customer WHERE CUSTOMER_ID = '$tcid'  ";

              $res = mysqli_query($conn, $q2);

              if ($res) {
                 while ($row2 = mysqli_fetch_array($res)) {
                 
                     $tocid = $row2['CUSTOMER_ID'];            
                              
                              ?>

                <?php              

                   $q  = "SELECT * from connection where to_CUSTOMER_ID = '$tocid' and CUSTOMER_ID = '$cid'
UNION
SELECT * from connection where to_CUSTOMER_ID = '$cid' and CUSTOMER_ID = '$tocid'
order by TIME ASC "  ;

                  
                      $r = mysqli_query($conn, $q);

                      if ($r) {
                          
                          while ($row = mysqli_fetch_array($r)) {
                               
                                $cidm = $row['CUSTOMER_ID'];
                                $tocidm = $row['to_CUSTOMER_ID'];
                                $message = base64_decode($row['TEXT']);

                                        
                                if ($tocidm = $cid) {
                                      
                                   ?>
<?php 
                                     $q6  = "SELECT CUSTOMER_NAME from customer where CUSTOMER_ID = '$cidm' "  ;

                  
                      $senderName = mysqli_query($conn, $q6);

                       if($senderName){
                      while( $row6 = mysqli_fetch_array($senderName)) {

 ?>
                         <div class="card-body">
                           <h5 class="card-title"> <?php echo $row6['CUSTOMER_NAME']; ?> </h5>

                             <?php }} ?>
                    

                          <p class="card-text"> <?php echo $message; ?>  </p>
                        </div>
                               
                   


                      
                 
                            

                   

                   <?php }}}}} ?>


                     <?php }}} ?>





                 
               




   


              
</div>  



 <br>

      <form action="../connection/chatconn.php" method="POST">
  <div class="form-group">
  
    <input type="text" class="form-control" name="text" id="exampleInputPassword1" placeholder="Enter Message">
  </div>

   <?php

        require '../connection/conn.php';

        if (isset($_GET['cid'])) {
               $cid = $_GET['cid'];

               $q = "SELECT * FROM customer WHERE CUSTOMER_ID = '$cid' ";

              $res = mysqli_query($conn, $q);

              if ($res) {
                 while ($row = mysqli_fetch_array($res)) {
                  ?>


  <div class="form-group">

    <input type="hidden" class="form-control" name="tocid" value="<?php echo $row['CUSTOMER_ID'];?>">
  </div>

            <?php }}} ?>


            <?php

             require '../connection/conn.php';

           $i = $_SESSION['email'];

           $q = "SELECT * FROM customer WHERE Email = '$i'";

           $res = mysqli_query($conn, $q);

           if ($res) {
             while ($row = mysqli_fetch_array($res)) {
                         ?>
             
          <div class="form-group">
    
    <input type="hidden" class="form-control" name="cid" value="<?php echo $row['CUSTOMER_ID'];?>">
  </div>

        <?php }} ?>



   <div class="form-group">
   
    <input type="hidden" class="form-control" name="date"

    value=" <?php  echo  date("Y/m/d");  ?>   ">

  </div>
   <div class="form-group">
   
    <input type="hidden" class="form-control" name="time"  value=" 


  <?php
date_default_timezone_set("Asia/Karachi");

echo date("h:i:sa");

?>

        ">
  </div>
   <div class="form-group">
   
    <input type="hidden" class="form-control" name="type" value="chat">
  </div>
 
  <button type="submit" name="messsub" class="btn text-white">Submit</button>
  
</form>

                </div>



                <div class="col-md-2">
                  

              <div class="card" style="width: 14rem;">
  <div class="card-body">
    <h5 class="card-title">If your chat will be done then click on chat done.</h5>


         <form action="../connection/customerconn.php" method="POST">


            <?php

        require '../connection/conn.php';

        if (isset($_GET['cid'])) {
               $cid = $_GET['cid'];

               $q = "SELECT * FROM customer WHERE CUSTOMER_ID = '$cid' ";

              $res = mysqli_query($conn, $q);

              if ($res) {
                 while ($row = mysqli_fetch_array($res)) {
                  ?>


  <div class="form-group">

    <input type="hidden" class="form-control" name="fees" value="<?php echo $row['FEES'];?>">
  </div>

            <?php }}} ?>



            <?php

        require '../connection/conn.php';

        if (isset($_GET['cid'])) {
               $cid = $_GET['cid'];

               $q = "SELECT * FROM customer WHERE CUSTOMER_ID = '$cid' ";

              $res = mysqli_query($conn, $q);

              if ($res) {
                 while ($row = mysqli_fetch_array($res)) {
                  ?>


  <div class="form-group">

    <input type="hidden" class="form-control" name="tocid" value="<?php echo $row['CUSTOMER_ID'];?>">
  </div>

            <?php }}} ?>


            <?php

             require '../connection/conn.php';

           $i = $_SESSION['email'];

           $q = "SELECT * FROM customer WHERE Email = '$i'";

           $res = mysqli_query($conn, $q);

           if ($res) {
             while ($row = mysqli_fetch_array($res)) {
                         ?>
             
          <div class="form-group">
    
    <input type="hidden" class="form-control" name="cid" value="<?php echo $row['CUSTOMER_ID'];?>">
  </div>

        <?php }} ?>



  
   <div class="form-group">
   
    <input type="hidden" class="form-control" name="text" value="chat done with">
  </div>






    <button type="submit" class="btn text-white" name="no_sub" data-toggle="modal" data-target="#exampleModalScrollable"> Chat done </button>



      </form>

  </div>
</div>

            
            <!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Reviews</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         
        </button>
      </div>
      <div class="modal-body">
         <form  action="../connection/customerconn.php" method="POST">


                <?php

        require '../connection/conn.php';

        if (isset($_GET['cid'])) {
               $cid = $_GET['cid'];

               $q = "SELECT * FROM customer WHERE CUSTOMER_ID = '$cid' ";

              $res = mysqli_query($conn, $q);

              if ($res) {
                 while ($row = mysqli_fetch_array($res)) {
                  ?>


  <div class="form-group">

    <input type="hidden" class="form-control" name="tocid" value="<?php echo $row['CUSTOMER_ID'];?>">
  </div>

            <?php }}} ?>


            <?php

             require '../connection/conn.php';

           $i = $_SESSION['email'];

           $q = "SELECT * FROM customer WHERE Email = '$i'";

           $res = mysqli_query($conn, $q);

           if ($res) {
             while ($row = mysqli_fetch_array($res)) {
                         ?>
             
          <div class="form-group">
    
    <input type="hidden" class="form-control" name="cid" value="<?php echo $row['CUSTOMER_ID'];?>">
  </div>

        <?php }} ?>




                <div class="form-group">
                  <label>Review</label>
                  <textarea type="text" class="form-control" name="review"> Enter Review </textarea>

                </div>

         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" data-dismiss="modal">Close</button>
        <button type="button" class="btn text-white" name="resub">Submit</button>
         </form>
      </div>
    </div>
  </div>
</div>


                </div>

          </div>



       <br><br>   <br><br>  <br><br> 




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


<script language="javascript">
setTimeout(function(){
   window.location.reload(1);
}, 10000);
</script>