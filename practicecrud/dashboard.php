<?php
session_start();
include("connection.php");
if(isset($_SESSION['username']) or isset($_COOKIE['username']))
{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ADMIN|Welcome|<?php echo $_SESSION['username']; ?></title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font/css/font-awesome.min.css">
    </head>
    <body>
                  <div class="container-fluid">
           <div class="row">
               <div class="col-md-12">
                  <h1 class="text-dark ">dashboard</h1> <a href="logout.php" class="btn block btn btn-danger float-right">logout</a>
               </div>
           </div>
            
                <?php
}else{
    header("location:index.php");
    
} ?>
          <div class="row">
          <div class="col-md-3">
           <a href="?page=add" class="btn btn-primary btn block text-light">addition</a><br><br>
           <a href="?page=show" class="btn btn-primary btn block text-light">show</a>
              </div>
              
              <div class="col-md-9">
           <?php
                
                if(isset($_GET['page']))
                {
                    $page=$_GET['page'];
                    
                    if($page=="add")
                    {
                        include("add.php");
                    }if($page=="show")
                    {
                        include("show.php");
                    }else{
                        
                    }
                }
                ?>
                </div>
            </div>
        </div>
    </body>
    <script src="js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script>
    </html>