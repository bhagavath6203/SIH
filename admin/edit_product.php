<?php 
  include "connect.php";
  $categories = mysqli_query($con, "SELECT * FROM categorys");
  if(isset($_POST['getproduct'])){
    $products_details = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE sku = '{$_POST['productsku']}'"));
    $products_description = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM product_details WHERE product_id = '{$products_details['sku']}'"));
  }
  if(isset($_POST['editproduct'])){
    $products_detail = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE sku = '{$_POST['psku']}'"));
    $pname = $_POST['product_name'];
    $pprice = $_POST['pprice'];
    $category = $_POST['category'];
    $dprice = $_POST['dprice'];
    $aboutpro = $_POST['aboutpro'];
    $no_of_units = $_POST['no_of_units'];
    $stime = $_POST['stime'];
    $pend = $_POST['pend'];
    $description = $_POST['description'];
    $addinfo = $_POST['addinfo'];
    $photos = array();
    if(isset($_FILES["photos"]) && !empty($_FILES['photos']['name'][0])){
      $target_dir = "../Bhavani/img/products/";
      foreach ($_FILES["photos"]["tmp_name"] as $key => $tmpName){
        $fileName = uniqid() . '_' . $_FILES["photos"]["name"][$key];
        $photos[] = $fileName;
        $targetPath = $target_dir . $fileName;
        if(move_uploaded_file($tmpName, $targetPath)){
          echo  "<script>console.log('File Uploaded Successfully')</script>";
        } else{
          echo "Error uploading file <br>";
        }
      }
    }
    else{
      $photos[0] = $products_detail['photo1'];
      $photos[1] = $products_detail['photo2'];
      $photos[2] = $products_detail['photo3'];
      $photos[3] = $products_detail['photo4'];
      $photos[4] = $products_detail['photo5'];  
    }
    // photos are not updating

    $add_new_product = $con -> prepare("UPDATE `products` SET `product_name`=?,`product_price`=?,`category_id`=?, `discount_price`=?,`about_product`=?,`no_units`=?,`product_start_time`=?,`product_end_time`=?, `photo1`=?,`photo2`=?,`photo3`=?,`photo4`=?,`photo5`=? WHERE `sku` = '{$_POST['psku']}'");
    $add_new_product -> bind_param("sdsdsisssssss",$pname,$pprice,$category,$dprice,$aboutpro,$no_of_units,$stime,$pend,$photos[0],$photos[1],$photos[2],$photos[3],$photos[4]);
    $new_pro_details = $con -> prepare("UPDATE `product_details` SET `description`=?,`additional_info`=? WHERE `product_id` = '{$_POST['psku']}'");
    $new_pro_details -> bind_param("ss",$description,$addinfo);
    $new_pro_details -> execute();
    if($add_new_product -> execute()){
      echo "<script>alert('Product Added Successfully'); windows.location.href='index.php'; </script>";
    } else {
      echo "<script>alert('Product Adding Failed')</script>";
    }
  }

?>
<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="Bhavani/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Aqua Hub Admin</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="Bhavani/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="Bhavani/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="Bhavani/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="Bhavani/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="Bhavani/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="Bhavani/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="Bhavani/vendor/libs/apex-charts/apex-charts.css" />

    <script src="Bhavani/vendor/js/helpers.js"></script>

    <script src="Bhavani/js/config.js"></script>
  </head>

  <body>
        
      <!-- Sidebar Starts Here Shiva -->
        <?php include 'header.php'; ?>
      <!-- Sidebar Ends Here Shiva -->

        <!-- Content Starts Here Shiva-->
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">

            <div class="col-md-6">
                  <div class="card mb-4">
                    <h5 class="card-header">Select the Product</h5>
                    <form action="#" method="post">
                      <div class="card-body">
                        <div>
                          <label for="defaultFormControlInput" class="form-label">Product SKU</label>
                          <input type="text"
                            class="form-control"
                            id="defaultFormControlInput"
                            placeholder="COSB001"
                            aria-describedby="defaultFormControlHelp"
                            type="number"
                            name="productsku"
                          />
                        </div>
                        <div class="mt-3">
                          <button type="submit" name="getproduct" class="btn btn-primary">Get Details</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

                <?php if(isset($_POST['getproduct'])){ ?>
                <!-- Update the product details here Shiva -->
              <form action="" method="post" enctype="multipart/form-data">
                <!-- Basic Layout -->
                <div class="row">
                  <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Update Product</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">SKU of Product</label>
                          <input disabled type="text" name="sku" class="form-control" id="basic-default-fullname" value="<?php echo $products_details['sku']; ?>" />
                          <input hidden type="text" name="psku" class="form-control" id="basic-default-fullname" value="<?php echo $products_details['sku']; ?>" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Product Price</label>
                          <input name="pprice" type="text" class="form-control" id="basic-default-company" value="<?php echo $products_details['product_price']; ?>" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Prooduct Starts Time (<?php echo $products_details['product_start_time'] ?>)</label>
                          <input name="stime" type="time" class="form-control" id="basic-default-company" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">No of Units Avabile</label>
                          <input name="no_of_units" type="number" class="form-control" id="basic-default-fullname" value="<?php echo $products_details['no_units']; ?>" />
                        </div>
                        <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Select Category</label>
                        <select class="form-select" id="exampleFormControlSelect1" name="category" aria-label="Default select example">
                          <?php while($row = mysqli_fetch_assoc($categories)){ ?>
                          <option <?php if($row['category_id'] == $products_details['category_id']) echo 'selected';?> value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
                          <?php } ?>
                        </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-message">Description</label>
                          <input type="text" name="description" id="basic-default-message" class="form-control" value="<?php echo $products_description['description']; ?>">
                        </div>
                        <!-- <button type="submit" class="btn btn-primary">Send</button> -->
                      <!-- </form> -->
                    </div>
                  </div>
                  </div>
                  <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">More About Product</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Product Name</label>
                          <input type="text" name="product_name" class="form-control" id="basic-default-company" value=" <?php echo $products_details['product_name']; ?> " />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Discount Price</label>
                          <input type="text" name="dprice" class="form-control" id="basic-default-company" value="<?php echo $products_details['discount_price']; ?>" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Prooduct Ends Time (<?php echo $products_details['product_end_time'] ?>)</label>
                          <input type="time" name="pend" class="form-control" id="basic-default-company" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">About Prooduct</label>
                          <input type="text" name="aboutpro" class="form-control" id="basic-default-company" value=" <?php echo $products_details['about_product']; ?> " />
                        </div>
                        <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Product Photos</label>
                        <input class="form-control" name="photos[]" type="file" id="formFileMultiple" multiple />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-message">Additional Information</label>
                          <input type="text" name="addinfo" id="basic-default-message" class="form-control" value="<?php echo $products_description['additional_info']; ?>">
                        </div>
                    </div>
                  </div>
                  </div>
                </div>
                <button type="submit" name="editproduct" class="btn btn-primary">Send</button>
              </form>

                <!-- Update Product Details Completed here Shiva -->
                <?php } ?>


              
            </div>
          </div>
        <!-- Content Ends Here Shiva -->

      <!-- Footer Starts Here Shiva-->
        <?php include 'footer.php'; ?>
      <!-- Footer Ends Here Shiva-->

  </body>
</html>
