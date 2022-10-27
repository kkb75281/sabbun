<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 페이지_3_2</title>

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
            <div class="join__step active3">
                <em>3</em>/4
            </div>
            <div class="join__desc">
                <h1>
                    <span>손님의 회원 정보</span>를 입력 해 주세요!
                </h1>
                <p>입력한 정보는 회원가입 외 다른 용도로 사용하지 않습니다!</p>
            </div>
            <div class="join__inner">
                <form action="joinSave3-1.php" name="join" method="post" enctype="multipart/form-data"
                    onsubmit="return joinChecks()">
                    <fieldset>
                        <legend>회원가입</legend>
                        <div class="join__box">
                            <div class="youInfo">
                                <div>
                                    <label for="youName">이름</label>
                                    <input type="text" id="youName" name="youName" maxlength="5"
                                        placeholder="이름을 적어주세요!" required>
                                    <p class="msg" id="youNameComment">
                                        <!-- * 이름은 한글로만 작성이 가능합니다. -->
                                    </p>
                                </div>
                                <div class="overlap">
                                    <label for="youNickName">닉네임</label>
                                    <input type="text" id="youNickName" name="youNickName" placeholder="닉네임을 적어주세요!"
                                        required>
                                    <a class="check" href="#c" onclick="nickChecking()">중복검사</a>
                                    <p class="msg" id="youNickNameComment">
                                        <!-- * 닉네임이 존재합니다. -->
                                    </p>
                                </div>
                                <div class="overlap">
                                    <label for="youEmail">이메일</label>
                                    <input type="email" id="youEmail" name="youEmail" placeholder="이메일을 적어주세요!"
                                        required>
                                    <a class="check" href="#c" onclick="emailChecking()">중복검사</a>
                                    <p class="msg" id="youEmailComment">
                                        <!-- * 이메일이 존재합니다. -->
                                    </p>
                                </div>
                                <div>
                                    <label for="youPass">비밀번호</label>
                                    <input type="password" id="youPass" name="youPass" maxlength="20"
                                        placeholder="비밀번호를 적어주세요!" required>
                                    <p class="msg" id="youPassComment">
                                        <!-- * 비밀번호는 특수기호, 숫자가 필수로 들어가야 합니다. -->
                                    </p>
                                </div>
                                <div>
                                    <label for="youPassC">비밀번호 확인</label>
                                    <input type="password" id="youPassC" name="youPassC" maxlength="20"
                                        placeholder="비밀번호를 한번 더 적어주세요!" required>
                                    <p class="msg" id="youPassCComment">
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
                            <!-- <div class="storeInfo">
                                <div>
                                    <label for="youShop">가게(상호)명</label>
                                    <input type="text" id="youShop" name="youShop" placeholder="가게(상호)명을 적어주세요!"
                                        required>
                                </div>
                                <div>
                                    <label for="youAdress">가게 주소</label>
                                    <input type="text" id="youAdress" name="youAdress"
                                        placeholder="가게 주소(xx시 xx구 xx동 xxx)를 적어주세요!" required>
                                </div>
                                <div>
                                    <label for="youShopNum">가게 전화번호</label>
                                    <input type="text" id="youShopNum" name="youShopNum"
                                        placeholder="가게 전화번호(000-0000-0000)를 적어주세요!" required>
                                </div>
                            </div> -->
                            <div class="moreover">


                                <div>
                                    <label for="blogFile">프로필 이미지</label>
                                    <input type="file" name="blogFile" id="blogFile" accept=".jpg, .jpeg, .png, .gif"
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
                            <button class="join__Nbtn" type="submit">다음으로</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </section>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    const menBtn = document.querySelector(".men");
    const womenBtn = document.querySelector(".women");

    menBtn.addEventListener("click", () => {
        menBtn.classList.add("active");
        womenBtn.classList.remove("active");
    });

    womenBtn.addEventListener("click", () => {
        womenBtn.classList.add("active");
        menBtn.classList.remove("active");
    });


    let emailCheck = false;
    let nickCheck = false;

    function emailChecking() {
        let youEmail = $("#youEmail").val();
        if (youEmail == null || youEmail == '') {
            $("#youEmailComment").text("이메일을 입력해주세요!!");
        } else {
            $.ajax({
                type: "POST",
                url: "joinCheck3-1.php",
                data: {
                    "youEmail": youEmail,
                    "type": "emailCheck"
                },
                dataType: "json",
                success: function(data) {
                    if (data.result == "good") {
                        $("#youEmailComment").text("사용 가능한 이메일입니다.");
                        emailCheck = true;
                    } else {
                        $("#youEmailComment").text("이미 존재하는 이메일입니다.");
                        emailCheck = false;
                    }
                },
                error: function(request, status, error) {
                    console.log("request" + request);
                    console.log("status" + status);
                    console.log("error" + error);
                }
            })
        }
    }

    function nickChecking() {
        let youNickName = $("#youNickName").val();
        if (youNickName == null || youNickName == '') {
            $("#youNickNameComment").text("닉네임을 입력해주세요!!");
        } else {
            $.ajax({
                type: "POST",
                url: "joinCheck3-1.php",
                data: {
                    "youNickName": youNickName,
                    "type": "nickCheck"
                },
                dataType: "json",
                success: function(data) {
                    if (data.result == "good") {
                        $("#youNickNameComment").text("사용 가능한 닉네임입니다.");
                        nickCheck = true;
                    } else {
                        $("#youNickNameComment").text("이미 존재하는 닉네임입니다.");
                        nickCheck = false;
                    }
                },
                error: function(request, status, error) {
                    console.log("request" + request);
                    console.log("status" + status);
                    console.log("error" + error);
                }
            })
        }
    }

    function joinChecks() {
        //이름 공백 확인
        if ($("#youName").val() == "") {
            $("#youNameComment").text("이름을 입력해주세요!");
            return false;
        }
        //이름 유효성 검사
        let getYouName = RegExp(/^[가-힣]+$/);
        if (!getYouName.test($("#youName").val())) {
            $("#youNameComment").text("이름은 한글만 사용 가능합니다.");
            $("#youName").val("");
            return false;
        }
        //닉네임 공백 검사
        if ($("#youNickName").val() == "") {
            $("#youNickNameComment").text("닉네임을 입력해주세요!");
            return false;
        }
        //닉네임 유효성 검사
        let getYouNickName = RegExp(/^[가-힣]+$/);
        if (!getYouNickName.test($("#youNickName").val())) {
            $("#youNickNameComment").text("닉네임은 한글 또는 숫자만 사용 가능합니다.");
            $("#youNickName").val("");
            return false;
        }
        //닉네임 중복 검사
        if (youNickName == false) {
            $("#youNickNameComment").text("닉네임 중복 검사를 해주세요!");
            return false;
        }
        //이메일 공백 검사
        if ($("#youEmail").val() == "") {
            $("#youEmailComment").text("이메일을 입력해주세요!");
            return false;
        }
        //이메일 유효성 검사
        let getYouEmail = RegExp(/^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/);
        if (!getYouEmail.test($("#youEmail").val())) {
            $("#youEmailComment").text("이메일을 형식에 맞게 작성해주세요!");
            $("#youEmail").val("");
            return false;
        }
        //이메일 중복 검사
        if (emailCheck == false) {
            $("#youEmailComment").text("이메일 중복 검사를 해주세요!");
            return false;
        }
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
        //휴대폰번호 공백 확인
        if ($("#youPhone").val() == "") {
            $("#youPhoneComment").text("휴대폰번호 (000-0000-0000) 입력해주세요!");
            return false;
        }
        //휴대폰번호 유효성 검사
        let getYouPhone = RegExp(/01[016789]-[^0][0-9]{2,3}-[0-9]{3,4}/);
        if (!getYouPhone.test($("#youPhone").val())) {
            $("#youPhoneComment").text("휴대폰 번호가 정확하지 않습니다. 올바른 휴대폰번호(000-0000-0000)를 입력해주세요!");
            $("#youPhone").val("");
            return false;
        }
    }
    </script>
</body>

</html>