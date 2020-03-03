<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font/css/font-awesome.min.css">
</head>
<body>
     
    <div class="conatiner">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1 class="align-center text-Dark"><u>Registration Form</u></h1>
                <form action="" method="post">
                    <label for="">username</label>
                    <input type="text" name="username"  required><br>
                    <label for="">password</label>
                    <input type="password" name="pass"  required>
                    <button type="submit" name="sub" class="btn btn-primary">submit</button>
                </form>
            </div>
            
            <?php
            
            if(isset($_POST['sub']))
               {
                extract($_POST);   
               $pass=md5($pass);
                
                $query=mysqli_query($con,"select*from student where username='$username'");
                if(mysqli_num_rows($query)>0)
                {
                    echo "Username already exit please try another..";
                    
                    
                    exit();
                }else{
               if(mysqli_query($con,"insert into student(username,password)values('$username','$pass')"))
             {
                    echo "<h4>successfully insert</h4>";
                }else{
                   echo "data not insert,please try again";
               }}}
            ?>
            </div></div>            
    <div class="col-md-2"></div> 
</body>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script>
</html>