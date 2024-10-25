<?php

require "connection.php";

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>The Book Stack | Home</title>
    <link rel="icon" href="resources/logo/Beige and Black Vintage Illustrative Bookstore Circle Logo.png" />

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <!-- loder -->
    <div class="loder" id="loder">
        <img src="resources/loading.gif" alt="Loading...">
    </div>
    <!-- loder -->

    <div class="container-fluid">
        <div class="row">

            <?php include "header.php"; ?>

            <div class="col-12 mt-lg-5 pt-lg-5">
                <div class="row mt-lg-2">
                    <div class="col-12 home-box1">
                        <div class="row">
                            <div class="col-12" style="background-color: #151823;opacity: 0.9;">
                                <div class="row pt-lg-5 pb-lg-5 ps-lg-5 pe-lg-2">
                                    <div class="col-12 col-lg-6">
                                        <div class="row animation1" style="padding-top: 5px;">
                                            <span class="fw-bold d-none d-lg-block" style="font-size: 92px;color: #f35444;">WELCOME</span><br />
                                            <span class="fw-bold d-block d-lg-none" style="font-size: 62px;color: #f35444;">WELCOME</span><br />

                                            <span class="fw-bold d-none d-lg-block text-lg-center" style="font-size: 52px;color: #ffffff;margin-top: -30px;">THE BOOK STACK</span>
                                            <span class="fw-bold d-block d-lg-none" style="font-size: 42px;color: #ffffff;margin-top: -30px;">THE BOOK STACK</span>

                                            <span class="fw-bold fs-4 mt-0 mt-lg-2 " style="color: #666666;">The Book Stack Book Shop is a haven for
                                                book lovers, offering a curated selection
                                                of classic and contemporary titles. <br />

                                                <ul class="button-container pt-0 pt-lg-5">
                                                    <button class="text-white header-button1 fs-6 ps-5 pe-5 pt-2 pb-2 sign-in-button" href="contact.php" onclick="customersignupmodel();">Enhancing Customer Convenience with Easy Sign-Up</button>
                                                    <button class="text-white header-button1 fs-6 ps-5 pe-5 pt-2 pb-2 sign-in-button" href="contact.php" onclick="sellersignUpModel();">Empowering Sellers with a Dedicated Sign-Up Portal</button>
                                                </ul>

                                        </div>
                                    </div>

                                    <div class="col-12 mt-4 mt-lg-0 mb-3 col-lg-6 home-rightImageBox d-none d-lg-block animation2" style="background-color: #151823;"></div>
                                    <div class="col-12 mt-4 mt-lg-0 mb-3 col-lg-6 home-rightImageBox d-block d-lg-none animation2" style="background-color: #151823;height: 350px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-5 pt-3 pt-lg-0 mt-lg-1">
                        <div class="row">

                            <div class="col-lg-6 d-none d-lg-block mb-4 position-absolute homeBox2RightBox" id="animation3" style="margin-top: -80px;"></div>

                            <div class="offset-0 offset-lg-6 col-12 col-lg-6 ps-5 pe-5 d-none d-lg-block" id="animation4" style="height: 400px;padding-top: 100px;">
                                <span class="fw-bold" style="color: #222222;font-size: 45px;">The Book Stack Book Shop </span><br />
                                <span class="fw-bold" style="color: #222222;font-size: 45px;"> is a haven for</span>&nbsp;&nbsp;<span class="fw-bold" style="color: #f35444;font-size: 45px;">Book Lovers</span>
                                <p style="color: #666666;font-size: 17px;">"
                                    We offering a curated selection of both classic and contemporary titles. Nestled in a cozy corner of the city, this charming independent bookstore provides a welcoming atmosphere where readers can explore a diverse range of genres, from fiction and non-fiction to poetry and graphic novels. The Book Stack prides itself on fostering a community of avid readers and writers, hosting regular book signings, reading groups, and literary events."</p>
                                <!-- <p class="mt-1" style="color: #ff3737;font-size: 27px;">is a haven for <a href="#" class="text-decoration-none" onclick="signUpModel();">Click Here<i class="bi bi-chevron-double-right fs-5"></i></a></p> -->
                            </div>

                            <div class="offset-0 offset-lg-6 col-12 col-lg-6 ps-2 pe-2 d-block d-md-none d-lg-none mb-5" style="height: 400px;padding-top: 150px;">
                                <span class="fw-bold" style="color: #222222;font-size: 35px;">The Book Stack Book Shop</span><br />
                                <span class="fw-bold" style="color: #222222;font-size: 35px;">is a haven for</span>&nbsp;&nbsp;<span class="fw-bold" style="color: #f35444;font-size: 35px;">Book Lovers</span>
                                <p style="color: #666666;font-size: 17px;">"We offering a curated selection of both classic and contemporary titles. Nestled in a cozy corner of the city, this charming independent bookstore provides a welcoming atmosphere where readers can explore a diverse range of genres, from fiction and non-fiction to poetry and graphic novels. The Book Stack prides itself on fostering a community of avid readers and writers, hosting regular book signings, reading groups, and literary events."</p>
                            </div>

                            <div class="offset-0 offset-lg-6 col-12 col-lg-6 ps-2 pe-2 d-none d-md-block d-lg-none" style="height: 300px;padding-top: 60px;">
                                <span class="fw-bold" style="color: #222222;font-size: 35px;">The Book Stack Book Shop</span><br />
                                <span class="fw-bold" style="color: #222222;font-size: 35px;">is a haven for</span>&nbsp;&nbsp;<span class="fw-bold" style="color: #f35444;font-size: 35px;">Book Lovers</span>
                                <p style="color: #666666;font-size: 17px;">We offering a curated selection of both classic and contemporary titles. Nestled in a cozy corner of the city, this charming independent bookstore provides a welcoming atmosphere where readers can explore a diverse range of genres, from fiction and non-fiction to poetry and graphic novels. The Book Stack prides itself on fostering a community of avid readers and writers, hosting regular book signings, reading groups, and literary events."</p>
                            </div>

                        </div>
                    </div>



                    <div class="col-12 mt-lg-5 pt-lg-5 mb-lg-5">
                        <div class="row mt-3 pt-5">
                            <div class="col-12 text-center">
                                <p class="fw-bold" style="color: #222222;font-size: 60px;">Some of Our Books</p>
                            </div>
                            <div class="col-12 mt-2 mb-2">
                                <div class="row gap-2 gap-lg-4 justify-content-center">
                                    <div class="col-5 col-lg-2 bg-black project1" style="height: 200px;">
                                        <a class="text-white header-button1 p1b fs-6 ps-3 pe-3 pt-2 pb-2 ps-lg-5 pe-lg-5 pt-lg-2 pb-lg-2" onclick="customersignupmodel();">Buy Now</a>
                                    </div>
                                    <div class="col-5 col-lg-2 bg-black project3" style="height: 200px;">
                                        <a class="text-white header-button1 p1b fs-6 ps-3 pe-3 pt-2 pb-2 ps-lg-5 pe-lg-5 pt-lg-2 pb-lg-2" onclick="customersignupmodel();">Buy Now</a>
                                    </div>
                                    <div class="col-5 col-lg-2 bg-black project2" style="height: 200px;">
                                        <a class="text-white header-button1 p1b ps-3 pe-3 pt-2 pb-2 ps-lg-5 pe-lg-5 pt-lg-2 pb-lg-2" onclick="customersignupmodel();">Buy Now</a>
                                    </div>
                                    <div class="col-5 col-lg-2 bg-black project4" style="height: 200px;">
                                        <a class="text-white header-button1 p1b ps-3 pe-3 pt-2 pb-2 ps-lg-5 pe-lg-5 pt-lg-2 pb-lg-2" onclick="customersignupmodel();">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-2 mb-2">
                                <div class="row gap-2 gap-lg-4 justify-content-center">
                                    <div class="col-5 col-lg-2 bg-black project5" style="height: 200px;">
                                        <a class="text-white header-button1 p1b fs-6 ps-3 pe-3 pt-2 pb-2 ps-lg-5 pe-lg-5 pt-lg-2 pb-lg-2" onclick="customersignupmodel();">Buy Now</a>
                                    </div>
                                    <div class="col-5 col-lg-2 bg-black project6" style="height: 200px;">
                                        <a class="text-white header-button1 p1b fs-6 ps-3 pe-3 pt-2 pb-2 ps-lg-5 pe-lg-5 pt-lg-2 pb-lg-2" onclick="customersignupmodel();">Buy Now</a>
                                    </div>
                                    <div class="col-5 col-lg-2 bg-black project7" style="height: 200px;">
                                        <a class="text-white header-button1 p1b ps-3 pe-3 pt-2 pb-2 ps-lg-5 pe-lg-5 pt-lg-2 pb-lg-2" onclick="customersignupmodel();">Buy Now</a>
                                    </div>
                                    <div class="col-5 col-lg-2 bg-black project8" style="height: 200px;">
                                        <a class="text-white header-button1 p1b ps-3 pe-3 pt-2 pb-2 ps-lg-5 pe-lg-5 pt-lg-2 pb-lg-2" onclick="customersignupmodel();">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- counter -->
                    <div class="col-12 pt-lg-5 mb-lg-5">
                        <div class="row">
                            <div class="col-12 mt-2 mb-2">
                                <div class="row gap-2 gap-lg-4 justify-content-center counterBox pt-3 pb-3" style="background-color: hsla(227, 25%, 11%, 1);">

                                    <div class="col-5 col-lg-2 text-center p-3" style="height: 200px;background-color: hsla(227, 25%, 11%, 0.3);border-radius: 10px;">
                                        <div class="row">
                                            <div class="col-12 text-white">
                                                <i class="bi bi-file-earmark-bar-graph" style="font-size: 32px;"></i>
                                            </div>
                                            <div class="col-12" style="margin-top: -20px;">
                                                <span class="text-white" id="value1" style="font-size: 72px;"></span><br />
                                                <span class="text-white">Registered Sellers</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-5 col-lg-2 text-center p-3" style="height: 200px;background-color: hsla(227, 25%, 11%, 0.3);border-radius: 10px;">
                                        <div class="row">
                                            <div class="col-12 text-white">
                                                <i class="bi bi-emoji-smile" style="font-size: 32px;"></i>
                                            </div>
                                            <div class="col-12" style="margin-top: -20px;">
                                                <span class="text-white" id="value2" style="font-size: 72px;"></span><br />
                                                <span class="text-white">User Accounts</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-5 col-lg-2 text-center p-3" style="height: 200px;background-color: hsla(227, 25%, 11%, 0.3);border-radius: 10px;">
                                        <div class="row">
                                            <div class="col-12 text-white">
                                                <i class="bi bi-award" style="font-size: 32px;"></i>
                                            </div>
                                            <div class="col-12" style="margin-top: -20px;">
                                                <span class="text-white" id="value3" style="font-size: 72px;"></span><br />
                                                <span class="text-white">Customer Feedbacks</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-5 col-lg-2 text-center p-3" style="height: 200px;background-color: hsla(227, 25%, 11%, 0.3);border-radius: 10px;">
                                        <div class="row">
                                            <div class="col-12 text-white">
                                                <i class="bi bi-calendar-date" style="font-size: 32px;"></i>
                                            </div>
                                            <div class="col-12" style="margin-top: -20px;">
                                                <span class="text-white" id="value4" style="font-size: 72px;"></span><br />
                                                <span class="text-white">Seller Ratings</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- counter -->






                </div>
            </div>

            <?php include "footer.php"; ?>

            <!-- Modal customer signup -->
            <div class="modal fade" id="lm4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Customer Sign up</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="overflow-y: auto;">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="f" />
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="l" />
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" id="e" />
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" id="p" />
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Mobile</label>
                                        <input type="text" class="form-control" id="m" />
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Gender</label>
                                        <select class="form-select" id="g">
                                            <?php

                                            $rs = Database::search("SELECT * FROM `gender`");
                                            $n = $rs->num_rows;

                                            for ($x = 0; $x < $n; $x++) {
                                                $d = $rs->fetch_assoc();

                                            ?>

                                                <option value="<?php echo ($d["id"]); ?>"><?php echo ($d["gender_name"]); ?></option>

                                            <?php

                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-12 d-none mt-lg-3" id="msgdiv">

                                        <div class="alert alert-danger" role="alert" id="alertdive">
                                            <i class="bi bi-x-octagon-fill fs-5" id="msg">

                                            </i>

                                        </div>

                                    </div>
                                    <div class="col-12 col-lg-6 d-grid p-4">
                                        <button type="button" class="btn btn-primary" onclick="customersignUp();">Sign Up</button>
                                    </div>
                                    <div class="col-12 col-lg-6 p-4">
                                        <span class="text-black"><b>Already have an account?</b></span> <br /> <a href="#" onclick="customersigninModel()" class="fs-6">Sign In</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- customer Sign up -->
            <!-- customer Sign in -->
            <!-- Vertically centered modal -->
            <!-- Modal -->
            <div class="modal fade" id="stsign" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Customer Sign In</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="overflow-y: auto;">
                            <div class="col-12">
                                <div class="row">
                                    <?php

                                    $email = "";
                                    $password = "";

                                    if (isset($_COOKIE["email"])) {
                                        $email = $_COOKIE["email"];
                                    }

                                    if (isset($_COOKIE["password"])) {
                                        $password = $_COOKIE["password"];
                                    }

                                    ?>

                                    <div class="col-12">
                                        <span class="text-danger" id="smsg"></span>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" id="semail" value="<?php echo ($email); ?>" />
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" id="spassword" value="<?php echo ($password); ?>" />
                                    </div>
                                    <div class="col-6 mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="srememberme" />
                                            <label class="form-check-label">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="col-6 text-end mt-2">
                                        <a href="#" class="link-primary" onclick="customerforgotPassword();">Forgot Password</a>
                                    </div>
                                    <div class="col-12 col-lg-6 d-grid">
                                        <button class="btn btn-primary" onclick="customersignIn();">Sign In</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- customer Sign in -->
            <!-- modal -->

            <div class="modal" tabindex="-1" id="customerforgotPasswordModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Customer Reset Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">

                                <div class="col-6">
                                    <label class="form-label">New Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="npi3">
                                        <button class="btn btn-outline-secondary" type="button" id="npb3" onclick="customershowPassword();"><i id="e5" class="bi bi-eye-slash-fill"></i></button>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Re-Type Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="rtpi3">
                                        <button class="btn btn-outline-secondary" type="button" id="rtpb3" onclick="customerreTypePasswordShow();"><i id="e6" class="bi bi-eye-slash-fill"></i></button>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Verification Code</label>
                                    <input type="text" class="form-control" id="vc3" />
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="customerresetpw();">Reset Password</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal -->
            <!-- Seller Sign up -->
            <!-- Vertically centered modal -->
            <!-- Modal -->
            <div class="modal fade" id="lm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Seller Sign up</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="overflow-y: auto;">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="fn" />
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="ln" />
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" id="en" />
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" id="pn" />
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Mobile</label>
                                        <input type="text" class="form-control" id="mn" />
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Gender</label>
                                        <select class="form-select" id="gn">
                                            <?php

                                            $rs = Database::search("SELECT * FROM `gender`");
                                            $n = $rs->num_rows;

                                            for ($x = 0; $x < $n; $x++) {
                                                $d = $rs->fetch_assoc();

                                            ?>

                                                <option value="<?php echo ($d["id"]); ?>"><?php echo ($d["gender_name"]); ?></option>

                                            <?php

                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-12 d-none mt-lg-3" id="msgdivs">

                                        <div class="alert alert-danger" role="alert" id="alertdives">
                                            <i class="bi bi-x-octagon-fill fs-5" id="msgs">

                                            </i>

                                        </div>

                                    </div>
                                    <div class="col-12 col-lg-6 d-grid p-4">
                                        <button type="button" class="btn btn-primary" onclick="sellersignUp();">Sign Up</button>
                                    </div>
                                    <div class="col-12 col-lg-6 p-4">
                                        <span class="text-black"><b>Already have an account?</b></span> <br /> <a href="#" onclick="sellersigninModel();" class="fs-6">Sign In</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- seller Sign up -->

            <!-- seller Sign in -->
            <!-- Vertically centered modal -->
            <!-- Modal -->
            <div class="modal fade" id="lm2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Seller Sign In</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="overflow-y: auto;">
                            <div class="col-12">
                                <div class="row">
                                    <?php

                                    $email = "";
                                    $password = "";

                                    if (isset($_COOKIE["email"])) {
                                        $email = $_COOKIE["email"];
                                    }

                                    if (isset($_COOKIE["password"])) {
                                        $password = $_COOKIE["password"];
                                    }

                                    ?>

                                    <div class="col-12">
                                        <span class="text-danger" id="msg2"></span>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email2" value="<?php echo ($email); ?>" />
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password2" value="<?php echo ($password); ?>" />
                                    </div>
                                    <div class="col-6 mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="rememberme" />
                                            <label class="form-check-label">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="col-6 text-end mt-2">
                                        <a href="#" class="link-primary" onclick="sellerforgotPassword();">Forgot Password</a>
                                    </div>
                                    <div class="col-12 col-lg-6 d-grid">
                                        <button class="btn btn-primary" onclick="sellersignIn();">Sign In</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- seller Sign in -->

            <!-- modal -->

            <div class="modal" tabindex="-1" id="sellerforgotPasswordModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Reset Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">

                                <div class="col-6">
                                    <label class="form-label">New Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="npi">
                                        <button class="btn btn-outline-secondary" type="button" id="npb" onclick="sellershowPassword();"><i id="e1" class="bi bi-eye-slash-fill"></i></button>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Re-Type Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="rtpi">
                                        <button class="btn btn-outline-secondary" type="button" id="rtpb" onclick="sellerreTypePasswordShow();"><i id="e2" class="bi bi-eye-slash-fill"></i></button>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Verification Code</label>
                                    <input type="text" class="form-control" id="vc" />
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="sellerresetpw();">Reset Password</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal -->

        </div>

        <!-- Admin Sign in -->
        <!-- Vertically centered modal -->
        <!-- Modal -->
        <div class="modal fade" id="lm3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Admin Sign In</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="overflow-y: auto;">
                        <div class="col-12">
                            <div class="row">
                                <?php

                                $email = "";
                                $password = "";

                                if (isset($_COOKIE["email"])) {
                                    $email = $_COOKIE["email"];
                                }

                                if (isset($_COOKIE["password"])) {
                                    $password = $_COOKIE["password"];
                                }

                                ?>

                                <div class="col-12">
                                    <span class="text-danger" id="msg3"></span>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email3" value="<?php echo ($email); ?>" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password3" value="<?php echo ($password); ?>" />
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rememberme2" />
                                        <label class="form-check-label">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-6 text-end mt-2">
                                    <a href="#" class="link-primary" onclick="adminforgotPassword();">Forgot Password</a>
                                </div>
                                <div class="col-12 col-lg-6 d-grid">
                                    <button class="btn btn-primary" onclick="adminsignIn();">Sign In</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Admin Sign in -->
        <!-- modal -->

        <!-- modal -->

        <div class="modal" tabindex="-1" id="adminforgotPasswordModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Admin Reset Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">

                            <div class="col-6">
                                <label class="form-label">New Password</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" id="npi1">
                                    <button class="btn btn-outline-secondary" type="button" id="npb1" onclick="adminshowPassword();"><i id="e3" class="bi bi-eye-slash-fill"></i></button>
                                </div>
                            </div>

                            <div class="col-6">
                                <label class="form-label">Re-Type Password</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" id="rtpi1">
                                    <button class="btn btn-outline-secondary" type="button" id="rtpb1" onclick="adminreTypePasswordShow();"><i id="e4" class="bi bi-eye-slash-fill"></i></button>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Verification Code</label>
                                <input type="text" class="form-control" id="vc1" />
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="adminresetpw();">Reset Password</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal -->

    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>

</body>

</html>