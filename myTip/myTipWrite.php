<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $myMemberID = $_SESSION['myMemberID'];

    $mySql = "SELECT * FROM myBMember WHERE myMemberID = {$myMemberID}";
    $myResult = $connect -> query($mySql);
    $myInfo = $myResult -> fetch_array(MYSQLI_ASSOC);


    $tipName = $myInfo['youNickName'];
    $tipMsg = $_POST['msg'];
    $rcvSlct = $_POST['rcvSlct'];
    $tipPass =  $myInfo['youPass'];
    $regTime = time();

    $sql = "INSERT INTO myTip(myMemberID, rcvSlct, tipName, tipMsg, tipPass, tipDelete, regTime) VALUES ('$myMemberID', '$rcvSlct', '$tipName', '$tipMsg', '$tipPass', '0','$regTime')";
    $result = $connect -> query($sql);

    echo json_encode(array("info" => $myTipID));
?>