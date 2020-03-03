
<style type="text/css">
* { margin:0px; padding:0px; font-family:Tahoma, Geneva, sans-serif; background-color:#999; color:#FFF;  }
a { text-decoration:none; }
.table table-hover { width:650px; min-height:450px; border:0px green dashed; margin:0 auto; padding:10px; }
</style>


<table class="table table-hover">
 <tr>
    <th>id</th>
     <th>name</th>
     <th>address</th>
     <th>category</th>
     <th>image</th>
     <th>delete</th>
      <th>edit</th>
      <th>Status</th>
 </tr>   
   <?php
    $query=mysqli_query($con,"select * from data");
    while($data=mysqli_fetch_array($query))
    {
        $status=$data['status'];
    ?>
    <tr>
        <td><?php echo $data['id']; ?></td>
        <td><?php echo $data['name']; ?></td>
        <td><?php echo $data['address']; ?></td>
        <td><?php echo $data['category']; ?></td>
        <td><img class="img-fluid"  src="image/<?php echo $data['newname']; ?>" alt="" height="10%" width="100px"></td>
        <td><a href="delete.php?del=<?php echo $data['id']; ?>" class="btn btn-danger">delete</a></td>
        <td><a href="edit.php?edit=<?php echo $data['id']; ?>" class="btn btn-danger">edit</a></td>
  
<td>
   <?php
if(($status)=='0')
{ 
?>
<a href="action.php?status=<?php echo $data['id']; ?>" class="btn btn-danger" onclick="return confirm('Activate <?php echo $data['name']; ?>');"> Deactivate </a>

<?php
 }
if(($status)=='1')
{
?>
<a href="action.php?status=<?php echo $data['id']; ?>" class="btn btn-success" onclick="return confirm('De-activate <?php echo $data['name']; ?>');"> Activate</a>
<?php
}
?>
        </td>
    </tr> 
    <?php
    }
    ?>
</table>
