<!DOCTYPE html>
<html lang="en">

<head>
    <title>The Book Stack | Home</title>
    <link rel="icon" href="resources/logo/Beige and Black Vintage Illustrative Bookstore Circle Logo.png" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body style="background-color: #2d334a;opacity: 0.9;">
    <div class="container-fluid">
        <div class="row">

            <?php
            include "loggerHeader.php";
            require "connection.php";
            ?>

            <div class="col-12 mt-5 pt-lg-5">
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <h1 class="text-center mb-4 mt-4 text-white"><b>ADMIN PANEL</b></h1>
                                </div>
                            </div>
                            <div class="col-12 justify-content-center">
                                <div class="row">
                                    <div class="col-6 d-grid">
                                        <button type="button" class="btn btn-secondary btn-lg btn-block" onclick="showDashboard()">Manage Products</button>
                                    </div>
                                    <div class="col-6 d-grid">
                                        <button type="button" class="btn btn-danger btn-lg btn-block" onclick="showManageUsers()">Manage Users</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="manage-users-section" class="col-12 mt-5" style="display:none;">
                <div class="row">
                    <div class="col-12 bg-light text-center">
                        <label class="form-label text-secondary fw-bold fs-1">Manage All Users</label>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="row">
                            <div class="offset-0 offset-lg-3 col-12 col-lg-6 mb-3">
                                <div class="row">
                                    <div class="col-8 col-lg-9">
                                        <input type="text" class="form-control" id="search" onkeyup="cartSearch();"/>
                                    </div>
                                    <div class="col-4 col-lg-3 d-grid">
                                        <button class="btn btn-success "onclick="basicSearch(0);">Search User</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-3 mb-2">
                        <div class="row">
                            <div class="col-2 col-lg-1 bg-secondary py-2 text-end">
                                <span class="fs-4 fw-bold text-white">#</span>
                            </div>
                            <div class="col-2 d-none d-lg-block bg-light py-2">
                                <span class="fs-4 fw-bold">Profile Image</span>
                            </div>
                            <div class="col-4 col-lg-2 bg-secondary py-2">
                                <span class="fs-4 fw-bold text-white">User Name</span>
                            </div>
                            <div class="col-4 col-lg-3 d-lg-block bg-light  py-2">
                                <span class="fs-4 fw-bold ">Email</span>
                            </div>
                            <div class="col-2 d-none d-lg-block bg-secondary py-2">
                                <span class="fs-4 fw-bold text-white">Mobile</span>
                            </div>
                            <div class="col-2 d-none d-lg-block bg-light  py-2">
                                <span class="fs-4 fw-bold">Register Date</span>
                            </div>
                            <div class="col-2 col-lg-1 bg-white"></div>
                        </div>
                    </div>

                    <?php

                    $query = "SELECT * FROM `user`";
                    $pageno;

                    if (isset($_GET["page"])) {
                        $pageno = $_GET["page"];
                    } else {
                        $pageno = 1;
                    }

                    $user_rs = Database::search($query);
                    $user_num = $user_rs->num_rows;

                    $results_per_page = 20;
                    $number_of_pages = ceil($user_num / $results_per_page);

                    $page_results = ($pageno - 1) * $results_per_page;
                    $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                    $selected_num = $selected_rs->num_rows;

                    for ($x = 0; $x < $selected_num; $x++) {
                        $selected_data = $selected_rs->fetch_assoc();
                    ?>
                        <div class="col-12 mb-2">
                            <div class="row">
                                <div class="col-2 col-lg-1 bg-secondary py-2 text-end">
                                    <span class="fs-4 fw-bold text-dark"><?php echo ($x + 1); ?></span>
                                </div>
                                <?php
                                $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $selected_data["email"] . "'");
                                $image_data = $image_rs->fetch_assoc();
                                ?>
                                <div class="col-2 d-none d-lg-block bg-light py-2" onclick="viewMsgModel('<?php echo ($selected_data['email']); ?>');">
                                    <img src="<?php echo ($image_data["path"]); ?>" style="height: 40px;margin-left: 70px;" />
                                </div>
                                <div class="col-4 col-lg-2 bg-secondary py-2" onclick="viewMsgModel('<?php echo ($selected_data['email']); ?>');" style="cursor: pointer;">
                                    <span class="fs-4 fw-bold text-dark"><?php echo ($selected_data["fname"] . " " . $selected_data["lname"]); ?></span>
                                </div>
                                <div class="col-4 col-lg-3 bg-light py-2">
                                    <span class="fs-6 fw-bold me"><?php echo ($selected_data["email"]); ?></span>
                                </div>
                                <div class="col-2 d-none d-lg-block bg-secondary py-2">
                                    <span class="fs-4 fw-bold text-white"><?php echo ($selected_data["mobile"]); ?></span>
                                </div>
                                <div class="col-2 d-none d-lg-block bg-light py-2">
                                    <span class="fs-4 fw-bold"><?php echo ($selected_data["joined_date"]); ?></span>
                                </div>
                                
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
            <div id="dashboard" class="col-12 mt-5 pt-lg-5" style="display: none;">
                <!-- Insert the content from the second HTML file here -->
                <body style="background-color: #74EBD5; background-image: linear-gradient(90deg,#74EBD5 0%,#9FACE6);">
                    <div class="container-fluid">
                        <div class="row mb-5">
                            <div class="col-12 bg-light text-center">
                                <label class="form-label text-secondary fw-bold fs-1">Manage All Products</label>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="row">
                                    <div class="offset-0 offset-lg-3 col-12 col-lg-6 mb-3">
                                        <div class="row">
                                            <div class="col-8 col-lg-8">
                                                <input type="text" class="form-control" id="search" onkeyup="cartSearch();" />
                                            </div>
                                            <div class="col-4 col-lg-4 d-grid">
                                                <button class="btn btn-success "onclick="basicSearch(0);">Search Product</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3 mb-2">
                                <div class="row">
                                    <div class="col-2 col-lg-1 bg-secondary py-2 text-end">
                                        <span class="fs-4 fw-bold text-white">#</span>
                                    </div>
                                    <div class="col-2 d-none d-lg-block bg-light py-2">
                                        <span class="fs-4 fw-bold">Product Image</span>
                                    </div>
                                    <div class="col-4 col-lg-2 bg-secondary py-2">
                                        <span class="fs-4 fw-bold text-white">Title</span>
                                    </div>
                                    <div class="col-4 col-lg-2 d-lg-block bg-light py-2">
                                        <span class="fs-4 fw-bold">Price</span>
                                    </div>
                                    <div class="col-2 d-none d-lg-block bg-secondary py-2">
                                        <span class="fs-4 fw-bold text-white">Quantity</span>
                                    </div>
                                    <div class="col-2 d-none d-lg-block bg-light me-3 py-2">
                                        <span class="fs-4 fw-bold">Register Date</span>
                                    </div>
                                    <div class="col-2 col-lg-1 bg-white"></div>
                                </div>
                            </div>

                            <?php
                            $query = "SELECT * FROM `product`";
                            $pageno;
                            if (isset($_GET["page"])) {
                                $pageno = $_GET["page"];
                            } else {
                                $pageno = 1;
                            }
                            $product_rs = Database::search($query);
                            $product_num = $product_rs->num_rows;
                            $results_per_page = 20;
                            $number_of_pages = ceil($product_num / $results_per_page);
                            $page_results = ($pageno - 1) * $results_per_page;
                            $selected_rs = Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");
                            $selected_num = $selected_rs->num_rows;
                            for ($x = 0; $x < $selected_num; $x++) {
                                $selected_data = $selected_rs->fetch_assoc();
                            ?>
                                <div class="col-12 mb-2">
                                    <div class="row">
                                        <div class="col-2 col-lg-1 bg-secondary py-2 text-end">
                                            <span class="fs-4 fw-bold text-dark"><?php echo ($x + 1); ?></span>
                                        </div>
                                        <?php
                                        $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $selected_data["id"] . "'");
                                        $image_data = $image_rs->fetch_assoc();
                                        ?>
                                        <div class="col-2 d-none d-lg-block bg-light py-2" onclick="viewProductModel('<?php echo ($selected_data['id']); ?>');">
                                            <img src="<?php echo ($image_data["code"]); ?>" style="height: 40px; margin-left: 70px;" />
                                        </div>
                                        <div class="col-4 col-lg-2 bg-secondary py-2">
                                            <span class="fs-4 fw-bold text-dark"><?php echo ($selected_data["title"]); ?></span>
                                        </div>
                                        <div class="col-4 col-lg-2 bg-light py-2">
                                            <span class="fs-5 fw-bold">Rs. <?php echo ($selected_data["price"]); ?> .00</span>
                                        </div>
                                        <div class="col-2 d-none d-lg-block bg-secondary py-2">
                                            <span class="fs-4 fw-bold text-white"><?php echo ($selected_data["qty"]); ?> Items</span>
                                        </div>
                                        <div class="col-2 d-none d-lg-block bg-light py-2">
                                            <span class="fs-4 fw-bold"><?php echo ($selected_data["datetime_added"]); ?></span>
                                        </div>
                                       
                                    </div>
                                </div>

                                <!-- modal 1 -->
                                <div class="modal" tabindex="-1" id="viewProductModel<?php echo ($selected_data['id']); ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title fw-bold text-success"><?php echo ($selected_data["title"]); ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="offset-4 col-4">
                                                    <img src="<?php echo ($image_data["code"]); ?>" class="img-fluid" style="height: 150px;" />
                                                </div>
                                                <div class="col-12">
                                                    <span class="fs-5 fw-bold text-black-50">Price :</span>&nbsp;
                                                    <span class="fs-5">Rs. <?php echo ($selected_data["price"]); ?> .00</span><br />
                                                    <span class="fs-5 fw-bold text-black-50">Quantity :</span>&nbsp;
                                                    <span class="fs-5"><?php echo ($selected_data["qty"]); ?> Product left</span><br />
                                                    <span class="fs-5 fw-bold text-black-50">Seller :</span>&nbsp;
                                                    <span class="fs-5">Ravindu</span><br />
                                                </div>
                                                <div class="col-12 mt-2 overflow-scroll" style="height: 300px;">
                                                    <span class="fs-4 fw-bold text-black-50">Description :</span>&nbsp;
                                                    <span class="fs-6 overflow-scroll"><?php echo ($selected_data["description"]); ?></span><br />
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal 1 -->
                            <?php
                            }
                            ?>
                            <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination pagination-lg justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" href="
                                                <?php if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno - 1);
                                                } ?>" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <?php
                                        for ($x = 1; $x <= $number_of_pages; $x++) {
                                            if ($x == $pageno) {
                                        ?>
                                                <li class="page-item active">
                                                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                                </li>
                                            <?php
                                            } else {
                                            ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                                </li>
                                        <?php
                                            }
                                        }
                                        ?>
                                        <li class="page-item">
                                            <a class="page-link" href="<?php if ($pageno >= $number_of_pages) {
                                                echo ("#");
                                            } else {
                                                echo "?page=" . ($pageno + 1);
                                            } ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </body>
            </div>
            <div id="dashboard" class="col-12 mt-5 pt-lg-5" style="display: none;">
                <!-- Insert the content from the second HTML file here -->
                <body style="background-color: #74EBD5; background-image: linear-gradient(90deg,#74EBD5 0%,#9FACE6);">
                    <div class="container-fluid">
                        <div class="row mb-5">
                            <div class="col-12 bg-light text-center">
                                <label class="form-label text-secondary fw-bold fs-1">Manage All Products</label>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="row">
                                    <div class="offset-0 offset-lg-3 col-12 col-lg-6 mb-3">
                                        <div class="row">
                                            <div class="col-8 col-lg-8">
                                                <input type="text" class="form-control" id="search" onkeyup="cartSearch();"/>
                                            </div>
                                            <div class="col-4 col-lg-4 d-grid">
                                                <button class="btn btn-warning "onclick="basicSearch(0);">Search Product</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3 mb-2">
                                <div class="row">
                                    <div class="col-2 col-lg-1 bg-secondary py-2 text-end">
                                        <span class="fs-4 fw-bold text-white">#</span>
                                    </div>
                                    <div class="col-2 d-none d-lg-block bg-light py-2">
                                        <span class="fs-4 fw-bold">Product Image</span>
                                    </div>
                                    <div class="col-4 col-lg-2 bg-secondary py-2">
                                        <span class="fs-4 fw-bold text-white">Title</span>
                                    </div>
                                    <div class="col-4 col-lg-2 d-lg-block bg-light py-2">
                                        <span class="fs-4 fw-bold">Price</span>
                                    </div>
                                    <div class="col-2 d-none d-lg-block bg-secondary py-2">
                                        <span class="fs-4 fw-bold text-white">Quantity</span>
                                    </div>
                                    <div class="col-2 d-none d-lg-block bg-light py-2">
                                        <span class="fs-4 fw-bold">Register Date</span>
                                    </div>
                                    <div class="col-2 col-lg-1 bg-white"></div>
                                </div>
                            </div>

                            <?php
                            $query = "SELECT * FROM `product`";
                            $pageno;
                            if (isset($_GET["page"])) {
                                $pageno = $_GET["page"];
                            } else {
                                $pageno = 1;
                            }
                            $product_rs = Database::search($query);
                            $product_num = $product_rs->num_rows;
                            $results_per_page = 20;
                            $number_of_pages = ceil($product_num / $results_per_page);
                            $page_results = ($pageno - 1) * $results_per_page;
                            $selected_rs = Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");
                            $selected_num = $selected_rs->num_rows;
                            for ($x = 0; $x < $selected_num; $x++) {
                                $selected_data = $selected_rs->fetch_assoc();
                            ?>
                                <div class="col-12 mb-2">
                                    <div class="row">
                                        <div class="col-2 col-lg-1 bg-secondary py-2 text-end">
                                            <span class="fs-4 fw-bold text-dark"><?php echo ($x + 1); ?></span>
                                        </div>
                                        <?php
                                        $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $selected_data["id"] . "'");
                                        $image_data = $image_rs->fetch_assoc();
                                        ?>
                                        <div class="col-2 d-none d-lg-block bg-light py-2" onclick="viewProductModel('<?php echo ($selected_data['id']); ?>');">
                                            <img src="<?php echo ($image_data["code"]); ?>" style="height: 40px; margin-left: 70px;" />
                                        </div>
                                        <div class="col-4 col-lg-2 bg-secondary py-2">
                                            <span class="fs-4 fw-bold text-dark"><?php echo ($selected_data["title"]); ?></span>
                                        </div>
                                        <div class="col-4 col-lg-2 bg-light py-2">
                                            <span class="fs-5 fw-bold">Rs. <?php echo ($selected_data["price"]); ?> .00</span>
                                        </div>
                                        <div class="col-2 d-none d-lg-block bg-secondary py-2">
                                            <span class="fs-4 fw-bold text-white"><?php echo ($selected_data["qty"]); ?> Items</span>
                                        </div>
                                        <div class="col-2 d-none d-lg-block bg-light py-2">
                                            <span class="fs-4 fw-bold"><?php echo ($selected_data["datetime_added"]); ?></span>
                                        </div>
                                        <div class="col-2 col-lg-1 bg-white py-2 d-grid">
                                            <?php
                                            if ($selected_data["status_id"] == 1) {
                                            ?>
                                                <button class="btn btn-danger" id="ub<?php echo ($selected_data['id']); ?>" onclick="blockProduct('<?php echo ($selected_data['id']); ?>');">Block</button>
                                            <?php
                                            } else {
                                            ?>
                                                <button class="btn btn-success" id="ub<?php echo ($selected_data['id']); ?>" onclick="blockProduct('<?php echo ($selected_data['id']); ?>');">Unblock</button>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- modal 1 -->
                                <div class="modal" tabindex="-1" id="viewProductModel<?php echo ($selected_data['id']); ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title fw-bold text-success"><?php echo ($selected_data["title"]); ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="offset-4 col-4">
                                                    <img src="<?php echo ($image_data["code"]); ?>" class="img-fluid" style="height: 150px;" />
                                                </div>
                                                <div class="col-12">
                                                    <span class="fs-5 fw-bold text-black-50">Price :</span>&nbsp;
                                                    <span class="fs-5">Rs. <?php echo ($selected_data["price"]); ?> .00</span><br />
                                                    <span class="fs-5 fw-bold text-black-50">Quantity :</span>&nbsp;
                                                    <span class="fs-5"><?php echo ($selected_data["qty"]); ?> Product left</span><br />
                                                    <span class="fs-5 fw-bold text-black-50">Seller :</span>&nbsp;
                                                    <span class="fs-5">Ravindu</span><br />
                                                </div>
                                                <div class="col-12 mt-2 overflow-scroll" style="height: 300px;">
                                                    <span class="fs-4 fw-bold text-black-50">Description :</span>&nbsp;
                                                    <span class="fs-6 overflow-scroll"><?php echo ($selected_data["description"]); ?></span><br />
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal 1 -->
                            <?php
                            }
                            ?>
                            <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination pagination-lg justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" href="
                                                <?php if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno - 1);
                                                } ?>" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <?php
                                        for ($x = 1; $x <= $number_of_pages; $x++) {
                                            if ($x == $pageno) {
                                        ?>
                                                <li class="page-item active">
                                                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                                </li>
                                            <?php
                                            } else {
                                            ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                                </li>
                                        <?php
                                            }
                                        }
                                        ?>
                                        <li class="page-item">
                                            <a class="page-link" href="<?php if ($pageno >= $number_of_pages) {
                                                echo ("#");
                                            } else {
                                                echo "?page=" . ($pageno + 1);
                                            } ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </body>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script>
        function showManageUsers() {
            document.getElementById('manage-users-section').style.display = 'block';
            document.getElementById('dashboard').style.display = 'none';
        }
        function showDashboard() {
    document.getElementById('dashboard').style.display = 'block';
    document.getElementById('manage-users-section').style.display = 'none';
   
}
    </script>
</body>

 
     

</html>
