<?php

session_start();
require "connection.php";

$email = $_SESSION["sell"]["email"];

$category = $_POST["ca"];
$brand = $_POST["b"];
$model = $_POST["m"];
$title = $_POST["t"];
$qty = $_POST["qty"];
$cost = $_POST["cost"];
$dwc = $_POST["dwc"];
$doc = $_POST["doc"];
$desc = $_POST["desc"];


if ($category == "0") {
    echo ("Please select a Category");
} else if ($brand == "0") {
    echo ("Please select a Author");
} else if ($model == "0") {
    echo ("Please select a Language");
} else if (empty($title)) {
    echo ("Please enter a Title");
} else if (strlen($title <= 100)) {
    echo ("Title should have lower than 100 characters");
} else if (empty($cost)) {
    echo ("Please enter the Cost.");
} else if (!is_numeric($cost)) {
    echo ("invalid input for Cost");
} else if (empty($dwc)) {
    echo ("Please enter the delivery fee for Colombo.");
} else if (!is_numeric($dwc)) {
    echo ("invalid input for delivery cost inside Colombo.");
} else if (empty($doc)) {
    echo ("Please enter the delivery fee for out of Colombo.");
} else if (!is_numeric($doc)) {
    echo ("invalid input for delivery cost out of Colombo.");
} else if (empty($desc)) {
    echo ("Please enter the Description.");
} else {

    $bhm_rs = Database::search("SELECT * FROM `brand_has_model` WHERE `brand_id`='" . $brand . "' AND `model_id`='" . $model . "' ");

    $brand_has_model_id;
    if ($bhm_rs->num_rows == 1) {

        $bhm_data = $bhm_rs->fetch_assoc();
        $brand_has_model_id = $bhm_data["id"];
    } else {

        Database::iud("INSERT INTO `brand_has_model`(`brand_id`,`model_id`) VALUES ('" . $brand . "','" . $model . "') ");
        $brand_has_model_id = Database::$connection->insert_id;
    }

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    
    Database::iud("INSERT INTO `product`(`category_id`,`brand_has_model_id`,`price`,`qty`,`title`,
    `user_email`,`datetime_added`,`delivery_fee_colombo`,`delivery_fee_other`,`description`) VALUES
    ('" . $category . "','" . $brand_has_model_id . "','" . $cost . "','" . $qty . "','" . $title . "',
   '"  . $email . "','" . $date . "','" . $dwc . "','" . $doc . "','" . $desc . "') ");

     
    $product_id = Database::$connection->insert_id;

    $length = sizeof($_FILES);

    if ($length <= 3 && $length > 0) {

        $allowed_img_extentions = array ("image/jpg", "image/jpeg", "image/png", "image/svg+xml");

        for ($x = 0; $x < $length; $x++) {
            if (isset($_FILES["image".$x])) {

                $img_file = $_FILES["image".$x];
                $file_extention = $img_file["type"];

                if (in_array($file_extention,$allowed_img_extentions)) {

                   $new_img_extention;

                    if ($file_extention == "image/jpg") {
                        $new_img_extention = ".jpg";
                    } else if ($file_extention == "image/jpeg") {
                        $new_img_extention = ".jpeg";
                    } else if ($file_extention == "image/png") {
                        $new_img_extention = ".png";
                    } else if ($file_extention == "image/svg+xml") {
                        $new_img_extention = ".svg";
                    }

                    $file_name = "resources//sellerbooks//".$title."_".$x."_".uniqid().$new_img_extention;
                    move_uploaded_file($img_file["tmp_name"], $file_name);

                    Database::iud("INSERT INTO `images` (`code`,`product_id`) VALUES ('" . $file_name . "','" . $product_id . "')");
                } else {
                    echo ("Invalid image  Type");
                }
            }
        }

        echo ("Product image saved successfully");
    } else {
        echo ("Invalid image count");
    }
}

?>