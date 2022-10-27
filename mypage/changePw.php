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

    <style>
    body {
        height: 100%;
        overflow: hidden;
    }
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
                                    <input type="text" id="youName" name="youName" maxlength="5"
                                        placeholder="<?=$member{'youName'}?>" disabled>
                                </div>
                                <div class="disabled">
                                    <label for="youNickName">닉네임</label>
                                    <input type="text" id="youNickName" name="youNickName"
                                        placeholder="<?=$member{'youNickName'}?>" disabled>
                                </div>
                                <div class="disabled">
                                    <label for="youEmail">이메일</label>
                                    <input type="email" id="youEmail" name="youEmail"
                                        placeholder="<?=$member{'youEmail'}?>" disabled>
                                </div>
                                <div class="overlap">
                                    <label for="">비밀번호</label>
                                    <input  id="" name="" maxlength="20"
                                        placeholder="비밀번호를 적어주세요!" required>
                                    <a class="check" >변경하기</a>
                                    <p class="msg" id="Comment">
                                        <!-- * 비밀번호는 특수기호, 숫자가 필수로 들어가야 합니다. -->
                                    </p>
                                </div>
                                <div>
                                    <label for="C">비밀번호 확인</label>
                                    <input  id="C" name="C" maxlength="20"
                                        placeholder="비밀번호를 한번 더 적어주세요!" required>
                                    <p class="msg" id="CComment">
                                        <!-- * 비밀번호가 일치하지 않습니다. -->
                                    </p>
                                </div>
                                <div>
                                    <label for="youPhone">휴대폰 번호</label>
                                    <input type="text" id="youPhone" name="youPhone" maxlength="15"
                                        placeholder="휴대폰 번호(010-0000-0000)를 적어주세요!" required>
                                    <p class="msg" id="youPhoneComment">
                                        <!-- * 형식이 맞지 않습니다.(010-0000-0000) -->
                                    </p>
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

    <!-- 비밀번호 변경 팝업(휴대폰 번호로 찾기) -->
    <div class="changepw__popup changepw__phone nanum open">
        <div class="changepw__inner">
            <div class="changepw__header">
                <h3>비밀번호 변경하기</h3>
            </div>
            <div class="changepw__contents">
                <img src="../html/assets/img/find_icon@3x.png" alt="비밀번호 변경하기">
                <p>
                    아래 정보를 입력해주세요!
                </p>
                <form name="changePw" action="changePwCheck.php" method="post" onSubmit="return pwCheck()">
                    <fieldset>
                        <legend>비밀번호 변경 입력폼</legend>
                        <div>
                            <label for="youPhone" class="ir">변경할 비밀번호</label>
                            <input type="password" name="youPass" id="youPass" placeholder="변경할 비밀번호를 입력해주세요!"
                                class="input__style" required>
                                <p class="msg" id="youPassComment">
                        </div>
                        <div>
                            <label for="youPhone" class="ir">변경 비밀번호 확인</label>
                            <input type="password" name="youPassC" id="youPassC" placeholder="변경할 비밀번호를 한번 더 입력해주세요!"
                                class="input__style" required>
                            <p class="msg" id="youPassCComment">
                        </div>
                        <button type="submit" class="btn input_phone">입력</button>
                    </fieldset>
                </form>
            </div>
            <button type="button" class="btn_close cb2"><span>닫기</span></button>
        </div>
    </div>

    <script src="../assets/js/custom.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
    const changePw = document.querySelector(".changepw__popup");
    const findidClose2 = document.querySelector(".changepw__popup .cb2");

    findidClose2.addEventListener("click", () => {
        changePw.classList.remove("open");
        location.replace("myPageSetting.php");
    });

    function pwCheck() {
        //비밀번호 공백 검사
        if ($("#youPass").val() == "") {
            $("#youPassComment").text("비밀번호를 입력해주세요!");
            return false;
        }
        //비밀번호 유효성 검사
        let getYouPass = $("#youPass").val(); 
        let getYouPassNum = getYouPass.search(/[0-9]/g);
        let getYouPassEng = getYouPass.search(/[a-z]/ig);
        let getYouPassSpe = getYouPass.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/ig);
        if (getYouPass.length < 8 || getYouPass < 20) {
            $("#youPassComment").text("8~20자리 이내로 입력해주세요~");
            return false;
        } else if (getYouPass.search(/\s/) != -1) {
            $("#youPassComment").text("비밀번호는 공백없이 입력해주세요!");
            return false;
        } else if (getYouPassNum < 0 || getYouPassEng < 0 || getYouPassSpe < 0) {
            $("#youPassComment").text("영문, 숫자, 특수문자를 혼합하여 입력해주세요!");
            return false;
        }
        //확인 비밀번호 공백 검사
        if ($("#youPassC").val() == "") {
            $("#youPassCComment").text("확인 비밀번호를 입력해주세요!");
            return false;
        }
        //비밀번호 동일한지 체크
        if ($("#youPass").val() !== $("#youPassC").val()) {
            $("#youPassCComment").text("비밀번호가 동일하지 않습니다.");
            return false;
        }
    }
    </script>
</body>

</html>