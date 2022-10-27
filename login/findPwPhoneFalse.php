<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인 페이지</title>
    <link rel="stylesheet" href="../html/assets/css/fonts.css">
    <link rel="stylesheet" href="../html/assets/css/common.css">
    <link rel="stylesheet" href="../html/assets/css/reset.css">
    <link rel="stylesheet" href="../html/assets/css/header.css">
    <link rel="stylesheet" href="../html/assets/css/login.css">
    <link rel="stylesheet" href="../html/assets/css/find.css">
    <link rel="stylesheet" href="../html/assets/css/footer.css">
</head>
<body>
    <?php include "../include/header.php" ?>
    <!-- // header -->
    <main id="main">
        <section id="login" class="nanum">
            <div class="login__left">
                <div class="login__desc">
                    <h3>사뿐소품과 함께 소품샵을 찾아보세요!</h3>
                    <p>아직도 계정이 없으신가요?<br>가입하고 더 많은 기능을 누려보세요 :)</p>
                    <a href="../join/join1.php">가입하러 가기 ></a>
                </div>
                <div class="imgs" aria-label="hidden">
                    <div class="i1"></div>
                    <div class="i2">
                        <img src="../html/assets/img/login_icon1.svg" alt="이미지1">
                    </div>
                    <div class="i3">
                        <img src="../html/assets/img/login_icon2.svg" alt="이미지2">
                    </div>
                    <div class="i4">
                        <img src="../html/assets/img/login_icon3.svg" alt="이미지3">
                    </div>
                    <div class="i5">
                        <img src="../html/assets/img/login_icon4.svg" alt="이미지4">
                    </div>
                </div>
            </div>
            <div class="login__inner">
                <div class="login__contents">
                    <form name="login" action="" method="post">
                        <fieldset>
                            <legend>로그인 입력폼</legend>
                            <div>
                                <label for="youEmail">이메일</label>
                                <input type="email" name="youEmail" id="youEmail" placeholder="이메일" class="input__style" required>
                            </div>
                            <div>
                                <label for="youPass">비밀번호</label>
                                <input type="password" name="youPass" id="youPass" placeholder="비밀번호" class="input__style" required>
                            </div>
                            <button type="submit" class="input__button">로그인</button>
                            <div class="sub__input">
                                <button type="submit" class="input__button2">
                                    <img class="kakaoBtn" src="../html/assets/img/kakao.svg" alt="카카오톡 로그인">
                                </button>
                                <button type="submit" class="input__button2">
                                    <img class="googleBtn" src="../html/assets/img/google.svg" alt="구글 로그인">
                                </button>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="login__footer">
                    <div class="btn">
                        <a class="btnJoin" href="../join/join1.php">회원가입</a>
                        <a class="findId" href="../login/findId.php">아이디 찾기</a>
                        <a class="findPw" href="../login/findPw.php">비밀번호 찾기</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- // login -->
    </main>
    <?php include "../include/footer.php" ?>
    <!-- // footer -->
    <!-- 비밀번호 찾기 에러 팝업 -->
    <div class="findpw__popup findpw__error nanum open">
        <div class="findpw__inner">
            <div class="findpw__header">
                <h3>비밀번호 찾기 실패</h3>
            </div>
            <div class="findpw__contents">
                <img src="../html/assets/img/error_icon@3x.png" alt="비밀번호 찾기 실패">
                <p>
                    등록된 회원정보를 찾을 수 없습니다.<br>
                    계정이 없으시다면<br>
                    회원가입을 진행해주세요!
                </p>
            </div>
            <div class="findpw__footer">
                <button type="button" class="btn btn_againPw ac"><a href="findPwPhone.php">다시 입력하기</a></button>
                <div class="ac"><a href="../join/join1.php">회원가입</a></div>
            </div>
            <button type="button" class="btn_close cb8"><span>닫기</span></button>
        </div>
    </div>


 
</body>
<script>
    const findidPhone = document.querySelector(".findpw__popup");
    const findidClose2 = document.querySelector(".cb8");
    
    findidClose2.addEventListener("click", ()=>{
        findidPhone.classList.remove("open");
        location.replace("login.php");

    });
</script>
</html>