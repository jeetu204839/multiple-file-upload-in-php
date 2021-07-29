<?php
if(isset($_POST['submit']))
{
    $tmp_name =$_FILES['image']['tmp_name'];
    $name =$_FILES['image']['name'];
    $type =$_FILES['image']['type'];
    $size =$_FILES['image']['size'];
    
    echo $tmp_name." <br> ".$name." <br> ".$type." <br> ".$size;
}
?>

<html>
<head>
    <title>Multiple file uploads</title>
    
</head>
<body>

    <form method="post" enctype="multipart/form-data">
       Images:<input type="file" name="image[]" > <br>
        <input type="submit" name="submit" value="upload">
    </form>
    
</body></html>