<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 

//Create
if (isset($_POST['create'])) {
  try {
 
      $stmt = $conn->prepare("INSERT INTO tbl_products_a176925_pt2(fld_product_id, fld_product_name, fld_price, fld_type, fld_colour, fld_material, fld_purpose, fld_product_image) 
        VALUES(:pid, :name, :price, :type, :colour, :material, :purpose, :img)");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
     $stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->bindParam(':colour', $colour, PDO::PARAM_STR);
      $stmt->bindParam(':material', $material, PDO::PARAM_STR);
      $stmt->bindParam(':purpose', $purpose, PDO::PARAM_STR);
    $stmt->bindParam(':img', $img, PDO::PARAM_STR);

       
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
   $type =  $_POST['type'];
    $colour = $_POST['colour'];
    $material = $_POST['material'];
    $purpose=$_POST['purpose'];
    $img= basename($_FILES["img"]["name"]);

    $stmt->execute();
        header("Location: products.php");

    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
//Update
if (isset($_POST['update'])) {
  try {
 
       $stmt = $conn->prepare("INSERT INTO tbl_products_a176925_pt2(fld_product_id, fld_product_name, fld_price, fld_type, fld_colour, fld_material, fld_purpose, fld_product_image) 
        VALUES(:pid, :name, :price, :type, :colour, :material, :purpose, :img)");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_STR);
      $stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->bindParam(':colour', $colour, PDO::PARAM_STR);
      $stmt->bindParam(':material', $material, PDO::PARAM_STR);
      $stmt->bindParam(':purpose', $purpose, PDO::PARAM_STR);
      $stmt->bindParam(':img', $img, PDO::PARAM_STR);

       
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type =  $_POST['type'];
    $colour = $_POST['colour'];
    $material = $_POST['material'];
    $purpose=$_POST['purpose'];
    $img= basename($_FILES["img"]["name"]);
    
    $stmt->execute();
 
    
    header("Location: products.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
      $stmt = $conn->prepare("DELETE FROM tbl_products_a176925_pt2 WHERE fld_product_id = :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: products.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
  try {
 
      $stmt = $conn->prepare("SELECT * FROM tbl_products_a176925_pt2 WHERE fld_product_id = :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
 {
      echo "Error: " . $e->getMessage();
  }
}
 
  $conn = null;

   if (isset($_FILES['img'])) {
        $target_dir = "Pictures/";
        $imageFileType = strtolower(pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION));
        
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $filename= basename($_FILES["img"]["name"]);

        // Check if image file is a actual image or fake image
        if(isset($_POST["update"])) {
            $check = getimagesize($_FILES["img"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["img"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
  
        // Check file size
        if ($_FILES["img"]["size"] > 1000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            //echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
              
                echo "The file ". basename( $_FILES["img"]["name"]). " has been uploaded.";
            } else {
              $uploadOk = 0;
                echo "Sorry, there was an error uploading your file.";
            }
        }
      }
?>