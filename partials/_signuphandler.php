<?php 

    $exist=false;
    $alertsucc=false;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        include '_dbconnect.php';

        $user_email=$_POST['signupEmail'];
        $user_pass=$_POST['spassword'];
        $cpass=$_POST['cpassword'];

        $existsql="SELECT * FROM `users` where user_email='$user_email'";
        $result= mysqli_query($con,$existsql);
        $numExistRows=mysqli_num_rows($result);
        if($numExistRows>0){
            $exist=true;
        }
        else{
            if($user_pass==$cpass){
                $hash=password_hash($user_pass,PASSWORD_DEFAULT);
                $sql="INSERT INTO `users` (`user_email`, `user_pass`,`timestamp`) VALUES ('$user_email','$hash', current_timestamp())";
                $result=mysqli_query($con,$sql);
                if($result){
                    $alertsucc=true;
                }
            }
            else{
                $alertpass="email is already exist";
            }
        }
        
    }

?>