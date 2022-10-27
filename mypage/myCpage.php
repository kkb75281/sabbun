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
    <link rel="stylesheet" href="../html/assets/css/myPage2.css">
    <link rel="stylesheet" href="../html/assets/css/footer.css">

    <style>
        
    </style>
</head>
<body>
    <?php include "../include/header.php" ?>
    <!-- // header -->

    <main id="main">
        <section id="myPage" class="nanum container">
            <div class="myPage__header">
                <div class="right">
                    <img src="../html/assets/img/profile/<?=$myPageInfo['blogImgFile']?>" alt="">
                    <h2><?=$myPageInfo['youName']?> 님</h2>
                    <a href="myPageSetting.php"></a>
                </div>
                <div class="left">
                    <span>회원 구분</span>
                    <p>손님</p>
                </div>
            </div>
            <div class="myPage__contents">
                <ul>
                    <li class="active"><a href="#">게시물</a></li>
                    <li><a href="#">관심스토어</a></li>
                </ul>
                <div class="list">
                    <div class="card">
                        <img src="../html/assets/img/cardSlider__bg02.jpg" alt="게시글1">
                        <a href="#"></a>
                    </div>
                    <div class="card">
                        <img src="../html/assets/img/cardSlider__bg02.jpg" alt="게시글2">
                        <a href="#"></a>
                    </div>
                    <div class="card">
                        <img src="../html/assets/img/cardSlider__bg02.jpg" alt="게시글3">
                        <a href="#"></a>
                    </div>
                    <div class="card">
                        <img src="../html/assets/img/cardSlider__bg02.jpg" alt="게시글4">
                        <a href="#"></a>
                    </div>
                    <div class="card">
                        <img src="../html/assets/img/cardSlider__bg02.jpg" alt="게시글5">
                        <a href="#"></a>
                    </div>
                    <div class="card">
                        <img src="../html/assets/img/cardSlider__bg02.jpg" alt="게시글6">
                        <a href="#"></a>
                    </div>

                    </div>
                </div>
            </div>        
        </section>

    </main>

    <?php include "../include/footer.php" ?>
    <!-- // footer -->

    <script src="../assets/js/custom.js"></script>
</body>
</html>