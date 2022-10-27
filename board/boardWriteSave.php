<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $boardTitle = $_POST['boardTitle'];
    $boardContents = $_POST['boardContents'];
    $boardTitle = $connect -> real_escape_string($boardTitle);
    $boardContents = $connect -> real_escape_string($boardContents);
    $boardView = 1;
    $boardLike = 0;
    $regTime = time();
    $myMemberID = $_SESSION['myMemberID'];      //회원가입한 사람만 쓸 수 있도록
    
    $sql = "INSERT INTO myBoard(myMemberID, boardTitle, boardContents, boardView, boardLike, regTime) VALUES('$myMemberID','$boardTitle', '$boardContents', '$boardView', '$boardLike', '$regTime')";
    $connect -> query($sql);
?>
<script>
    location.href = "board.php";
</script>