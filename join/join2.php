<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 페이지_2</title>

    <link rel="stylesheet" href="../html/assets/css/fonts.css">
    <link rel="stylesheet" href="../html/assets/css/reset.css">
    <link rel="stylesheet" href="../html/assets/css/common.css">
    <link rel="stylesheet" href="../html/assets/css/join.css">
</head>

<body>
    <header id="header" class="header">
        <div class="logo">
            <img src="../html/assets/img/temp_logo.svg" alt="사뿐소품 로고">
        </div>
    </header>
    <main id="main">
        <section id="join" class="container nanum">
            <div class="join__step active2">
                <em>2</em>/4
            </div>
            <div class="join__desc">
                <h1>
                    <span>안녕하세요.</span><br>
                    사이트 이용 목적이 무엇인가요?
                </h1>
                <p>사뿐소품에서 어떤 회원으로 활동하실지 선택해주세요.</p>
            </div>
            <div class="join__inner">
                <div class="join__btn">
                    <div class="btn boss">
                        <img src="../html/assets/img/join1_icon1@3x.png" alt="사장님 회원">
                        <span>사장님 회원</span>
                    </div>
                    <div class="btn cus">
                        <img src="../html/assets/img/join1_icon2@3x.png" alt="손님 회원">
                        <span>손님 회원</span>
                    </div>
                </div>
                <button class="join__Nbtn" type="submit">다음으로</button>
            </div>
        </section>
    </main>

    <script>
    const bossBtn = document.querySelector(".boss");
    const bossAct = document.querySelector(".boss.active");
    const cusBtn = document.querySelector(".cus");
    const cusAct = document.querySelector(".cus.active");
    const nextBtn = document.querySelector(".join__Nbtn");

    bossBtn.addEventListener("click", () => {
        bossBtn.classList.add("active");
        cusBtn.classList.remove("active");
    });

    cusBtn.addEventListener("click", () => {
        cusBtn.classList.add("active");
        bossBtn.classList.remove("active");
    });

    nextBtn.addEventListener("click", () => {
        if (bossBtn.classList.contains('active')) {
            window.location.href = 'join3-1.php';
        } else {
            window.location.href = 'join3-2.php';
        }
    });
    </script>
</body>

</html>