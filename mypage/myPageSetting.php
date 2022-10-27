<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
    ob_start();
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
    <?php
    $myMemberID = $_SESSION['myMemberID'];
    $sql = "SELECT myMemberID, youName, youNickName, youEmail, youPass, youPhone, blogImgFile, blogImgSize FROM myBMember WHERE myMemberID = {$myMemberID}";
    $result = $connect -> query($sql);
    $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
?>
    <main id="main">
        <section id="myPageModify" class="nanum container">
            <div class="myPageModify__header">
                <h2>회원정보 수정하기</h2>
            </div>
            <div class="myPage__inner">
                <form action="myPageModify.php" name="modify" method="post" enctype="multipart/form-data" onsubmit="return modifyChecks()">
                    <fieldset>
                        <legend>회원정보수정</legend>
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
                                    <input type="password" id="youPassC" name="youPassC" maxlength="20" placeholder=""
                                        required>
                                    <p class="msg" id="youPassCComment">
                                        <!-- * 비밀번호가 일치하지 않습니다. -->
                                    </p>
                                </div>
                                <div>
                                    <label for="youPhone">휴대폰 번호</label>
                                    <input type="text" id="youPhone" name="youPhone" maxlength="15"
                                        placeholder="<?=$memberInfo{'youPhone'}?>" value="<?=$memberInfo{'youPhone'}?>" required>
                                    
                                    </input>
                                    <p class="msg" id="youPhoneComment">
                                        <!-- * 형식이 맞지 않습니다.(010-0000-0000) -->
                                    </p>
                                </div>
                            </div>
                            <div class="moreover">
                                <div>
                                    <label for="blogFile">프로필 이미지</label>
                                    <input type="file" name="blogFile" id="blogFile" accept=".jpg, .jpeg, .png, .gif" placeholder="jpg, jpeg, png, gif 파일만 넣어주세요!" >
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
    function modifyChecks() {

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

        //휴대폰번호 유효성 검사
        let getYouPhone = RegExp(/01[016789]-[^0][0-9]{2,3}-[0-9]{3,4}/);
        if (!getYouPhone.test($("#youPhone").val())) {
            $("#youPhoneComment").text("휴대폰 번호가 정확하지 않습니다. 올바른 휴대폰번호(000-0000-0000)를 입력해주세요!");
            $("#youPhone").val("");
            return false;
        }

        //휴대폰번호 공백 확인
        if ($("#youPhone").val() == "") {
            $("#youPhoneComment").text("휴대폰번호 (000-0000-0000) 입력해주세요!");
            return false;
        }


    }
    </script>
</body>

</html>