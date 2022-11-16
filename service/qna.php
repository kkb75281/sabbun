<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    //include "../connect/sessionCheck.php";

    // $myMemberID = $_SESSION['myMemberID'];
    // $myPageSql = "SELECT * FROM myBMember WHERE myMemberID = {$myMemberID}";
    // $myPageResult = $connect -> query($myPageSql);
    // $myPageInfo = $myPageResult -> fetch_array(MYSQLI_ASSOC);


?>


<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>자주묻는질문</title>

    <link rel="stylesheet" href="../html/assets/css/fonts.css">
    <link rel="stylesheet" href="../html/assets/css/common.css">
    <link rel="stylesheet" href="../html/assets/css/reset.css">
    <link rel="stylesheet" href="../html/assets/css/header_faq.css">
    <link rel="stylesheet" href="../html/assets/css/qna.css">
    <link rel="stylesheet" href="../html/assets/css/footer.css">
</head>

<body>
    <?php include "../include/header2.php" ?>
    <!-- // header -->

    <main>
        <section id="qna" class="nanum">
            <div class="qna__contents">
                <p>
                    1:1 문의는 문의글 업로드 혹은 이메일을 통해 받고 있습니다.<br>
                    아래 편하신 방법을 선택해주세요 !
                </p>
                <div class="qna__btn">
                    <div class="btn">
                        <img src="../html/assets/img/QnA_icon1@3x.png" alt="문의글 작성하기">
                        <span>문의글 작성하기</span>
                    </div>
                    <form>
                        <input id="EmailBtn" value="sabbunsopum@gmail.com">
                        <button class="copyBtn" onclick="copy_to_clipboard()">
                            <img src="../html/assets/img/QnA_icon2@3x.png" alt="이메일 작성하기">
                            <span>이메일 주소 복사하기</span>
                        </button>
                    </form>
                </div>
            </div>
            <!-- //content2 -->
        </section>
    </main>

    <?php include "../include/footer.php" ?>
    <!-- // footer -->

    <script src="../assets/js/custom.js"></script>
    <script>
    function copy_to_clipboard() {
        var copyText = document.getElementById("EmailBtn");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("Copy");
        alert("이메일 주소를 복사했습니다.");
    }

    document.querySelector(".faq__header .link .qna").classList.add("active");

    document.querySelector(".qna__btn .btn").addEventListener("click", () => {
        alert("카카오톡 상담원 모집중에 있습니다. 빠른 시일내에 서비스를 제공하도록 하겠습니다.");
    })

    </script>
</body>

</html>