<?php
    include "../connect/connect.php";
    $sql = "CREATE TABLE myTip (";
    $sql .= "myTipID int(10) unsigned NOT NULL auto_increment,";
    $sql .= "myMemberID int(10) unsigned NOT NULL,";
    $sql .= "tipName varchar(30) NOT NULL,";
    $sql .= "tipMsg varchar(255) NOT NULL,";
    $sql .= "tipPass varchar(10) NOT NULL,";
    $sql .= "tipDelete int(10) NOT NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY (myTipID)";
    $sql .= ")charset=utf8;";
    $connect -> query($sql);
?>