<?php

require "connection.php";

if(isset($_GET["id"])){

    $hid = $_GET["id"];
    Database::iud("DELETE FROM `uploadhostels` WHERE `uploadHostels_id`='".$hid."'");

    echo("Success");

}else{
    echo("Somthing went wrong");
}

?>