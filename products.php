<?php
  include_once 'products_crud.php';
?>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Hashotidy: Products</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
   <?php include_once 'nav_bar.php'; ?>
 
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2>Create New Product</h2>       
      </div>
    <form action="products.php" method="post" class="form-horizontal"  enctype="multipart/form-data">
      <div class="form-group">
          <label for="productid" class="col-sm-3 control-label">PRODUCT'S ID</label>
          <div class="col-sm-9">
            <input name="pid" type="text" class="form-control" id="productid" placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_id']; ?>" required>

        </div>
        </div>
      <div class="form-group">
          <label for="productname" class="col-sm-3 control-label">PRODUCT'S NAME</label>
          <div class="col-sm-9">
           <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>" required>

        </div>
        </div>
        <div class="form-group">
          <label for="productprice" class="col-sm-3 control-label">PRICE</label>
          <div class="col-sm-9">
           <input name="price" type="number" class="form-control" id="productprice" placeholder="Product Price" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_price']; ?>" min="0.0" step="0.01" required>
        </div>
        </div>
      <div class="form-group">
          <label for="producttype" class="col-sm-3 control-label">PRODUCT'S TYPE</label>
          <div class="col-sm-9">
        <select name="type" class="form-control" id="producttype" required>
            <option value="">Please select</option>
            <option value="Bows" <?php if(isset($_GET['edit'])) if($editrow['fld_type']=="Bows") echo "selected"; ?>>Bows</option>
        <option value="Earmuffs" <?php if(isset($_GET['edit'])) if($editrow['fld_type']=="Earmuffs") echo "selected"; ?>>Earmuffs</option>
        <option value="Kopiah" <?php if(isset($_GET['edit'])) if($editrow['fld_type']=="Kopiah") echo "selected"; ?>>Kopiah</option>
        <option value="Barretts" <?php if(isset($_GET['edit'])) if($editrow['fld_type']=="Barretts") echo "selected"; ?>>Barretts</option>
        <option value="Scarf" <?php if(isset($_GET['edit'])) if($editrow['fld_type']=="Scarf") echo "selected"; ?>>Scarf</option>
        <option value="Songkok" <?php if(isset($_GET['edit'])) if($editrow['fld_type']=="Songkok") echo "selected"; ?>>Songkok</option>
        <option value="Turban" <?php if(isset($_GET['edit'])) if($editrow['fld_type']=="Turban") echo "selected"; ?>>Turban</option>
        <option value="Hair Pins" <?php if(isset($_GET['edit'])) if($editrow['fld_type']=="Hair Pins") echo "selected"; ?>>Hair Pins</option>
        <option value="Shapers" <?php if(isset($_GET['edit'])) if($editrow['fld_type']=="Shapers") echo "selected"; ?>>Shapers</option>
        <option value="Tiara" <?php if(isset($_GET['edit'])) if($editrow['fld_type']=="Tiara") echo "selected"; ?>>Tiara</option>
        <option value="Headband" <?php if(isset($_GET['edit'])) if($editrow['fld_type']=="Headband") echo "selected"; ?>>Headband</option>
        <option value="Hat" <?php if(isset($_GET['edit'])) if($editrow['fld_type']=="Hat") echo "selected"; ?>>Hat</option>
        <option value="Cap" <?php if(isset($_GET['edit'])) if($editrow['fld_type']=="Cap") echo "selected"; ?>>Cap</option>
        <option value="Combs" <?php if(isset($_GET['edit'])) if($editrow['fld_type']=="Combs") echo "selected"; ?>>Combs</option>
        <option value="Rubber Ties" <?php if(isset($_GET['edit'])) if($editrow['fld_type']=="Rubber Ties") echo "selected"; ?>>Rubber Ties</option>
        <option value="Hair Clip" <?php if(isset($_GET['edit'])) if($editrow['fld_type']=="Hair Clip") echo "selected"; ?>>Hair Clip</option>
          </select>
        </div>
        </div>    
        <div class="form-group">
          <label for="productcolour" class="col-sm-3 control-label">PRODUCT'S COLOUR</label>
          <div class="col-sm-9">
            <input name="colour" type="color" class="form-control" id="productcolour" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_colour']; ?>">
          </div>
      </div>
        <div class="form-group">
          <label for="material" class="col-sm-3 control-label">PRODUCTS'S MATERIAL</label>
          <div class="col-sm-9">
 <select name="material" class="form-control" id="material" required>
            <option value="">Please select</option>
            <option value="Fabric" <?php if(isset($_GET['edit'])) if($editrow['fld_material']=="Fabric") echo "selected"; ?>>Fabric</option>
        <option value="Cotton" <?php if(isset($_GET['edit'])) if($editrow['fld_material']=="Cotton") echo "selected"; ?>>Cotton</option>
        <option value="Crepe" <?php if(isset($_GET['edit'])) if($editrow['fld_material']=="Crepe") echo "selected"; ?>>Crepe</option>
        <option value="Plastic" <?php if(isset($_GET['edit'])) if($editrow['fld_material']=="Plastic") echo "selected"; ?>>Plastic</option>
        <option value="Nylon" <?php if(isset($_GET['edit'])) if($editrow['fld_material']=="Nylon") echo "selected"; ?>>Nylon</option>
        <option value="Rubber" <?php if(isset($_GET['edit'])) if($editrow['fld_material']=="Rubber") echo "selected"; ?>>Rubber</option>
        <option value="Microfibre" <?php if(isset($_GET['edit'])) if($editrow['fld_material']=="Microfibre") echo "selected"; ?>>Microfibre</option>
        <option value="Chiffon" <?php if(isset($_GET['edit'])) if($editrow['fld_material']=="Chiffon") echo "selected"; ?>>Chiffon</option>
        <option value="Velvet" <?php if(isset($_GET['edit'])) if($editrow['fld_material']=="Velvet") echo "selected"; ?>>Velvet</option>
        <option value="Metal" <?php if(isset($_GET['edit'])) if($editrow['fld_material']=="Metal") echo "selected"; ?>>Metal</option>
      </select>
        </div>
        </div>  
        <div class="form-group">
          <label for="purpose" class="col-sm-3 control-label">DESCRIPTION</label>
          <div class="col-sm-9">
           <input name="purpose" type="text" class="form-control" id="purpose" placeholder="Insert Description Here" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_purpose']; ?>" required>
        </div>
        </div>
        <div class="form-group">
          
          <label for="fileToUpload" class="col-sm-3 control-label">Product's Picture</label>
          <div class="col-sm-9">
    <input type="file" class="form-control-file" id="fileToUpload" name="img" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_image']; ?>" required>
  </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
      <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_id']; ?>">
      <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
          <?php } else { ?>
          <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
          <?php } ?>
          <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
      </div>
      </div>
    </form>
    </div>
  </div>
     <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Products List</h2>
      </div>
      <table class="table table-striped table-bordered">
        <tr>
          <th>Product ID</th>
          <th>Name</th>
          <th>Price</th>
          <th>Type</th>
          <th></th>
      </tr>
      <?php
      // Read
        $per_page = 5;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_products_a176925_pt2 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>   
      <tr>
        <td><?php echo $readrow['fld_product_id']; ?></td>
        <td><?php echo $readrow['fld_product_name']; ?></td>
        <td>RM<?php echo $readrow['fld_price']; ?></td>
        <td><?php echo $readrow['fld_type']; ?></td>
        <td>
          <a href="products_details.php?pid=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
          <a href="products.php?edit=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="products.php?delete=<?php echo $readrow['fld_product_id']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
        </td>
      </tr>
      <?php } ?>
 
      </table>
    </div>
    </div>
  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <nav>
          <ul class="pagination">
          <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_products_a176925_pt2");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $total_records = count($result);
          }
          catch(PDOException $e){
                echo "Error: " . $e->getMessage();
          }
          $total_pages = ceil($total_records / $per_page);
          ?>
          <?php if ($page==1) { ?>
            <li class="disabled"><span aria-hidden="true">«</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"products.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
  </div>
</div>  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>