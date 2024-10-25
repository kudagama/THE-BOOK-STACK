<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile | The Book Stack</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="resources/logo/Beige and Black Vintage Illustrative Bookstore Circle Logo.png" />
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include "loggerHeader.php"; ?>

            <?php
            require "connection.php";
            if (isset($_SESSION["cust"])) {
                $email = $_SESSION["cust"]["email"];

                $details_rs = Database::search("SELECT * FROM `user` INNER JOIN `gender` ON gender.id=user.gender_id WHERE `email`='" . $email . "' ");
                $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $email . "' ");
                $address_rs = Database::search("SELECT * FROM `user_has_address` INNER JOIN `city` ON user_has_address.city_id=city.id INNER JOIN `district` ON city.district_id=district.id INNER JOIN `province` ON district.province_id=province.id WHERE `user_email`='" . $email . "' ");

                $data = $details_rs->fetch_assoc();
                $image_data = $image_rs->fetch_assoc();
                $address_data = $address_rs->fetch_assoc();
            ?>

            <div class="col-12 mt-5 mb-4 ">
                <div class="row g-3">
                    <div class="col-md-3 mt-5">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5 mt-5">
                            <?php if (empty($image_data["path"])) { ?>
                                <img src="resources/profile_img/ebook.png" id="viewImg" class="rounded mt-5" style="width: 130px;" />
                            <?php } else { ?>
                                <img src="<?php echo ($image_data["path"]); ?>" id="viewImg" class="rounded mt-5" style="width: 130px;" />
                            <?php } ?>

                            <span class="fw-bold"><?php echo ($data["fname"]); ?>&nbsp;<?php echo ($data["lname"]); ?></span>
                            <span class="fw-bold text-black-50"><?php echo ($data["email"]); ?></span>

                            <input type="file" class="d-none" id="profileimg" accept="image/*" />
                            <label for="profileimg" class="btn btn-primary mt-5" onclick="changeImage();">Update Profile Image</label>
                        </div>
                    </div>

                    <div class="col-md-9 mt-5 ">
                        <div class="p-3 py-5">
                            <h4 class="fw-bold mb-3 mt-3"> My Profile </h4>

                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" value="<?php echo ($data["fname"]); ?>" id="fname" />
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" value="<?php echo ($data["lname"]); ?>" id="lname" />
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label">Mobile</label>
                                    <input type="text" class="form-control" value="<?php echo ($data["mobile"]); ?>" id="mobile" />
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" value="<?php echo ($data["email"]); ?>" readonly />
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="npi" value="<?php echo ($data["password"]); ?>" readonly>
                                        <span class="input-group-text bg-primary" id="basic-addon2">
                                            <i class="bi bi-eye-slash-fill text-white" onclick="showPassword();" id="e1" style="cursor: pointer;"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label">Registered Date</label>
                                    <input type="text" class="form-control" readonly value="<?php echo ($data["joined_date"]); ?>" />
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Address Line 01</label>
                                    <input type="text" class="form-control" value="<?php echo !empty($address_data["line1"]) ? $address_data["line1"] : ''; ?>" id="line1" />
                                </div>
                                
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Address Line 02</label>
                                        <input type="text" class="form-control" value="<?php echo !empty($address_data["line2"]) ? $address_data["line2"] : ''; ?>" id="line2" />
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label class="form-label">Province</label>
                                        <select class="form-select" id="province">
                                            <option value="0">Select Province</option>
                                            <?php
                                            $province_rs = Database::search("SELECT * FROM `province`");
                                            $province_num = $province_rs->num_rows;
                                            for ($x = 0; $x < $province_num; $x++) {
                                                $province_data = $province_rs->fetch_assoc();
                                                echo "<option value='{$province_data["id"]}'" . (!empty($address_data["province_id"]) && $province_data["id"] == $address_data["province_id"] ? "selected" : "") . ">{$province_data["name"]}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label">District</label>
                                        <select class="form-select" id="district">
                                            <option value="0">Select District</option>
                                            <?php
                                            $district_rs = Database::search("SELECT * FROM `district`");
                                            $district_num = $district_rs->num_rows;
                                            for ($x = 0; $x < $district_num; $x++) {
                                                $district_data = $district_rs->fetch_assoc();
                                                echo "<option value='{$district_data["id"]}'" . (!empty($address_data["district_id"]) && $district_data["id"] == $address_data["district_id"] ? "selected" : "") . ">{$district_data["district_name"]}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label class="form-label">City</label>
                                        <select class="form-select" id="city">
                                            <option value="0">Select City</option>
                                            <?php
                                            $city_rs = Database::search("SELECT * FROM `city`");
                                            $city_num = $city_rs->num_rows;
                                            for ($x = 0; $x < $city_num; $x++) {
                                                $city_data = $city_rs->fetch_assoc();
                                                echo "<option value='{$city_data["id"]}'" . (!empty($address_data["city_id"]) && $city_data["id"] == $address_data["city_id"] ? "selected" : "") . ">{$city_data["city_name"]}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label class="form-label">Postal Code</label>
                                        <input type="text" class="form-control" value="<?php echo !empty($address_data["postal_code"]) ? $address_data["postal_code"] : ''; ?>" id="pcode" />
                                    </div>

                                    <div class="col-12 d-grid mb-3">
                                        <label class="form-label">Gender</label>
                                        <input type="text" class="form-control" readonly value="<?php echo ($data["gender_name"]); ?>" />
                                    </div>

                                    <div class="col-12 d-grid">
                                        <button class="btn btn-primary" onclick="updateProfile();">Update My Profile</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php
            } else {
                header("Location:home.php");
            }
            ?>

            <?php include "footer.php"; ?>
        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>
