<?php
include('connection.php');
if(isset($_GET['status']))
{
$status1=$_GET['status'];
$select=mysqli_query($con,"select * from data where id='$status1'");
while($row=mysqli_fetch_object($select))
{
$status_var=$row->status;
if($status_var=='0')
{
$status_state=1;
}
else
{
$status_state=0;
}
$update=mysqli_query($con,"update data set status='$status_state' where id='$status1' ");
if($update)
{
header("Location:dashboard.php");
}
else
{
echo mysqli_error();
}
}
?>
<?php
}
?>