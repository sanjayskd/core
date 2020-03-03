
<?php
session_start();
session_destroy();
 setcookie("username","$username",time()-60*60,"/");
header("location:index.php");
?>
