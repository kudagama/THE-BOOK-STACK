<?php

require "connection.php";

if (isset($_GET["id"])) {

    $pid = $_GET["id"];

    $product_rs = Database::search("SELECT product.price,product.qty,product.description,product.title,product.datetime_added,
    product.delivery_fee_colombo,product.delivery_fee_other,product.category_id,product.brand_has_model_id,
    product.user_email,
    model.name AS mname,brand.name AS bname FROM `product` INNER JOIN `brand_has_model` ON
    brand_has_model.id=product.brand_has_model_id INNER JOIN `brand` ON brand.id=brand_has_model.brand_id INNER JOIN
    `model` ON model.id=brand_has_model.model_id WHERE product.id='" . $pid . "'");

    $product_num = $product_rs->num_rows;

    if ($product_num == 1) {

        $product_data = $product_rs->fetch_assoc();

?>
 <?php include "loggerHeader.php" ; ?>

        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title><?php echo ($product_data["title"]); ?> | The Book Stack</title>

            <link rel="stylesheet" href="bootstrap.css" />
            <link rel="stylesheet" href="style.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

            <link rel="icon" href="resources/logo/Beige and Black Vintage Illustrative Bookstore Circle Logo.png" />
           
            <style>
                body {
                    background-color: #f8f9fa;
                    font-family: 'Arial', sans-serif;
                   
                }

                .single-product {
                    max-width: 1200px;
                    margin: 20px auto;
                    padding: 20px;
                    background-color: #fff;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    border-radius: 10px;
                    
                }

                .product-images {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 10px;
                }

                .product-images img {
                    width: 100px;
                    height: 100px;
                    object-fit: cover;
                    cursor: pointer;
                    border: 2px solid #ddd;
                    border-radius: 10px;
                    transition: all 0.3s ease;
                }

                .product-images img:hover {
                    border-color: #007bff;
                }

                .main-image {
                    width: 100%;
                    height: 400px;
                    object-fit: cover;
                    border-radius: 10px;
                    margin-bottom: 20px;
                }

                .product-details {
                    display: flex;
                    flex-direction: column;
                    gap: 10px;
                }

                .product-title {
                    font-size: 1.5rem;
                    font-weight: bold;
                    color: #333;
                }

                .product-price {
                    font-size: 1.25rem;
                    color: #28a745;
                    font-weight: bold;
                }

                .product-description {
                    font-size: 1rem;
                    color: #666;
                    margin-top: 20px;
                }

                .product-actions {
                    display: flex;
                    gap: 10px;
                    margin-top: 20px;
                }

                .product-actions button {
                    flex: 1;
                }

                .related-items {
                    margin-top: 40px;
                }

                .related-items h3 {
                    margin-bottom: 20px;
                    font-size: 1.5rem;
                    color: #333;
                }

                .related-items .card {
                    width: 100%;
                    margin-bottom: 20px;
                }

                .feedback-section {
                    margin-top: 40px;
                }

                .feedback-section h3 {
                    margin-bottom: 20px;
                    font-size: 1.5rem;
                    color: #333;
                }

                .feedback {
                    padding: 10px;
                    background-color: #f1f1f1;
                    border-radius: 5px;
                    margin-bottom: 10px;
                }

                .feedback span {
                    display: block;
                }

                .feedback .date {
                    font-size: 0.875rem;
                    color: #999;
                }
            </style>
        </head>
       
        <body   >
            <div class="container mt-5 "  >
            
                <div class="single-product mt-10 " style="margin-top: 150px;">
                    

                    <div class="product-images mt-5">
                        <?php

                        $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "'");
                        $image_num = $image_rs->num_rows;
                        $img = array();

                        if ($image_num != 0) {
                            for ($x = 0; $x < $image_num; $x++) {
                                $image_data = $image_rs->fetch_assoc();
                                $img[$x] = $image_data["code"];
                        ?>

                                <img src="<?php echo ($img[$x]); ?>" class="img-thumbnail" onclick="document.getElementById('main-img').src = '<?php echo ($img[$x]); ?>';" />

                            <?php
                            }
                        } else {
                            ?>

                            <img src="resource/empty.svg" class="img-thumbnail" />
                            <img src="resource/empty.svg" class="img-thumbnail" />
                            <img src="resource/empty.svg" class="img-thumbnail" />

                        <?php
                        }
                        ?>
                    </div>

                    <img src="<?php echo ($image_data["code"]); ?>" class="main-image" id="main-img">

                    

                    <div class="product-details">
                        <h1 class="product-title"><?php echo ($product_data["title"]); ?></h1>
                        <div class="product-price">Rs. <?php echo ($product_data["price"]); ?> .00</div>
                        <div class="product-description"><?php echo ($product_data["description"]); ?></div>
                    </div>

                    <div class="border border-1 border-secondary rounded overflow-hidden 
                                                        float-left mt-1 position-relative product-qty">
                                                                        <div class="col-12">
                                                                            <span>Quantity : </span>
                                                                            <input type="text" class="border-0 fs-5 fw-bold text-start" style="outline: none;"  value="1" 
                                                                            id="qty_input" onkeyup='checkValue(<?php echo ($product_data["qty"]); ?>);' />

                                                                            <div class="position-absolute qty-buttons">
                                                                                <div class="justify-content-center d-flex flex-column align-items-center 
                                                                border border-1 border-secondary qty-inc">
                                                                                    <i class="bi bi-caret-up-fill text-primary fs-5" onclick='qty_inc(<?php echo ($product_data["qty"]); ?>);'></i>
                                                                                </div>
                                                                                <div class="justify-content-center d-flex flex-column align-items-center 
                                                                border border-1 border-secondary qty-dec">
                                                                                    <i class="bi bi-caret-down-fill text-primary fs-5" onclick="qty_dec();"></i>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                    <div class="product-actions">
                        <button class="btn btn-success" id="payhere-payment" onclick="payNow(<?php echo ($pid); ?>);">Buy Now</button>
                        <button class="btn btn-primary" onclick="addToCart(<?php echo ($pid); ?>);">Add To Cart</button>
                        <button class="btn btn-secondary" onclick="addToWatchlist(<?php echo ($pid); ?>);">
                            <i class="bi bi-heart-fill text-danger"></i>
                        </button>
                    </div>

                    <div class="related-items">
                        <h3>Related Items</h3>
                        <div class="row">
                            <?php
                            $p_rs = Database::search("SELECT * FROM `product`  ORDER BY `datetime_added` DESC LIMIT 8 OFFSET 0 ");
                            $p_num = $p_rs->num_rows;

                            for ($x = 0; $x < $p_num; $x++) {
                                $p_data = $p_rs->fetch_assoc();

                                $im_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $p_data["id"] . "'");
                                $im_num = $im_rs->num_rows;
                                $im_data = $im_rs->fetch_assoc();
                            ?>

                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="<?php echo ($im_data["code"]) ?>" class="card-img-top" alt="..." />
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo ($p_data["title"]); ?></h5>
                                            <p class="card-text">Rs. <?php echo ($p_data["price"]); ?> .00</p>
                                            <a href='<?php echo ("singleProductView.php?id=" . $p_data["id"]); ?>' class="btn btn-success">Buy Now</a>
                                            <button class="btn btn-danger mt-2">Add to Cart</button>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            }
                            ?>
                        </div>
                    </div>

                    <div class="feedback-section">
                        <h3>Feedbacks</h3>
                        <div class="feedback">
                            <span class="fw-bold">Ravindu</span>
                            <span>Good Product.</span>
                            <span class="date">2022-11-5 10:30:00</span>
                        </div>
                    </div>
                    
                </div>
               
            </div>
            <?php include "footer.php" ?>
            <script src="bootstrap.bundle.js"></script>
            <script src="script.js"></script>
            <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        </body>

        </html>

<?php

    } else {
        echo ("Sorry for the Inconvenience");
    }
} else {
    echo ("Somthing went wrong");
}

?>
