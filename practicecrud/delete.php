<?php
include("connection.php");
if(isset($_GET['del']))
{
    echo $id=$_GET['del'];
    if(mysqli_query($con,"delete from data where id='$id'"))
    {
    header("location:http://localhost/class/practicecrud/dashboard.php?page=show");
}
}
?>