<?php include('includes/header.php'); ?>


<?php

//Include functions files and also write a statement to redirect user when logged in 
include("admin/includes/functions.php");
 
 

?>

 
<?php

//require or include your database connection file
require("admin/includes/pdocon.php");
    
//instatiating our database objects
$db = new Pdocon();    

    //Collect and process Data on login submission
if(isset($_POST['submit_login'])) {
    $raw_username     = $_POST['username'];
    $password         = cleandata($_POST['password']);
    
    $valid_email      =  valemail($raw_username);
    $hashed_password  = hashpassword($password);
     
    //making the query using our functions     
   $db->query("SELECT * FROM admin WHERE email=:email AND password=:password ");        

  //To specify the WHERE statement, You need to call the bind method
  $db->bindValue(':email', $valid_email, PDO::PARAM_STR);
  $db->bindValue(':password', $hashed_password, PDO::PARAM_STR);    
   

    $match = $db->fetchSingle();

    //Fetching the resultset for a single result and keep in a row variable
     if($match) {
      //get image name from database and find it in the images folder
         $database_image   = $match['image'];
         $database_name    = $match['fullname']; 
      
         $session_image    = "<img src='uploaded_image/$database_image' class='profile_image'/>";

          //user_data is an associative array inside session
           $_SESSION['user_data'] = array(

                'fullname'    => $match['fullname'],
                'email'       => $match['email'],
                'sex'         => $match['sex'],                  
                'image'       => $match['image'],
              );

              $_SESSION['user_logged_in'] = true;
              
                keepmsg('<div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Succesful login!</strong> Welcome ' . $database_name . '
                </div>');

               redirect('admin/my_admin.php');

           

         }  else {

            echo '<div class="alert alert-danger text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Sorry!</strong> User does not exist. Register or Try Again.
                </div>';

         }

    //Collect the image, id, email, fullname and keep an session
   

            
            //create a session variable and set it to true 
         
            
            
            //Redirect a succuessfull login to customer.php
        
            
            //Use the set_message function to set a welcome msg in a closable div and echo a div danger when login fails in else statement  
}
?>
  
  <div class="row">
      <div class="col-md-4 col-md-offset-4">
          <p class=""><a class="pull-right" href="admin/register_admin.php"> Register</a></p><br>
      </div>
      <div class="col-md-4 col-md-offset-4">
        <form class="form-horizontal" role="form" method="post" action="">
          <div class="form-group">
            <label class="control-label col-sm-2" for="email"></label>
            <div class="col-sm-10">
              <input type="email" name="username" class="form-control" id="email" placeholder="Enter Email" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd"></label>
            <div class="col-sm-10"> 
              <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter Password" required>
            </div>
          </div>

          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10 text-center">
              <button type="submit" class="btn btn-primary text-center" name="submit_login">Login</button>
            </div>
          </div>
        </form>
          
  </div>
</div>
  
  
<?php include('includes/footer.php'); ?>