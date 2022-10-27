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
                <div class="prof">
                    <img src="../html/assets/img/profile/<?=$myPageInfo['blogImgFile']?>" alt="">
                    <div class="info">
                        <h2><?=$myPageInfo['youName']?> 님</h2>
                        <ul>
                            <li>손님 회원</li>
                            <li>kkb7528@naver.com</li>
                            <li>010-0000-0000</li>
                        </ul>
                    </div>
                </div>
                <div id="myPageModify" class="myPageModify">
                    <div class="myPage__inner">
                        <form action="myPageModify.php" name="modify" method="post" enctype="multipart/form-data"
                            onsubmit="return modifyChecks()">
                            <fieldset>
                                <legend class="ir">회원정보수정</legend>
                                <div class="modify__box">
                                    <div class="youInfo">
                                        <div class="disabled">
                                            <label for="youName">이름</label>
                                            <input type="text" id="youName" name="youName" maxlength="5"
                                                placeholder="<?=$memberInfo['youName'];?>" disabled>
                                        </div>
                                        <div class="disabled">
                                            <label for="youNickName">닉네임</label>
                                            <input type="text" id="youNickName" name="youNickName"
                                                placeholder="<?=$memberInfo{'youNickName'}?>" disabled>
                                        </div>
                                        <div class="disabled">
                                            <label for="youEmail">이메일</label>
                                            <input type="email" id="youEmail" name="youEmail"
                                                placeholder="<?=$memberInfo{'youEmail'}?>" disabled>
                                        </div>
                                        <div class="overlap">
                                            <label for="youPass">비밀번호</label>
                                            <input type="password" id="youPass" name="youPass" maxlength="20"
                                                placeholder="" required>
                                            <a class="check" href="changePw.php">변경하기</a>
                                            <p class="msg" id="youPassComment">
                                                <!-- * 비밀번호는 특수기호, 숫자가 필수로 들어가야 합니다. -->
                                            </p>
                                        </div>
                                        <div>
                                            <label for="youPassC">비밀번호 확인</label>
                                            <input type="password" id="youPassC" name="youPassC" maxlength="20"
                                                placeholder="" required>
                                            <p class="msg" id="youPassCComment">
                                                <!-- * 비밀번호가 일치하지 않습니다. -->
                                            </p>
                                        </div>
                                        <div>
                                            <label for="youPhone">휴대폰 번호</label>
                                            <input type="text" id="youPhone" name="youPhone" maxlength="15"
                                                placeholder="<?=$memberInfo{'youPhone'}?>"
                                                value="<?=$memberInfo{'youPhone'}?>" required>
                                            <p class="msg" id="youPhoneComment">
                                                <!-- * 형식이 맞지 않습니다.(010-0000-0000) -->
                                            </p>
                                        </div>
                                    </div>
                                    <div class="moreover">
                                        <div class="youImg">
                                            <label for="blogFile">프로필 이미지</label>
                                            <input type="file" name="blogFile" id="blogFile"
                                                accept=".jpg, .jpeg, .png, .gif"
                                                placeholder="jpg, jpeg, png, gif 파일만 넣어주세요!">
                                        </div>
                                        <div class="youGd">
                                            <label for="youGender">성별</label>
                                            <div class="btn men">
                                                <img src="../html/assets/img/boy-dynamic-color@3x.png" alt="남성">
                                                <span>남성</span>
                                            </div>
                                            <div class="btn women">
                                                <img src="../html/assets/img/girl-dynamic-color@3x.png" alt="여성">
                                                <span>여성</span>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="modify__Nbtn" type="submit">수정하기</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </section>
            <section id="aside">
                <div class="goWrite">
                    <p>나만 알고 있는 나만의 팁이 있다면 함께 공유하고 새로운 팁도 얻어가세요 !</p>
                    <a href="myTip.html"></a>
                </div>
                <div class="goMenu">
                    <h3>마이페이지</h3>
                    <ul>
                        <li class="active"><a href="myPage.php">회원 정보 수정</a></li>
                        <li><a href="myPageBoard.php">게시물</a></li>
                        <li><a href="myPageLike.php">관심 리스트</a></li>
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