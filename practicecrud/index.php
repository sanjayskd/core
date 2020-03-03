<?php
session_start();
include("top.php");
include("connection.php");
if(isset($_COOKIE['username']))
    header("location:dashboard.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1 class="align-center text-light">login form</h1>
    <form action="" method="post">
      <label for="">username</label>
                    <input type="text" name="username" class="form-control" required>
                    <label for="">password</label>
      <input type="password" name="pass" class="form-control" required><br>
 <button type="submit" name="sub" class="btn btn-primary">submit</button>
                   </form><br>
                 <a href="ragistration.php" class="text-light">Not singin</a><br>
                 <a href="registration1.php" class="text-light">Not singin</a>
                <?php
                 if(isset($_POST['sub']))
                 {
                     extract($_POST);
                     $pass=md5($pass);
                     
                    $query=mysqli_query($con,"select * from student where username='$username' and password='$pass' ");
                     
                     $total=mysqli_num_rows($query);
                     if($total==1)
                     {
                         $_SESSION['username']=$username;
                         setcookie('username','$username',time()+60*60*24,'/');
                          header("location:dashboard.php");
                     }else{
                         $_SESSION['error']="wrong id and pass please sign in";
                         echo $_SESSION['error'];
                     }
                 }
                
                ?>
            </div>
        </div>
    </div>
</body>
</html>