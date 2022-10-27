<?php
include "../connect/connect.php";
include "../connect/session.php";
ob_start();

?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인 세이브</title>
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

                    <a href="join1.html">가입하러 가기 ></a>
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
                    <form name="login" action="loginSave.php" method="post">
                        <fieldset>
                            <legend>로그인 입력폼</legend>
                            <div>
                                <label for="youEmail">이메일</label>
                                <input type="email" name="youEmail" id="youEmail" placeholder="이메일" class="input__style"
                                    required>
                            </div>
                            <div>
                                <label for="youPass">비밀번호</label>
                                <input type="password" name="youPass" id="youPass" placeholder="비밀번호"
                                    class="input__style" required>
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
                        <a class="btnJoin" href="join1.html">회원가입</a>
                        <a class="findId" href="#">아이디 찾기</a>
                        <a class="findPw" href="#">비밀번호 찾기</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- // login -->
    </main>
    <?php include "../include/footer.php" ?>
    <!-- // footer -->
    <!-- 로그인 에러 팝업 -->
    <div class="findid__popup findid__error nanum open">
        <div class="findid__inner">
            <div class="findid__header">
                <h3>로그인 실패</h3>
            </div>
            <div class="findid__contents">
                <img src="../html/assets/img/error_icon@3x.png" alt="로그인 실패">
                <p>
<?php
    $youEmail = $_POST['youEmail'];
    $youPass = $_POST['youPass'];
    // echo $youEmail, $youPass;
    // 정보 ---> 쿠키(하루동안 보지 않기-->쿠키 폴더에 저장) / 세션(서버) / 리덕스(리액트)
    function msg($alert){
        echo "<p class='alert'>{$alert}</p>";}
?>
                </p>
            </div>
            <div class="findid__footer">
                <!-- <button type="button" class="btn btn_login">다시 입력하기</button> -->
                <div class="btn btn_login ac"><a href="../login/login.php">다시 입력하기</a></div>
                <div class="ac"><a href="../join/join1.php">회원가입</a></div>
            </div>
            <button type="button" class="btn_close cb4"><span>닫기</span></button>
        </div>
    </div>

    <script>
        
    const findidPhone = document.querySelector(".findid__popup");
    const findidClose2 = document.querySelector(".cb4");

    findidClose2.addEventListener("click", () => {
        findidPhone.classList.remove("open");
        location.replace("login.php");
    });

    </script>
</body>

</html>

<?php 
    // 이메일 검사
    if( !filter_var($youEmail, FILTER_VALIDATE_EMAIL)){
        msg("이메일이 잘못되었습니다.<br>올바른 이메일을 적어주세요!");
        exit;
    }
    // 비밀번호 검사
    if( $youPass == null || $youPass == ''){
        msg("비밀번호를 입력해주세요!");
        exit;
    }
    // 데이터 가져오기 --> 유효성 검사 --> 데이터 조회 --> 로그인
    $sql = "SELECT myMemberID, youEmail, youName, youPass FROM myBMember WHERE youEmail = '$youEmail' AND youPass = '$youPass'";
    $result = $connect -> query($sql);
    if($result){
        $count = $result -> num_rows;
        if($count == 0){
            msg("이메일 또는 비밀번호가 틀렸습니다!");
            // exit;
        } else {
            $info = $result -> fetch_array(MYSQLI_ASSOC);
            $_SESSION['myMemberID'] = $info['myMemberID'];
            $_SESSION['youEmail'] = $info['youEmail'];
            $_SESSION['youName'] = $info['youName'];
            // echo "<pre>";
            // var_dump($info);
            // echo "</pre>";
            Header("Location: ../main/main.php");
        }
    } else {
        msg("에러발생 - 관리자에게 문의해주세요!");
    }
?>