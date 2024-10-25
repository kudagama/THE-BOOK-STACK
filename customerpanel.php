<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | The Book Stack</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="icon" href="resources/backgroung_imges/Beige and Black Vintage Illustrative Bookstore Circle Logo.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include "loggerHeader.php"; ?>

            <hr />

            <div class="col-12 mt-4 justify-content-center ">
                <div class="row mt-5 mb-3">
                    <div class="offset-4 offset-lg-1 col-4 col-lg-1 logo" style="height: 60px;"></div>
                    <div class="col-12 col-lg-6">
                        <div class="input-group mt-5 mb-1">
                            <input type="text" class="form-control" aria-label="Text input with dropdown button" id="basic_search_txt">
                            <select class="form-select" style="max-width: 240px;" id="basic_search_select">
                                <option value="0">All Categories</option>
                                <?php
                                require "connection.php";
                                $category_rs = Database::search("SELECT * FROM category");
                                $category_num = $category_rs->num_rows;
                                for ($x = 0; $x < $category_num; $x++) {
                                    $category_data = $category_rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($category_data["id"]); ?>"><?php echo ($category_data["name"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-lg-2 d-grid">
                        <button class="btn btn-primary mt-5 mb-1" onclick="basicSearch(0);">Search</button>
                    </div>
                </div>
            </div>
            <div class="col-12 " id="basicSearchResult">
                <div class="row">
                    <!-- Carousel wrapper -->
                    <div id="carouselVideoExample" data-mdb-carousel-init class="carousel slide carousel-fade" data-mdb-ride="carousel">
                        <!-- Indicators -->
                        <div class="carousel-indicators">
                            <button data-mdb-button-init type="button" data-mdb-target="#carouselVideoExample" data-mdb-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button data-mdb-button-init type="button" data-mdb-target="#carouselVideoExample" data-mdb-slide-to="1" aria-label="Slide 2"></button>
                            <button data-mdb-button-init type="button" data-mdb-target="#carouselVideoExample" data-mdb-slide-to="2" aria-label="Slide 3"></button>
                        </div>

                        <!-- Inner -->
                        <div class="carousel-inner">
                            <!-- Single item -->
                            <div class="carousel-item active ms-5">
                                <video class="img-fluid" autoplay loop muted>
                                    <source src="resources/backgroung_imges/Blonde woman reading a book - Free Stock Video.MP4" type="video/mp4" />
                                </video>
                                <div class="carousel-caption d-none d-md-block " >
                                    <h5 style="font-family: cursive; font-size: 50px; font-weight: bold;">THE BOOK STACK </h5>
                                    <p style="font-family: cursive; font-size: 30px; font-weight: bold;">
                                    Your Online Book Haven
                                    </p>
                                </div>
                            </div>

           
                        <!-- Inner -->

                        
                    <!-- Carousel wrapper -->

            <hr style="margin-top: 800px;" />

           
                    <?php
                    $c_rs = Database::search("SELECT * FROM category");
                    $c_num = $c_rs->num_rows;
                    for ($y = 0; $y < $c_num; $y++) {
                        $cdata = $c_rs->fetch_assoc();
                    ?>

                        <!-- category name -->
                        <div class="col-12  mb-3 ms-5 ">
                            <a href="#" class="text-decoration-none link-custom fs-4 fw-bold" ><?php echo ($cdata["name"]); ?></a> &nbsp; &nbsp;
                            <a href="#" class="text-decoration-none link-custom fs-6 fw-bold">See All &nbsp; &rarr;</a>
                        </div>
                        <!-- category name -->

                        <!-- products -->
                        <div class="col-12  " >
                            <div class="row mt-5"  >
                                <div class="col-12 ">
                                    <div class="row justify-content-center  gap-2" >
                                        <?php
                                        $product_rs = Database::search("SELECT * FROM product WHERE category_id='" . $cdata["id"] . "' ORDER BY datetime_added DESC LIMIT 4 OFFSET 0 ");
                                        $product_num = $product_rs->num_rows;
                                        for ($z = 0; $z < $product_num; $z++) {
                                            $product_data = $product_rs->fetch_assoc();
                                        ?>
                                            <div class="card col-6 col-lg-2 mt-5 mb-2 product-card" style="width: 18rem; margin-top: 50px;">
                                                <?php
                                                $image_rs = Database::search("SELECT * FROM images WHERE product_id='" . $product_data["id"] . "' ");
                                                $image_data = $image_rs->fetch_assoc();
                                                ?>
                                                <img src="<?php echo ($image_data["code"]); ?>" class="card-img-top img-thumbnail mt-2 product-img" style="height: 180px;" />
                                                <div class="card-body text-center">
                                                    <h5 class="card-title fs-10 fw-bold"><?php echo ($product_data["title"]); ?> <br /> <span class="badge bg-info">New</span></h5>
                                                    <span class="card-text text-primary fs-5 fw-bold">Rs. <?php echo ($product_data["price"]); ?> .00</span> <br />
                                                    <?php
                                                    if ($product_data["qty"] > 0) {
                                                    ?>
                                                        <span class="card-text text-success fw-bold">In Stock</span> <br />
                                                        <span class="card-text text-danger fw-bold"><?php echo ($product_data["qty"]); ?> Items Available</span> <br /><br /><br />
                                                        <a href='<?php echo ("singleProductView.php?id=" . $product_data["id"]); ?>' class="col-12 btn btn-warning">Buy Now</a>
                                                        <button class="col-12 btn btn-info mt-2" onclick="addToCart(<?php echo ($product_data['id']); ?>);">Add to Cart</button>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <span class="card-text text-danger fw-bold">Out of Stock</span> <br />
                                                        <span class="card-text text-danger fw-bold">0 Items Available</span> <br /><br /><br />
                                                        <button class="col-12 btn btn-custom disabled">Buy Now</button>
                                                        <button class="col-12 btn btn-custom-secondary mt-2 disabled">Add to Cart</button>
                                                        <?php
                                                    }
                                                    if (isset($_SESSION["cust"])) {
                                                        $watchlist_rs = Database::search("SELECT * FROM watchlist WHERE product_id='" . $product_data["id"] . "' AND user_email='" . $_SESSION["cust"]["email"] . "'");
                                                        $watchlist_num = $watchlist_rs->num_rows;
                                                        if ($watchlist_num == 1) {
                                                        ?>
                                                            <button class="col-12 btn btn-outline-light mt-2 border border-info" onclick='addToWatchlist(<?php echo ($product_data["id"]); ?>);'>
                                                                <i class="bi bi-heart-fill text-danger fs-5" id='heart<?php echo ($product_data["id"]); ?>'></i>
                                                            </button>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <button class="col-12 btn btn-outline-light mt-2 border border-info" onclick='addToWatchlist(<?php echo ($product_data["id"]); ?>);'>
                                                                <i class="bi bi-heart-fill text-dark fs-5" id='heart<?php echo ($product_data["id"]); ?>'></i>
                                                            </button>
                                                        <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <a href="index.php" class="col-12 btn btn-success">
                                                            <i class="bi bi-heart-fill text-dark fs-5"></i>
                                                        </a>
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
                        <!-- products -->
                    <?php
                    }
                    ?>
                </div>
            </div>

            <!-- modalCart -->
            <div class="modal" tabindex="-1" id="viewCart" style="margin-top: 250px;">
            </div>
            <!-- modalCart -->

            <!-- modalWatchlist -->
            <div class="modal" tabindex="-1" id="viewWatchlist" style="margin-top: 250px;">
            </div>
            <!-- modalWatchlist -->

            <?php include "footer.php"; ?>
        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>