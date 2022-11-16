<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
    
    $myTipID = $_GET['myTipID'];
    $myMemberID = $_SESSION['myMemberID'];
    
    $tipSql = "SELECT * FROM myTip WHERE myTipID = {$myTipID}";
    $tipResult = $connect -> query($tipSql);
    $tipInfo = $tipResult -> fetch_array(MYSQLI_ASSOC);

    var_dump($myTipID);
    var_dump($tipInfo);


    if($tipInfo['myMemberID'] == $myMemberID && $myTipID == $tipInfo['myTipID']){
        $sql = "DELETE FROM myTip WHERE myTipID = {$myTipID}";
        $result = $connect -> query($sql);
        echo '<script type="text/javascript">'; 
        echo 'alert("삭제 했습니다.");'; 
        
        echo 'window.location.href = "myTip.php";';
        echo '</script>';
    } else {
        echo '<script type="text/javascript">'; 
        echo 'alert("내가 작성한 글이 아닙니다.");'; 
        echo 'window.location.href = "myTip.php";';
        echo '</script>';
    } 

   

    
     
    //Header("Location: myTip.php");
    //echo json_encode(array("info" => $myTipID));
?>