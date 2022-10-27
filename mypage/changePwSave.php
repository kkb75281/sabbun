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
    <title>마이페이지</title>

    <link rel="stylesheet" href="../html/assets/css/fonts.css">
    <link rel="stylesheet" href="../html/assets/css/common.css">
    <link rel="stylesheet" href="../html/assets/css/reset.css">
    <link rel="stylesheet" href="../html/assets/css/header.css">
    <link rel="stylesheet" href="../html/assets/css/myPage.css">
    <link rel="stylesheet" href="../html/assets/css/footer.css">
    <link rel="stylesheet" href="../html/assets/css/change.css">
    <link rel="stylesheet" href="../html/assets/css/find.css">

    <style>
        
    </style>
</head>
<body>
    <?php include "../include/header.php" ?>
    <!-- // header -->

    <main id="main">
        <section id="myPageModify" class="nanum container">
            <div class="myPageModify__header">
                <h2>회원정보 수정하기</h2>
            </div>
            <div class="myPage__inner">
                <form action="myPageCModify.php" name="modify" method="post" onsubmit="return modifyChecks()">
                    <fieldset>
                        <legend>회원정보수정</legend>
                        <div class="modify__box">
                            <div class="youInfo">
                                <div class="disabled">
                                    <label for="youName">이름</label>
                                    <input type="text" id="youName" name="youName" maxlength="5" placeholder="<?=$member{'youName'}?>" disabled>
                                </div>
                                <div class="disabled">
                                    <label for="youNickName">닉네임</label>
                                    <input type="text" id="youNickName" name="youNickName" placeholder="<?=$member{'youNickName'}?>" disabled>
                                </div>
                                <div class="disabled">
                                    <label for="youEmail">이메일</label>
                                    <input type="email" id="youEmail" name="youEmail" placeholder="<?=$member{'youEmail'}?>" disabled>
                                </div>
                                <div class="overlap">
                                    <label for="youPass">비밀번호</label>
                                    <input type="password" id="youPass" name="youPass" maxlength="20" placeholder="비밀번호를 적어주세요!" required>
                                    <a class="check" href="changePW.php">변경하기</a>
                                    <p class="msg" id="youPassComment"><!-- * 비밀번호는 특수기호, 숫자가 필수로 들어가야 합니다. --></p>
                                </div>
                                <div>
                                    <label for="youPassC">비밀번호 확인</label>
                                    <input type="password" id="youPassC" name="youPassC" maxlength="20" placeholder="비밀번호를 한번 더 적어주세요!" required>
                                    <p class="msg" id="youPassCComment"><!-- * 비밀번호가 일치하지 않습니다. --></p>
                                </div>
                                <div>
                                    <label for="youPhone">휴대폰 번호</label>
                                    <input type="text" id="youPhone" name="youPhone" maxlength="15" placeholder="휴대폰 번호(010-0000-0000)를 적어주세요!" required>
                                    <p class="msg" id="youPhoneComment"><!-- * 형식이 맞지 않습니다.(010-0000-0000) --></p>
                                </div>
                            </div>
                            <div class="moreover">
                                <div>
                                    <label for="youPhoto">프로필 이미지</label>
                                    <input type="text" id="youPhoto" name="youPhoto" placeholder="이미지를 첨부해주세요!">
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
        </section>
    </main>

    <?php include "../include/footer.php" ?>
    <!-- // footer -->

    <!-- 비밀번호 변경 완료 팝업 -->
    <div class="findid__popup findid__success nanum open">
        <div class="findid__inner">
            <div class="findid__header">
                <h3>비밀번호 변경 성공</h3>
            </div>
            <div class="findid__contents">
                <img src="../html/assets/img/success_icon@3x.png" alt="비밀번호 변경 성공">
                <p>
                    비밀번호 변경이 완료되었습니다!
                </p>
            </div>
            <div class="findid__footer">
                <div class="ac"><a href="login.php">로그인 하기</a></div>
            </div>
            <button type="button" class="btn_close cb3"><span>닫기</span></button>
        </div>
    </div>

    <script src="../assets/js/custom.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>
</html>