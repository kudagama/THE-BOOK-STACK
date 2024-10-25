<?php

session_start();

if(isset($_SESSION["sell"])){

    $_SESSION["u"] = null;
    session_destroy();

    echo("Success");

}else if(isset($_SESSION["as"])){

    $_SESSION["as"] = null;
    session_destroy();

    echo("Success");

}else if(isset($_SESSION["cust"])){

    $_SESSION["cust"] = null;
    session_destroy();

    echo("Success");

}

?>