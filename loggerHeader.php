<?php

session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="col-12 mb-1">
        <div class="row">
            <nav class="navbar navbar-expand-lg pt-3 pb-3 position-fixed w-100" id="navbar" style="background-color: #151823; z-index: 99;">
                <div class="container-fluid">
                    <a class="navbar-brand me-3" style="margin-left: 100px;" href="#"><img src="resources/logo/Beige and Black Vintage Illustrative Bookstore Circle Logo.png" style="width: 80px; height: 80px;" alt=""></a>
                    <button class="navbar-toggler btn btn-secondary" style="background-color: #c0c0c0;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item" >
                                <a class="nav-link active text-white mt-3 ms-5 me-5" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                        <a class="nav-link active text-white mt-3 ms-5 me-5"  aria-current="page" href="cart.php"><i class="bi bi-cart"></i>&nbsp;&nbsp;Cart</a>
                    </li>

                    <li class="nav-item dropdown mt-3 ms-5 me-5  ">
        <a class="nav-link dropdown-toggle text-white "  href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       My Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="userProfile.php">My Profile</a>
          <a class="dropdown-item" href="watchlist.php">Watchlist</a>
          
          
        </div>
      </li>
                            <li class="nav-item ms-5 me-5">
                                <?php
                                if (isset($_SESSION["sell"])) {
                                    $data = $_SESSION["sell"];
                                ?>
                                    <span class="nav-link text-white"><i class="bi bi-person-circle"></i>&nbsp;&nbsp;WELCOME <br /><b><?php echo ($data["fname"] . " " . $data["lname"]); ?></b></span>
                                <?php
                                } else if (isset($_SESSION["as"])) {
                                    $data2 = $_SESSION["as"];
                                ?>
                                    <span class="nav-link text-white"><i class="bi bi-person-circle"></i>&nbsp;&nbsp;WELCOME <br /><b><?php echo ($data2["email"]); ?></b></span>
                                <?php
                                } else if (isset($_SESSION["cust"])) {
                                    $data3 = $_SESSION["cust"];
                                ?>
                                    <span class="nav-link text-white"><i class="bi bi-person-circle"></i>&nbsp;&nbsp;WELCOME <br /><b><?php echo ($data3["fname"] . " " . $data3["lname"]); ?></b></span>
                                <?php
                                }
                                ?>
                            </li>
                            <ul class="ms-sm-5 ms-md-5 ms-lg-5  pt-3 d-none d-md-none d-lg-block">
                                <button class="text-white header-button1 ps-5 pe-5 pt-2 pb-2"  onclick="signout();">Sign Out <i class="bi bi-arrow-right text-white"></i></button>
                            </ul>


                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>


    <nav class="d-block d-md-none d-lg-none navbar navbar-expand-lg pt-3 pb-3 " id="navbar" style="background-color: #151823;z-index: 99;">
        <div class="container-fluid offset-lg-1">
            <a class="navbar-brand" href="#"><img src="resources/logo/Beige and Black Vintage Illustrative Bookstore Circle Logo.png" style="width: 130px;height: 60px;" alt=""></a>
            <ul class="d-none d-md-block d-lg-none pt-2" style="padding-left: 365px;width: 520px;">
                <button class="text-white header-button1 ps-4 pe-4 pt-2 pb-2" href="#" onclick="signout();">Sign out <i class="bi bi-arrow-right text-white"></i></button>
            </ul>
            <button class="navbar-toggler btn btn-secondary" onclick="dash();" style="background-color: #c0c0c0;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offset-sm-0 offset-md-0 offset-lg-1 collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ms-2 mb-2 mb-lg-0 justify-content-between w-50 my-2 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white mt-3 ms-5 me-5"  aria-current="page" href="#"><i class="bi bi-cart"></i>&nbsp;&nbsp;Cart</a>
                    </li>

                    <li class="nav-item dropdown mt-3 ms-5 me-5  ">
        <a class="nav-link dropdown-toggle text-white "  href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       My Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">My Profile</a>
          <a class="dropdown-item" href="#">Watchlist</a>
          <a class="dropdown-item" href="#">Purchase History</a>
          
        </div>
      </li>

                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION["sell"])) {
                            $data = $_SESSION["u"];
                        ?>
                            <span class="nav-link text-white" href="#"><i class="bi bi-person-circle"></i>&nbsp;&nbsp;WELCOME <br /> <b><?php echo ($data["fname"] . " " . $data["lname"]); ?></b></span>
                        <?php
                        } else if (isset($_SESSION["as"])) {
                            $data2 = $_SESSION["as"];
                        ?>
                            <span class="nav-link text-white" href="#"><i class="bi bi-person-circle"></i>&nbsp;&nbsp;WELCOME <br /> <b><?php echo ($data2["email"]); ?></b></span>
                        <?php
                        } else if (isset($_SESSION["cust"])) {
                            $data3 = $_SESSION["cust"];
                        ?>
                            <span class="nav-link text-white" href="#"><i class="bi bi-person-circle"></i>&nbsp;&nbsp;WELCOME <br /> <b><?php echo ($data3["fname"] . " " . $data3["lname"]); ?></b></span>
                        <?php
                        }
                        ?>
                    </li>
                </ul>
                <ul class="ms-sm-5 ms-md-5 ms-lg-5 pt-3 d-none d-md-none d-lg-block">
                    <button class="text-white header-button1 ps-5 pe-5 pt-2 pb-2" href="#" onclick="signout();">Sign out <i class="bi bi-arrow-right text-white"></i></button>

                </ul>
                
            </div>
        </div>
    </nav>





    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>