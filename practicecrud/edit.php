
<?php
session_start();
include('connection.php');
include('top.php');
if(isset($_SESSION['username']) or isset($_COOKIE['username']))
{
if(isset($_GET['edit']))
{
    $ID=$_GET['edit'];
    $query=mysqli_query($con,"select * from data where ID='$ID' ") or die(mysqli_error($con));
    $data= mysqli_fetch_assoc($query);
    
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                </div>
                
                <div class="col-md-8">
                    <h2>edit your data</h2>
                    <a href="dashboard.php" class="btn btn-info">GO BACK</a>
                    
                    <form action="" method="post" enctype="multipart/form-data">
                    
                <label for="">name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $data['name'];?>">
                        
                <label for="">address</label>
                <input type="text" name="address" class="form-control" value="<?php echo $data['address'];?>">
                        
                <label for="">Projectimage</label>
                <input type="file" name="projectimage" >
                              
                <label for="">Category</label>
                <select name="category" id="">
                        
                          <option value="Website"<?php  if($data['category']=="Web")
    {
        echo "checked";
    }
        
       ?> 
        
        >Web</option> 
                       <option value="IOS"<?php  if($data['category']=="IOS")
       {
           echo "checked";
       }
        ?>   
           >IOS</option>
                    <input type="submit" name="submit"  class="btn btn-success"></select>
                    </form>
               

<?php
    
    if (isset($_POST['submit']))
    {

        extract($_POST);
   echo $imgname= $_FILES["projectimage"]["name"];
   echo $imgtmp= $_FILES["projectimage"]["tmp_name"];
  
        $newname=uniqid().$imgname;  
        if($imgname==null or empty($imgname))
    
        {
        if( mysqli_query($con,"update data set name='$name',address='$address',category='$category' where ID='$ID' ")or die(mysqli_error($con)))
    {
        }
        }
        else{
            move_uploaded_file($imgtmp,"image/$newname");
mysqli_query($con,"update data set name='$name',address='$address',category='$category',newname='$newname' where ID='$ID' ")or die(mysqli_error($con));
            
        } 
        header("location:http://localhost/class/practicecrud/dashboard.php?page=show");
        }
?>

</div>
<div class="col-md-2">
  <h1>your previous image</h1>
<img class="img-fluid" src="image/<?php echo $data['newname']; ?>" alt="" height="100px" width="100%">
</div>
        </div>
</div>
       <?php
}
}else{
    header("location:index.php");
}
?>