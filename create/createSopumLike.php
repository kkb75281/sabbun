<?php 
    include "../connect/connect.php";

    $sql = "CREATE TABLE sopumLike (";
    $sql .= "sopumLikeID int(10) unsigned NOT NULL auto_increment,";
    $sql .= "service_code varchar(255) DEFAULT NULL,";
    $sql .= "liked_ip varchar(20) DEFAULT NULL,";
    $sql .= "is_like bit(1) DEFAULT NULL,";
    $sql .= "date datetime NOT NULL,";
    $sql .= "PRIMARY KEY (sopumLikeID)";
    $sql .= ") charset=utf8;";

    $connect -> query($sql);

?>