   <?php

         require '../connection/conn.php';

         $q = "SELECT * FROM notification'";

         $res = mysqli_query($conn, $q);

         if ($res) {
             while ($row = mysqli_fetch_array($res)) {
                 ?>



              <p class="lead">  <?php echo $row['CUSTOMER_ID']?> <?php echo $row['TEXT']?> <?php echo $row['to_CUSTOMER_ID']?>   </p>
        
           

          <?php }} ?>














