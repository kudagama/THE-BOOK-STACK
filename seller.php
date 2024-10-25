<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product | The Book Stack</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="icon" href="resources/backgroung_imges/Beige and Black Vintage Illustrative Bookstore Circle Logo.png" />
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            background-image: url("resources/backgroung_imges/usgs-eFbxYl9M_lc-unsplash.jpg");
            background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
        }
        
        .custom-header {
            background-color: #343a40;
            color: #ffffff;
            padding: 15px;
            text-align: center;
        }
        
        .custom-card {
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .custom-card-header {
            background-color:  #343a40;
            color: #ced4da;
            padding: 10px;
            border-radius: 10px 10px 0 0;
        }
        
        .custom-card-body {
            padding: 20px;
        }
        
        .custom-card-footer {
            background-color: #808080;
            color: #ffffff;
            padding: 10px;
            border-radius: 0 0 10px 10px;
        }
        
        .custom-input-group {
            margin-bottom: 20px;
        }
        
        .custom-footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 10px;
            text-align: center;
        }
        
        .form-label {
            font-weight: bold;
            font-size: 18px;
        }
        
        .btn-custom {
            background-color: #28a745;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
        }
        
        .btn-custom:hover {
            background-color: #218838;
        }
        
        .custom-select,
        .custom-input {
            border-radius: 5px;
            border: 1px solid #ced4da;
            padding: 10px;
        }
        
        .custom-textarea {
            border-radius: 5px;
            border: 1px solid #ced4da;
            padding: 10px;
            width: 100%;
        }
        
        .custom-image {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        
        .custom-notice {
            font-size: 16px;
            font-weight: bold;
            font-family: cursive;
            color: #dc3545;
            margin-top: 20px;
        }
    </style>
</head>

<body>

   <div class="container ms-0">
   <?php include "loggerHeader.php"; ?>
   </div>

    <div class="container mt-5">
    
        <?php require "connection.php"; ?>

        <?php if (isset($_SESSION["sell"])) { ?>

        <div class="row justify-content-center ">
            <div class="col-12 col-lg-8 mt-5">
                <div class="custom-card mt-5">
                    <div class="custom-card-header text-center">
                        <h2>Add Your Book</h2>
                    </div>
                    <div class="custom-card-body">
                        <div class="row mb-4">
                            <div class="col-12 col-md-6">
                                <label class="form-label">Category</label>
                                <select class="custom-select" id="category" onchange="load_brand();">
                                    <option value="0">Select Category</option>
                                    <?php
                                    $category_rs = Database::search("SELECT * FROM `category`");
                                    $category_num = $category_rs->num_rows;
                                    for ($x = 0; $x < $category_num; $x++) {
                                        $category_data = $category_rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo ($category_data["id"]); ?>"><?php echo ($category_data["name"]); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Author</label>
                                <select class="custom-select" id="Author">
                                    <option value="0">Select Author</option>
                                    <?php
                                    $brand_rs = Database::search("SELECT * FROM `brand`");
                                    $brand_num = $brand_rs->num_rows;
                                    for ($y = 0; $y < $brand_num; $y++) {
                                        $brand_data = $brand_rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo ($brand_data["id"]); ?>"><?php echo ($brand_data["name"]); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12 col-md-6">
                                <label class="form-label">Language</label>
                                <select class="custom-select" id="language">
                                    <option value="0">Select Language</option>
                                    <?php
                                    $model_rs = Database::search("SELECT * FROM `model`");
                                    $model_num = $model_rs->num_rows;
                                    for ($z = 0; $z < $model_num; $z++) {
                                        $model_data = $model_rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo ($model_data["id"]); ?>"><?php echo ($model_data["name"]); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Name of the Book</label>
                                <input type="text" class="custom-input" id="title" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12 col-md-6">
                                <label class="form-label">Cost Per Item</label>
                                <div class="custom-input-group">
                                    <span class="input-group-text">Rs.</span>
                                    <input type="text" class="custom-input" id="cost" />
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Add Product Quantity</label>
                                <input type="number" class="custom-input" value="0" min="0" id="qty" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12 col-md-6">
                                <label class="form-label">Delivery cost Within Colombo</label>
                                <div class="custom-input-group">
                                    <span class="input-group-text">Rs.</span>
                                    <input type="text" class="custom-input" id="dwc" />
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Delivery cost Out of Colombo</label>
                                <div class="custom-input-group">
                                    <span class="input-group-text">Rs.</span>
                                    <input type="text" class="custom-input" id="doc" />
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <label class="form-label">Product Description</label>
                                <textarea class="custom-textarea" rows="5" id="desc"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <label class="form-label">Add Product Images</label>
                                <div class="row">
                                    <div class="col-4">
                                        <img src="resources/booksphotos/ebook.png" class="custom-image" id="i0" />
                                    </div>
                                    <div class="col-4">
                                        <img src="resources/booksphotos/ebook.png" class="custom-image" id="i1" />
                                    </div>
                                    <div class="col-4">
                                        <img src="resources/booksphotos/ebook.png" class="custom-image" id="i2" />
                                    </div>
                                </div>
                                <div class="d-grid mt-3">
                                    <input type="file" class="d-none" id="imageuploader" multiple />
                                    <label for="imageuploader" class="btn btn-secondary" onclick="changeProductImage();">Upload Images</label>
                                </div>
                            </div>
                        </div>
                        <div class="custom-notice">
                            We are taking 15% of the Book price from every product as a VAT and Service Charge.
                        </div>
                    </div>
                    <div class="custom-card-footer text-center ">
                        <button class="btn btn-secondary" onclick="addProduct();">Save Product</button>
                    </div>
                </div>
            </div>
        </div>

       

    </div>
    <?php } else {
            header("Location:home.php");
        } ?>

        <?php include "footer.php" ?>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>
