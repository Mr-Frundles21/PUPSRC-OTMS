<?php
session_start();
$servername = "localhost";
$username =  "root";
$password = "";
$dbname =  "accountingdb";

$conn = new mysqli ($servername,$username,$password,$dbname);
if ($conn->connect_error){
    die("connection failed".$conn->connect_error);
}
if (isset($_POST['submit'])) {
    // Retrieve form data
    $amountToOffset = $_POST['amountToOffset'];
    $offsetType = $_POST['offsetType'];


    $sql = "INSERT INTO offsettingtb (amountToOffset, offsetType)
    VALUES ('$amountToOffset', '$offsetType')";

    if ($conn->query($sql) === TRUE) {
        header("location:offsetting3.php");
    } else {
        echo "Error inserting data: " . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounting Office - Landing Page</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/offsetting2.css">
    <script src="https://kit.fontawesome.com/fe96d845ef.js" crossorigin="anonymous"></script>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- Start of navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-maroon p-3">
        <div class="container-fluid">
            <img class="p-2" src="images/puplogo.png" alt="PUP Logo" width="40">
            <a class="navbar-brand" href="#"><strong>PUPSRC-OTMS</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto order-2 order-lg-1">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="officeServicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Accounting Services Office
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="officeServicesDropdown">
                            <li><a class="dropdown-item" href="#">Registration</a></li>
                            <li><a class="dropdown-item" href="../guidance.php">Guidance</a></li>
                            <li><a class="dropdown-item" href="#">Academic</a></li>
                            <li><a class="dropdown-item" href="index.php">Accounting</a></li>
                            <li><a class="dropdown-item" href="#">Administration</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="officeServicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Offsetting
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="officeServicesDropdown">
                            <li><a class="dropdown-item" href="#">Payment</a></li>
                            <li><a class="dropdown-item" href="transactions.php">Transaction History</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav order-3 order-lg-3 w-50 gap-3">
                    <div class="d-flex navbar-nav justify-content-center me-auto order-2 order-lg-1 w-100">
                        <form class="d-flex w-100">
                            <input class="form-control me-2" type="search" placeholder="Search for services..." aria-label="Search">
                            <button class="btn btn-warning" type="submit"><strong>Search</strong></button>
                        </form>
                    </div>
                    <li class="nav-item dropdown order-1 order-lg-2">
                        <a class="nav-link dropdown-toggle" href="#" id="userProfileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user-circle me-1"></i>
                            Juan Dela Cruz
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userProfileDropdown">
                            <li><a class="dropdown-item" href="#">Account Settings</a></li>
                            <li><a class="dropdown-item" href="#">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End of navbar -->

    <div class="container-fluid p-4">
        <nav class="breadcrumb-nav" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="index.php">Accounting Services Office</a></li>
                <li class="breadcrumb-item active" aria-current="page">Offsetting</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid text-center p-4">
        <h1>Offsetting</h1>
    </div>
    <form action="" id="student-offset"method="post">
    <div class="container-fluid-form">
        <h2>Select type of offset</h2>
        <div class="row g-3">
            <div class="col-md-6">
                <label for="offsetType" class="form-label">Offset Type</label>
                <select class="form-select" id="offsetType"name="offsetType" required>
                    <option value="" selected disabled>Select an option</option>
                    <option value="tuitionFee" >Tuition Fee</option>
                    <option value="miscellaneous">Miscellaneous Fee</option>
                </select>
                <div class="invalid-feedback">
                    Please select an offset type.
                </div>
            </div>
            <div class="col-md-7">
                <label for="amountToOffset" class="form-label2">Amount to be offset:</label>
                <input type="number" class="form-control" id="amountToOffset"name="amountToOffset" pattern="^\d{0,6}(\.\d{0,2})?$" step="any"required>
                <div class="invalid-feedback">
                    Please provide the amount to be offset.
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
            </div>
        </div>
    </div>
    </form>
    <div class="alert alert-info" role="alert">
                                <h4 class="alert-heading">
                                <i class="fa-solid fa-circle-info"></i> Reminder
                                </h4>
                                <p>Once you click the "Submit" button, your request to offset your account tuition will be securely forwarded to the relevant department for processing.</p>
                            <p>The confirmation of your request (whether approved or disapproved) will be provided, ensuring that you receive timely updates regarding the status of your tuition offsetting request.</p>
                            <p>We prioritize the confidentiality of your money-related information and remain committed to providing a secure and reliable experience for all our users.</p>
                            </div>
    <script src="js/offsetting_script.js"></script>
</body>
</html>