<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Watchlist | The Book Stack</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/logo/Beige and Black Vintage Illustrative Bookstore Circle Logo.png" />
</head>

<body>

    <div class="container-fluid bg-light">
        <div class="row min-vh-100">
            <?php include "loggerHeader.php"; ?>
            <?php require "connection.php"; ?>

            <?php if (isset($_SESSION["cust"])) { ?>

                <div class="col-12 mt-3">
                    <div class="row">
                        <div class="col-12 border border-1 border-primary rounded mb-2 p-3 bg-white shadow-sm">
                            <div class="row">

                                <div class="col-12">
                                    <h1 class="display-4 text-center text-primary">Watchlist &hearts;</h1>
                                </div>

                                <div class="col-12 col-lg-6 mx-auto">
                                    <hr />
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 col-lg-8 mb-3 mx-auto">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search in Watchlist..." />
                                                <button class="btn btn-primary">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr />
                                </div>

                                <div class="col-12 col-lg-3 border-0 border-end border-1 border-dark">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Watchlist</li>
                                        </ol>
                                    </nav>
                                    <nav class="nav nav-pills flex-column">
                                        <a class="nav-link active" aria-current="page" href="#">My Watchlist</a>
                                        <a class="nav-link" href="#">My Cart</a>
                                        <a class="nav-link" href="#">Recents</a>
                                    </nav>
                                </div>

                                <?php
                                $watch_rs = Database::search("SELECT * FROM `watchlist` WHERE `user_email`='" . $_SESSION["cust"]["email"] . "'");
                                $watch_num = $watch_rs->num_rows;

                                if ($watch_num == 0) {
                                ?>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <img src="resource/empty.png" alt="Empty Watchlist" class="img-fluid" />
                                                <h2 class="mt-3">You have no items in your Watchlist yet.</h2>
                                                <a href="customerpanel.php" class="btn btn-warning btn-lg mt-3">Start Shopping</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <?php
                                            for ($x = 0; $x < $watch_num; $x++) {
                                                $watch_data = $watch_rs->fetch_assoc();
                                            ?>
                                                <div class="col-12 col-md-6 col-lg-4 mb-4">
                                                    <div class="card h-100 shadow-sm">
                                                        <div class="card-body">
                                                            <?php
                                                            $img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $watch_data["product_id"] . "'");
                                                            $img_data = $img_rs->fetch_assoc();
															$con_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$watch_data["product_id"]."' ");
															$con_data = $con_rs->fetch_assoc();
                                                            ?>
                                                            <img src="<?php echo $img_data["code"]; ?>" class="card-img-top img-fluid" style="height: 200px;" alt="Product Image" />
                                                            <h5 class="card-title mt-2 text-primary"><?php echo $con_data["title"]; ?></h5>
															
                                                           
                                                            <p class="card-text">Price: Rs. <?php echo $con_data["price"]; ?> .00</p>
                                                            <p class="card-text">Quantity: <?php echo $con_data["qty"]; ?> Items available</p>
                                                            <p class="card-text">Seller: Lahiru</p>
                                                        </div>
                                                        <div class="card-footer d-flex justify-content-around">
                                                            <a href="#" class="btn btn-outline-success">Buy Now</a>
                                                            <a href="#" class="btn btn-outline-warning">Add to Cart</a>
                                                            <a href="#" class="btn btn-outline-danger" onclick='removeFromWatchlist(<?php echo $watch_data["id"]; ?>);'>Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } else {
                header("Location:customerpanel.php");
            }
            ?>

            <?php include "footer.php"; ?>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>
