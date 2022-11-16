<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $myMemberID = $_SESSION['myMemberID'];
    $myPageSql = "SELECT * FROM myBMember WHERE myMemberID = {$myMemberID}";
    $myPageResult = $connect -> query($myPageSql);
    $myPageInfo = $myPageResult -> fetch_array(MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>마이페이지</title>

    <link rel="stylesheet" href="../html/assets/css/fonts.css">
    <link rel="stylesheet" href="../html/assets/css/common.css">
    <link rel="stylesheet" href="../html/assets/css/reset.css">
    <link rel="stylesheet" href="../html/assets/css/header.css">
    <link rel="stylesheet" href="../html/assets/css/myPage.css">
    <link rel="stylesheet" href="../html/assets/css/footer.css">

    <style>
        
    </style>
</head>
<body>
    <?php include "../include/header.php" ?>
    <!-- // header -->

    <main id="main" class="main container nanum">
        <div id="myPage__inner" class="myPage__inner">
            <section id="contents">
                <div class="list__like">
                    <div class="card">
                        <a href="/">
                            <img src="../html/assets/img/store1.jpg" alt="게시글1">
                            <p>미미도넛</p>
                            <span></span>
                        </a>
                    </div>
                    <div class="card">
                        <a href="/">
                            <img src="../html/assets/img/store2.jpg" alt="게시글2">
                            <p>오브젝트</p>
                            <span></span>
                        </a>
                    </div>
                    <div class="card">
                        <a href="/">
                            <img src="../html/assets/img/store3.jpg" alt="게시글3">
                            <p>메이드모먼</p>
                            <span></span>
                        </a>
                    </div>
                    <div class="card">
                        <a href="/">
                            <img src="../html/assets/img/store4.jpg" alt="게시글4">
                            <p>잼머의 집</p>
                            <span></span>
                        </a>
                    </div>
                    <div class="card">
                        <a href="/">
                            <img src="../html/assets/img/store5.jpg" alt="게시글5">
                            <p>어푸어푸</p>
                            <span></span>
                        </a>
                    </div>
                    <div class="card">
                        <a href="/">
                            <img src="../html/assets/img/store6.jpg" alt="게시글6">
                            <p>오월상점</p>
                            <span></span>
                        </a>
                    </div>
                </div>
            </section>
            <section id="aside">
                <div class="myInfo">
                    <img src="../html/assets/img/board__icon.svg" alt="">
                    <h3><a href="myPage.html">권규비</a> 님</h3>
                </div>
                <div class="goMenu">
                    <h3>마이페이지</h3>
                    <ul>
                        <li><a href="myPage.php">회원 정보 수정</a></li>
                        <li><a href="myPageBoard.php">게시물</a></li>
                        <li class="active"><a href="myPageLike.php">관심 리스트</a></li>
                    </ul>
                </div>
            </section>
        </div>
    </main>

    <?php include "../include/footer.php" ?>
    <!-- // footer -->

    <script src="../assets/js/custom.js"></script>
</body>
</html>