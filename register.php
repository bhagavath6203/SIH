<?php
include "connect.php"; // Include the database connection file
// Check if form is submitted
if (isset($_POST['register'])) {
    // Fetch the form data
    $stdname = $_POST['stdname'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $hometown = $_POST['hometown'];
    $role = $_POST['role']; // Fetch the role from the form (farmer or customer)

    // Validate role selection
    if ($role === 'farmer' || $role === 'customer') {
        // Prepare the SQL query to insert both student details and the role
        $sql = "INSERT INTO students (student_name, student_id, home_town, password, role) 
                VALUES ('$stdname', '$mobile', '$hometown', '$password', '$role')";

        // Execute the query
        if ($con->query($sql) === TRUE) {
            // Optionally, store student_id in the session for future use
            $_SESSION['student_id'] = $mobile; 
            echo "<script>alert('Student Registered Successfully')</script>";
            header("Location: login.php"); // Redirect to the homepage or another page
        } else {
            echo "<script>alert('Student Registration Failed: " . $con->error . "')</script>";
        }
    } else {
        echo "<script>alert('Invalid role selected')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Aqua Hub Store</title>

    <meta name="keywords" content="WebSite Template" />
    <meta name="description" content="Porto - Multipurpose Website Template">
    <meta name="author" content="okler.net">

    <!-- Favicon -->
    <link rel="shortcut icon" href="Bhavani/img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="Bhavani/img/apple-touch-icon.png">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Web Fonts  -->
    <link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400&display=swap" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="Bhavani/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="Bhavani/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="Bhavani/vendor/animate/animate.compat.css">
    <link rel="stylesheet" href="Bhavani/vendor/simple-line-icons/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="Bhavani/vendor/owl.carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="Bhavani/vendor/owl.carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="Bhavani/vendor/magnific-popup/magnific-popup.min.css">
    <link rel="stylesheet" href="Bhavani/vendor/bootstrap-star-rating/css/star-rating.min.css">
    <link rel="stylesheet" href="Bhavani/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="Bhavani/css/theme.css">
    <link rel="stylesheet" href="Bhavani/css/theme-elements.css">
    <link rel="stylesheet" href="Bhavani/css/theme-blog.css">
    <link rel="stylesheet" href="Bhavani/css/theme-shop.css">

    <!-- Skin CSS -->
    <link id="skinCSS" rel="stylesheet" href="Bhavani/css/skins/default.css">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="Bhavani/css/custom.css">

    <!-- Head Libs -->
    <script src="Bhavani/vendor/modernizr/modernizr.min.js"></script>

</head>

<body data-plugin-page-transition>

    <div class="body">

        <?php include "shoping_header.php" ?>
        <!-- Headre Comes Here Shiva -->
        <div role="main" class="main shop pt-4">


            <div class="container py-4">

                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-5 mb-5 mb-lg-0">
                        <h2 class="font-weight-bold text-5 mb-0">Register as a Member</h2>
                        <form action="#" id="frmSignIn" method="post" class="needs-validation">

                                                       <!-- Radio buttons for Farmer and Customer -->
                                                       <div class='row mb-3'>
    <div class='form-group col'>
        <label class='form-label text-color-dark text-3'>Select Role <span class='text-color-danger'>*</span></label>
        <div class='d-flex'>
            <div class='form-check form-check-inline'>
                <input class='form-check-input' type='radio' name='role' id='farmer' value='farmer' required>
                <label class='form-check-label text-color-dark text-3' for='farmer'>
                    Farmer
                </label>
            </div>
            <div class='form-check form-check-inline'>
                <input class='form-check-input' type='radio' name='role' id='customer' value='customer' required>
                <label class='form-check-label text-color-dark text-3' for='customer'>
                    Customer
                </label>
            </div>
        </div>
    </div>
</div>


                            <div class="row">
                                <div class="form-group col">
                                    <label class="form-label text-color-dark text-3">Name <span class="text-color-danger">*</span></label>
                                    <input type="text" name="stdname" class="form-control form-control-lg text-4" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col">
                                    <label class="form-label text-color-dark text-3">Mobile Number<span class="text-color-danger">*</span></label>
                                    <input type="text" name="mobile" class="form-control form-control-lg text-4" required>
                                </div>
                            </div>

                         <!--   <div class="row">
                                <div class="form-group col">
                                    <label class="form-label text-color-dark text-3">Mobile Number <span class="text-color-danger">*</span></label>
                                    <input type="text" name="mobile" class="form-control form-control-lg text-4" required>
                                </div>
                            </div>-->

                            <div class="row">
                                <div class="form-group col">
                                    <label class="form-label text-color-dark text-3">Password <span class="text-color-danger">*</span></label>
                                    <input type="password" name="password" class="form-control form-control-lg text-4" required>
                                </div>
                            </div>

                         <!--<div class="row">
                                <div class="form-group col">
                                    <label class="form-label text-color-dark text-3">Batch <span class="text-color-danger">*</span></label>
                                    <div class="custom-select-1">
                                        <select class="form-select form-control h-auto py-2" name="batch" required>
                                            <option value="" selected>Select the Batch</option>
                                            <option value="2027">2027</option>
                                            <option value="2026">2026</option>
                                            <option value="2025">2025</option>
                                            <option value="2024">2024</option>
                                        </select>
                                    </div>
                                </div>
                            </div>-->

                           <!-- <div class="row">
                                <div class="form-group col">
                                    <label class="form-label text-color-dark text-3">Department <span class="text-color-danger">*</span></label>
                                    <div class="custom-select-1">
                                        <select class="form-select form-control h-auto py-2" name="department" required>
                                            <option value="" selected>Select the Department</option>
                                            <option value="AIDS">AIDS</option>
                                            <option value="AIML">AIML</option>
                                            <option value="CSD">CSD</option>
                                            <option value="CSE">CSE</option>
                                            <option value="CSBS">CSBS</option>
                                            <option value="CSIT">CSIT</option>
                                            <option value="CIC">CIC</option>
                                            <option value="CIVIL">CIVIL</option>
                                            <option value="ECE">ECE</option>
                                            <option value="EEE">EEE</option>
                                            <option value="IT">IT</option>
                                            <option value="MECH">MECH</option>
                                        </select>
                                    </div>
                                </div>
                            </div>-->


                          <!--<div class="row">
                                <div class="form-group col">
                                    <label class="form-label text-color-dark text-3">Section <span class="text-color-danger">*</span></label>
                                    <div class="custom-select-1">
                                        <select class="form-select form-control h-auto py-2" name="section" required>
                                            <option value="" selected>Select the Section</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                        </select>
                                    </div>
                                </div>
                            </div>-->

                           <!-- <div class="row">
                                <div class="form-group col">
                                    <label class="form-label text-color-dark text-3">Father Name <span class="text-color-danger">*</span></label>
                                    <input type="text" name="fathername" class="form-control form-control-lg text-4" required>
                                </div>
                            </div>-->

                         <!--   <div class="row">
                                <div class="form-group col">
                                    <label class="form-label text-color-dark text-3">Mother Name <span class="text-color-danger">*</span></label>
                                    <input type="text" name="mothername" class="form-control form-control-lg text-4" required>
                                </div>
                            </div>-->

                           <!--  <div class="row">
                                <div class="form-group col">
                                    <label class="form-label text-color-dark text-3">Address<span class="text-color-danger">*</span></label>
                                    <input type="text" name="hometown" class="form-control form-control-lg text-4" required>
                                </div>
                            </div>-->

                            <div class="row">
    <div class="form-group col">
        <label class="form-label text-color-dark text-3">Address<span class="text-color-danger">*</span></label>
        <small class="form-text text-muted">Include details like Street, Village/Town, District, Pincode</small>
        <input type="text" name="hometown" class="form-control form-control-lg text-4" placeholder="e.g., 123 Main St, Springfield, IL 62704" required>
    </div>
</div>


                            
                        <!--    <div class="row">
                                <div class="form-group col">
                                    <label class="form-label text-color-dark text-3">Transportation <span class="text-color-danger">*</span></label>
                                    <div class="custom-select-1">
                                        <select class="form-select form-control h-auto py-2" name="transportation" required>
                                            <option value="" selected>Select the Transportation</option>
                                            <option value="College Bus">College Bus</option>
                                            <option value="RTC">RTC</option>
                                            <option value="Own Vehicle">Own Vehicle</option>
                                            <option value="Hostel">Hostel</option>
                                            <option value="Room">Room</option>
                                            <option value="Local">Local</option>
                                        </select>
                                    </div>
                                </div>
                            </div>-->

                            <div class="row">
                                <div class="form-group col">
                                    <button type="submit" name="register" class="btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading...">Register</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class='form-group col-md-auto'>
                                    Login to Harvest hub:
                                    <a class='text-decoration-none text-color-dark text-color-hover-primary font-weight-semibold text-2' href='login.php'>Login</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>


        </div>
        <?php include 'shoping_fotter.php'; ?>
        <!-- Fotter Come Here Shiva -->
    </div>

    <!-- Vendor -->
    <script src="Bhavani/vendor/plugins/js/plugins.min.js"></script>
    <script src="Bhavani/vendor/bootstrap-star-rating/js/star-rating.min.js"></script>
    <script src="Bhavani/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.js"></script>
    <script src="Bhavani/vendor/jquery.countdown/jquery.countdown.min.js"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="Bhavani/js/theme.js"></script>

    <!-- Current Page Vendor and Views -->
    <script src="Bhavani/js/views/view.shop.js"></script>

    <!-- Theme Custom -->
    <script src="Bhavani/js/custom.js"></script>

    <!-- Theme Initialization Files -->
    <script src="Bhavani/js/theme.init.js"></script>

</body>

</html>