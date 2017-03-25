<?php
    
    // configuration
    require("../controllers/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("../public_html/postad.html", ["title" => "Sell item", "category" => $category]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {    $id=$_GET['id'];      
        // validate submission
        if (empty($_POST["title"]))
        {
            apologize("You must give title of your item.");
        }
        else if (empty($_POST["desc"]))
        {
            apologize("You must provide description");
        }
        else if (empty($_POST["contact"]))
        {
            apologize("You must give your contact information");
        }
        else if (empty($_POST["price"]))
        {
            apologize("You must give price of your item.");
        }
        else if (empty($_POST["category"]))
        {
            apologize("You must select a category.");
        }
        //getting file name
        $target_dir = "../public_html/uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        //file extension
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        if(empty($_FILES["image"]["tmp_name"]))
            apologize("You must provide an image.");
            
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false)
        {
            //echo "File is an image - " . $check["mime"] . ".</br>";
            $uploadOk = 1;
        } 
        else 
        {
            apologize("File is not an image.");
            $uploadOk = 0;
        }
        
        //checking size of uploaded file
        if ($_FILES["image"]["size"] > 5000000)
        {
            apologize("Your file is too large(>5MB).");
            $uploadOk = 0;
        }
        
        //checking if there was an error
        if ($uploadOk == 0) 
            apologize("Your file was not uploaded.");
        else
        {
            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file))
                apologize("There was an error uploading your file.");
        }
        extract($_POST);
$query="Select college_id from users where id=$id";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);
$college_id=$row["college_id"];
$query="Select first_name from users where id=$id";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);
$user_name=$row["first_name"];
$query="insert ignore into store values ('$target_file','$title',$price,$college_id,$category,0,'$user_name',$id)";
if(!mysqli_query($conn,$query))
echo("Error description: " . mysqli_error($conn));
else
$row=mysqli_fetch_assoc($result);
print_r($row);


    }

?>
