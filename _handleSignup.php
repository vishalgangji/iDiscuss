<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $user_email = $_POST['signupEmail'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];
    $existSql = "select * from `users` where user_email = '$user_email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    echo $user_email;
    if($numRows>0){
        $showError = "Email already in use";
        header("Location: index.php?signupsuccess=false&error=$showError");
    exit();
    }
    
        echo"hi";
        if ($user_email==' ') {
            $showError = "Error";
            echo"rr"; 
            header("Location: index.php?signupsuccess=false&error=$showError");
        }
        if($pass == $cpass){
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_email`, `user_pass`, `timestamp`) VALUES ( '$user_email', '$hash', current_timestamp())";
            echo $sql;
            $result = mysqli_query($conn, $sql);
            
            if($result){
                $showAlert = true;
                header("Location: index.php?signupsuccess=true");
                exit();
            }

        }
        else{
            $showError = "Passwords do not match"; 
            
        }
    
    header("Location: index.php?signupsuccess=false&error=$showError");

}
?>