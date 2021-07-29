<?php
$con = mysqli_connect("localhost","root","","shop") or die("connection failed");
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $ins=mysqli_query($con,"insert into product(product_name) values('$name')");
    $last_inserted_id=mysqli_insert_id($con);
    
    $tmp_name =$_FILES['image']['tmp_name'];
    $upload_count = 0;
    $count =count($tmp_name);
    for($i=0; $i < $count ; $i++)
    {
        $tmp_name =$_FILES['image']['tmp_name'][$i];
        $name     =$_FILES['image']['name'][$i];
        $type     =$_FILES['image']['type'][$i];
        $size     =$_FILES['image']['size'][$i];
       
        if($type == 'image/jpeg')
        {
            $path = 'image/'.time().$name;
            move_uploaded_file($tmp_name , $path);
            $upload_count++;
            
            $ins=mysqli_query($con,"insert into product_images(product_id,image) values('$last_inserted_id','$name')");
        }
        
        /*if($size <= 10024)
        {
            $path = 'image/'.time().$name;
            move_uploaded_file($tmp_name , $path);
            $upload_count++;
        }*/
       
    }
    
    echo $upload_count;
   
}
?>

<html>
<head>
    <title>Multiple file uploads</title>
    
</head>
<body>

    <form method="post" enctype="multipart/form-data">
        Name:<input type="text" name="name" value="" placeholder="Product Name"><br>
       Images:<input type="file" name="image[]" multiple accept="image/jpeg" > <br>
        <input type="submit" name="submit" value="upload">
    </form>
    
</body></html>