<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Welcome to iDiscuss - Coding Forums</title>
    <style>
    .container{
      min-height: 87vh;
    }
        #ques{
            min-height: 497px;
        }
    </style>
  </head>
  <body>
  <?php include '_dbconnect.php';?>
  <?php include '_header.php';?>
  <?php
   $showAlert = false;
   $method = $_SERVER['REQUEST_METHOD'];
   if($method=='POST'){
       $cm_name = $_POST['name'];
       $cm_email = $_SESSION['useremail'];
       $cm_phone = $_POST['phone'];
       $cm_user = $_SESSION['sno'];
       $cm_desc = $_POST['message'];

       $sql = "INSERT INTO `contact` ( `contact_name`, `contact_user`, `contact_email`, `contact_number`, `contact_des`) VALUES ('$cm_name', '$cm_user', '$cm_email', '$cm_phone', '$cm_desc')";
       $result = mysqli_query($conn, $sql);
       $showAlert = true;
       if($showAlert){
           echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                       <strong>Success!</strong> Your contact has been added! Please wait for community to respond
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                 </div>';
       } 
   }
  ?>
  <div class="container my-4" id="ques">
  <?php
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
        echo '<form class="ng-pristine ng-invalid ng-touched"action= "'. $_SERVER['REQUEST_URI'] . '" method="post">
        <div class="form-group">
        <label for="name">Your Name</label>
        <input type="name" id="name" placeholder="Enter your Name" required="" name="name" class="form-control ng-pristine ng-invalid ng-touched">
        </div>
        <div class="form-group">
        <label for="email">Your Email</label>
        <input type="email" id="email" placeholder="'. $_SESSION['useremail']. '" name="email"  class="form-control ng-pristine ng-invalid ng-touched"readonly>
        </div><div   class="form-group">
        <label for="phone">Your Phone Number</label><input   type="number" id="phone" placeholder="Enter your Phone Number" minlength="10" maxlength="10" required="" name="phone" class="form-control ng-pristine ng-invalid ng-touched">
        </div>
        <div   class="form-group">
        <label   for="description">Describe what you want to contact me for here</label>
        <textarea   type="text" id="message" placeholder="Your message" required="" name="message" class="form-control ng-pristine ng-invalid ng-touched"></textarea>
        </div><button type="submit" class="btn btn-danger mt-2"><!----> Submit</button></form>';
        }
        else{
            echo '
            <h1 class="text-center">Contact Us</h1>
            <div class="container">
            <h1 class="py-2">Contact Us</h1> 
               <p class="lead">You are not logged in. Please login to be able to Contact Us</p>
            </div>
            ';
        }
  ?>
</div>
  <?php include '_footer.php';?> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>