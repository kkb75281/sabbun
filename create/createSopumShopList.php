<?php 
    include "../connect/connect.php";

    $sql = "CREATE TABLE sopumShopList (";
    $sql .= "shopListID int(10) unsigned NOT NULL auto_increment,";
    $sql .= "myMemberID int(10) unsigned NOT NULL,";
    $sql .= "shopListContents longtext NOT NULL,";
    $sql .= "shopListView int(10) NOT NULL,";
    $sql .= "shopListLike int(10) NOT NULL,";
    $sql .= "regTime int(20) NOT NULL,";

    $sql .= "shopName varchar(100) DEFAULT NULL,";
    $sql .= "shopHours varchar(100) DEFAULT NULL,";
    $sql .= "shopNum varchar(100) DEFAULT NULL,";
    $sql .= "goodsList varchar(100) DEFAULT NULL,";
    $sql .= "shopAdress varchar(100) DEFAULT NULL,";
    
    $sql .= "shopImgFile varchar(100) DEFAULT NULL,";
    $sql .= "shopImgSize varchar(100) DEFAULT NULL,";
    $sql .= "shopTag varchar(100) DEFAULT NULL,";


    
    
    $sql .= "PRIMARY KEY (shopListID)";
    $sql .= ") charset=utf8;";

    $connect -> query($sql);

?>