<?php

function LoadDb()
{
    $con = mysqli_connect("localhost", "root", "", "lkrcoin");
    $con->set_charset("utf8");
    return $con;
}

$db = LoadDb();
