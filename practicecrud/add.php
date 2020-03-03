<form action="" method="post" enctype="multipart/form-data">
    <label for="">name</label>
    <input type="text" name="name" class="form-control">
   <label for="">address</label>
    <input type="text" name="address" class="form-control">
    <label for="">category</label>
    <select name="category" id="" class="form-control">
       <option value="web">web</option>
       <option value="ios">ios</option>
    </select>
    <label for="">image</label>
    <input type="file" name="image" class="form-control">
    <input type="submit" name="sub" class="btn btn-success">
</form>
<?php

if(isset($_POST['sub']))

{
    extract($_POST);
//     echo die("jgjjjjjjjjjjjjjjjjjjjjj");
    $imgname=$_FILES['image']['name'];
    $tmpname=$_FILES['image']['tmp_name'];
    $a=explode(".",$imgname);
    $b=end($a);
    if($b=="jpg" or $b=="png" or $b=="jpeg")
    {
        $newname=uniqid().$imgname;
        if(move_uploaded_file($tmpname,"image/$newname"))
        {
   if(mysqli_query($con,"insert into data(name,address,category,newname) values('$name','$address','$category','$newname')"))
   {
       header("location:http://localhost/class/practicecrud/dashboard.php?page=show");
   }}}else{
        echo"errorerror";
    }}     
?>


