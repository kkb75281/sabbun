<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 수정 완료 페이지</title>
</head>
<body>
    
<?php


    $myBoardID = $_POST['myBoardID'];
    $boardTitle = $_POST['boardTitle'];
    $boardContents = $_POST['boardContents'];
    $youPass = $_POST['youPass'];
    $myMemberID = $_SESSION['myMemberID'];

    $boardTitle = $connect -> real_escape_string($boardTitle);
    $boardContents = $connect -> real_escape_string($boardContents);


    
    
    $sql = "SELECT myMemberID FROM myBoard WHERE myBoardID = {$myBoardID}";
    $result2 = $connect -> query($sql);
    $myBoardMember = $result2 -> fetch_array(MYSQLI_ASSOC);




    $sql = "SELECT youPass, myMemberID FROM myBMember WHERE myMemberID = {$myMemberID}";
    $result = $connect -> query($sql);
    $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);

    if($memberInfo['youPass'] === $youPass && $memberInfo['myMemberID'] === $myMemberID && $myBoardMember['myMemberID'] === $myMemberID ){
        $sql = "UPDATE myBoard SET boardTitle = '{$boardTitle}', boardContents = '{$boardContents}' WHERE myBoardID = '{$myBoardID}'";
        $connect -> query($sql);
    } else {
        echo "<script>alert('내가 작성한 글이 아니거나 비밀번호가 일치하지 않습니다. 다시 한번 확인해주세요!')</script>";
    }
?>
<script>
    location.href = "board.php";
</script>

</body>
</html>