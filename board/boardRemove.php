<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $myBoardID = $_GET['myBoardID'];
    $myBoardID = $connect -> real_escape_string($myBoardID);
    $myMemberID = $_SESSION['myMemberID'];


    $sql = "SELECT myMemberID FROM myBoard WHERE myBoardID = {$myBoardID}";
    $result2 = $connect -> query($sql);
    $myBoardMember = $result2 -> fetch_array(MYSQLI_ASSOC);


    $sql = "SELECT myMemberID FROM myBMember WHERE myMemberID = {$myMemberID}";
    $result = $connect -> query($sql);
    $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);

    
    if($memberInfo['myMemberID'] === $myMemberID && $myBoardMember['myMemberID'] === $myMemberID ){
        $sql = "DELETE FROM myBoard WHERE myBoardID = {$myBoardID}";
        $connect -> query($sql);
    } else {
        echo "<script>alert('내가 작성한 글이 아닙니다. 다시 한번 확인해주세요!')</script>";
    } 
?>

<script>
    location.href="board.php";
</script>

