<?php
    header('Content-Type: application/json');

    $objConnect = mysqli_connect("localhost","root", "", "testmaps");

    $strSQL = "SELECT * FROM maps";

    $objQuery = mysqli_query($objConnect, $strSQL);

    $resultArray = array();

    while($obResult = mysqli_fetch_assoc($objQuery))
    {
        array_push($resultArray, $obResult);
    }

    echo json_encode($resultArray);
?>