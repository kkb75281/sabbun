<?php
    include "../connect/connect.php";
    include "../connect/session.php";
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
<!-- content에 자신의 OAuth2.0 클라이언트ID를 넣습니다. -->
<meta name ="google-signin-client_id" content="404829697399-8o22ictjism83fk67t5afcobd8j8989u.apps.googleusercontent.com">
<script src="https://developers.kakao.com/sdk/js/kakao.js"></script>
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
                                <button type="submit" class="input__button2" onclick="kakaoLogin();">
                                    <img class="kakaoBtn" src="../html/assets/img/kakao.svg" alt="카카오톡 로그인">
                                </button>
                                <button type="submit" class="input__button2" id="GgCustomLogin">
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

        <script>

        //처음 실행하는 함수
        function init() {
            gapi.load('auth2', function() {
                gapi.auth2.init();
                options = new gapi.auth2.SigninOptionsBuilder();
                options.setPrompt('select_account');
                // 추가는 Oauth 승인 권한 추가 후 띄어쓰기 기준으로 추가
                options.setScope('email profile openid https://www.googleapis.com/auth/user.birthday.read');
                // 인스턴스의 함수 호출 - element에 로그인 기능 추가
                // GgCustomLogin은 li태그안에 있는 ID, 위에 설정한 options와 아래 성공,실패시 실행하는 함수들
                gapi.auth2.getAuthInstance().attachClickHandler('GgCustomLogin', options, onSignIn, onSignInFailure);
            })
        }

        function onSignIn(googleUser) {
            var access_token = googleUser.getAuthResponse().access_token
            $.ajax({
                // people api를 이용하여 프로필 및 생년월일에 대한 선택동의후 가져온다.
                url: 'https://people.googleapis.com/v1/people/me'
                // key에 자신의 API 키를 넣습니다.
                , data: {personFields:'birthdays', key:'AIzaSyCeT-Ggs8OHIFnzFATRh5LtxuS8VZm7j-Q', 'access_token': access_token}
                , method:'GET'
            })
            .done(function(e){
                //프로필을 가져온다.
                var profile = googleUser.getBasicProfile();
                console.log(profile)
            })
            .fail(function(e){
                console.log(e);
            })
        }
        function onSignInFailure(t){		
            console.log(t);
        }
        </script>
        <!-- //구글 api 사용을 위한 스크립트 -->
        <script src="https://apis.google.com/js/platform.js?onload=init" async defer></script>
    
        <script>
            Kakao.init('9d3637cebd20b21457c4e0c648d59d32'); //발급받은 키 중 javascript키를 사용해준다.
            console.log(Kakao.isInitialized()); // sdk초기화여부판단
            //카카오로그인
            function kakaoLogin() {
                Kakao.Auth.login({
                success: function (response) {
                    Kakao.API.request({
                    url: '/v2/user/me',
                    success: function (response) {
                        console.log(response)
                    },
                    fail: function (error) {
                        console.log(error)
                    },
                    })
                },
                fail: function (error) {
                    console.log(error)
                },
                })
            }
            //카카오로그아웃  
            function kakaoLogout() {
                if (Kakao.Auth.getAccessToken()) {
                Kakao.API.request({
                    url: '/v1/user/unlink',
                    success: function (response) {
                        console.log(response)
                    },
                    fail: function (error) {
                    console.log(error)
                    },
                })
                Kakao.Auth.setAccessToken(undefined)
                }
            }  
        </script>
    
    </main>

    <footer id="footer__type" class="footer__wrap nanum">
        <div class="footer__inner container">
            <div class="footer__menu">
                <ul>
                    <h4>고객센터</h4>
                    <div class="footer__cs">
                        <li class="footer__cscenter">sabbunsopum@gmail.com</li>
                        <li><span>홈페이지 내 1:1 상담 또는 이메일을 통해 문의를 받고 있습니다.</span></li>
                    </div>
                </ul>
                <ul>
                    <h4>사뿐소품</h4>
                    <li><a href="#">브랜드스토리</a></li>
                    <li><a href="#">이용안내</a></li>
                    <li><a href="#">연혁</a></li>
                </ul>
                <ul>
                    <h4>고객지원</h4>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">자주하는 질문</a></li>
                    <li><a href="#">1:1 상담</a></li>
                </ul>
                <ul>
                    <h4>개인정보</h4>
                    <li><a href="#">이용약관</a></li>
                    <li><a href="#">개인정보처리방침</a></li>
                </ul>
                <p>
                    Copyright © 사뿐소품. All rights reserved.
                </p>
            </div>
            <div class="footer__icon">
                <div class="footer__icon__img img1"><a href=""></a></div>
                <div class="footer__icon__img img2"><a href=""></a></div>
                <div class="footer__icon__img img3"><a href=""></a></div>
                <div class="footer__icon__img img4"><a href=""></a></div>
                <div class="footer__icon__img img5"><a href=""></a></div>
            </div>
        </div>
    </footer>
    <!-- // footer -->

    <!-- 로그인 에러 팝업 -->
    <div class="findid__popup findid__error nanum">
        <div class="findid__inner">
            <div class="findid__header">
                <h3>로그인 실패</h3>
            </div>
            <div class="findid__contents">
                <img src="../html/assets/img/error_icon@3x.png" alt="로그인 실패">
                <p>
                    <!-- 등록된 회원정보를 찾을 수 없습니다.<br>
                    계정이 없으시다면<br>
                    회원가입을 진행해주세요! -->
                </p>
            </div>
            <div class="findid__footer">
                <button type="button" class="btn btn_login">다시 입력하기</button>
                <div class="ac"><a href="join1.php">회원가입</a></div>
            </div>
            <button type="button" class="btn_close cb4"><span>닫기</span></button>
        </div>
    </div>

    <!-- 아이디 찾기 팝업(찾을 방법 선택) -->
    <div class="findid__popup nanum">
        <div class="findid__inner">
            <div class="findid__header">
                <h3>아이디 찾기</h3>
            </div>
            <div class="findid__contents">
                <img src="../html/assets/img/find_icon@3x.png" alt="아이디 찾기">
                <p>
                    아이디를 잊으셨나요?<br>
                    아래의 방법을 통해 찾으실 수 있습니다.
                </p>
            </div>
            <div class="findid__footer">
                <button type="button" class="btn btn_phone">휴대폰 번호로 찾기</button>
            </div>
            <button type="button" class="btn_close cb1"><span>닫기</span></button>
        </div>
    </div>

    <!-- 아이디 찾기 팝업(휴대폰 번호로 찾기) -->
    <div class="findid__popup findid__phone nanum">
        <div class="findid__inner">
            <div class="findid__header">
                <h3>아이디 찾기</h3>
            </div>
            <div class="findid__contents">
                <img src="../html/assets/img/find_icon@3x.png" alt="아이디 찾기">
                <p>
                    가입시 입력했던<br>
                    휴대폰 번호를 입력해주세요.
                </p>
                <form name="login" action="loginSave.php" method="post">
                    <fieldset>
                        <legend>아이디 찾기 입력폼</legend>
                        <div>
                            <label for="youPhone" class="ir">휴대폰 번호</label>
                            <input type="text" name="youPhone" id="youPhone" placeholder="휴대폰 번호를 입력해주세요!"
                                class="input__style" required>
                        </div>
                        <button type="submit" class="btn input_phone">입력</button>
                    </fieldset>
                </form>
            </div>
            <button type="button" class="btn_close cb2"><span>닫기</span></button>
        </div>
    </div>

    <!-- 아이디 찾기 에러 팝업 -->
    <div class="findid__popup findid__error nanum">
        <div class="findid__inner">
            <div class="findid__header">
                <h3>아이디 찾기 실패</h3>
            </div>
            <div class="findid__contents">
                <img src="../html/assets/img/error_icon@3x.png" alt="아이디 찾기 실패">
                <p>
                    등록된 회원정보를 찾을 수 없습니다.<br>
                    계정이 없으시다면<br>
                    회원가입을 진행해주세요!
                </p>
            </div>
            <div class="findid__footer">
                <button type="button" class="btn btn_login">다시 입력하기</button>
                <div class="ac"><a href="join1.php">회원가입</a></div>
            </div>
            <button type="button" class="btn_close cb4"><span>닫기</span></button>
        </div>
    </div>

    <!-- 아이디 찾기 완료 팝업 -->
    <div class="findid__popup findid__success nanum">
        <div class="findid__inner">
            <div class="findid__header">
                <h3>아이디 찾기 성공</h3>
            </div>
            <div class="findid__contents">
                <img src="../html/assets/img/success_icon@3x.png" alt="아이디 찾기 성공">
                <p>
                    등록된 아이디는<br>
                    <em>abc1234</em><br>
                    입니다.
                </p>
            </div>
            <div class="findid__footer">
                <div class="ac"><a href="login.php">로그인 하기</a></div>
                <button type="button" class="btn btn_pw">비밀번호 찾기</button>
            </div>
            <button type="button" class="btn_close cb3"><span>닫기</span></button>
        </div>
    </div>

    <!-- 비밀번호 찾기 팝업(찾을 방법 선택) -->
    <div class="findpw__popup nanum">
        <div class="findpw__inner">
            <div class="findpw__header">
                <h3>비밀번호 찾기</h3>
            </div>
            <div class="findpw__contents">
                <img src="../html/assets/img/find_icon@3x.png" alt="비밀번호 찾기">
                <p>
                    비밀번호를 잊으셨나요?<br>
                    아래의 방법을 통해 찾으실 수 있습니다.
                </p>
            </div>
            <div class="findpw__footer">
                <button type="button" class="btn btn_email">이메일로 찾기</button>
                <button type="button" class="btn btn_phonePw">휴대폰 번호로 찾기</button>
            </div>
            <button type="button" class="btn_close cb5"><span>닫기</span></button>
        </div>
    </div>

    <!-- 비밀번호 찾기 팝업(이메일로 찾기) -->
    <div class="findpw__popup findpw__email nanum">
        <div class="findpw__inner">
            <div class="findpw__header">
                <h3>비밀번호 찾기</h3>
            </div>
            <div class="findpw__contents">
                <img src="../html/assets/img/find_icon@3x.png" alt="비밀번호 찾기">
                <p>
                    가입시 입력했던<br>
                    이메일 주소를 입력해주세요.
                </p>
                <form name="login" action="loginSave.php" method="post">
                    <fieldset>
                        <legend>비밀번호 찾기 입력폼</legend>
                        <div>
                            <label for="youEmail" class="ir">이메일 주소</label>
                            <input type="text" name="youEmail" id="youEmail" placeholder="이메일 주소를 입력해주세요!"
                                class="input__style" required>
                        </div>
                        <button type="submit" class="btn input_email">입력</button>
                    </fieldset>
                </form>
            </div>
            <button type="button" class="btn_close cb6"><span>닫기</span></button>
        </div>
    </div>

    <!-- 비밀번호 찾기 팝업(휴대폰 번호로 찾기) -->
    <div class="findpw__popup findpw__phone nanum">
        <div class="findpw__inner">
            <div class="findpw__header">
                <h3>비밀번호 찾기</h3>
            </div>
            <div class="findpw__contents">
                <img src="../html/assets/img/find_icon@3x.png" alt="비밀번호 찾기">
                <p>
                    가입시 입력했던<br>
                    휴대폰 번호를 입력해주세요.
                </p>
                <form name="login" action="loginSave.php" method="post">
                    <fieldset>
                        <legend>비밀번호 찾기 입력폼</legend>
                        <div>
                            <label for="youPhone" class="ir">이메일 주소</label>
                            <input type="text" name="youPhone" id="youPhone" placeholder="휴대폰 번호를 입력해주세요!"
                                class="input__style" required>
                        </div>
                        <button type="submit" class="btn input_phonePw">입력</button>
                    </fieldset>
                </form>
            </div>
            <button type="button" class="btn_close cb7"><span>닫기</span></button>
        </div>
    </div>

    <!-- 비밀번호 찾기 에러 팝업 -->
    <div class="findpw__popup findpw__error nanum">
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
                <button type="button" class="btn btn_againPw">다시 입력하기</button>
                <div class="ac"><a href="join1.php">회원가입</a></div>
            </div>
            <button type="button" class="btn_close cb8"><span>닫기</span></button>
        </div>
    </div>

    <!-- 비밀번호 찾기 완료 팝업 -->
    <div class="findpw__popup findpw__success nanum">
        <div class="findpw__inner">
            <div class="findpw__header">
                <h3>비밀번호 찾기 성공</h3>
            </div>
            <div class="findpw__contents">
                <img src="../html/assets/img/success_icon@3x.png" alt="비밀번호 찾기 성공">
                <p>
                    등록된 비밀번호는<br>
                    <em>0987zxy</em><br>
                    입니다.
                </p>
            </div>
            <div class="findpw__footer">
                <div class="ac"><a href="login.php">로그인 하기</a></div>
                <button type="button" class="btn btn_id">아이디 찾기</button>
            </div>
            <button type="button" class="btn_close cb9"><span>닫기</span></button>
        </div>
    </div>
</body>
<script>
const findidBtn = document.querySelector(".login__footer .btn .findId");
const findidPopup = document.querySelector(".findid__popup");
const findidClose1 = document.querySelector(".findid__inner .cb1");
const findidPhone = document.querySelector(".findid__phone");
const idPhoneBtn = document.querySelector(".btn_phone");
const inputPhone = document.querySelector(".input_phone");
const findidClose2 = document.querySelector(".findid__inner .cb2");
const findidSuccess = document.querySelector(".findid__success");
const findPw = document.querySelector(".btn_pw");
const findidClose3 = document.querySelector(".findid__inner .cb3");
const findidError = document.querySelector(".findid__error");
const findidClose4 = document.querySelector(".findid__inner .cb4");

const findpwBtn = document.querySelector(".login__footer .btn .findPw");
const findpwPopup = document.querySelector(".findpw__popup");
const findpwClose1 = document.querySelector(".findpw__inner .cb5");
const findpwEmail = document.querySelector(".findpw__email");
const findpwPhone = document.querySelector(".findpw__phone");
const pwEmailBtn = document.querySelector(".btn_email");
const pwPhoneBtn = document.querySelector(".btn_phonePw");
const inputEmail = document.querySelector(".input_email");
const inputPhonePw = document.querySelector(".input_phonePw");
const findpwClose2 = document.querySelector(".findpw__inner .cb6");
const findpwClose3 = document.querySelector(".findpw__inner .cb7");
const findpwClose4 = document.querySelector(".findpw__inner .cb8");
const findpwClose5 = document.querySelector(".findpw__inner .cb9");
const findpwError = document.querySelector(".findpw__error");
const findpwAgain = document.querySelector(".btn_againPw");
const findpwSuccess = document.querySelector(".findpw__success");
const findId = document.querySelector(".btn_id");





// findidBtn.addEventListener("click", ()=>{
//     findidPopup.classList.add("open");
// });
// findidClose1.addEventListener("click", ()=>{
//     findidPopup.classList.remove("open");
// });
// idPhoneBtn.addEventListener("click", ()=>{
//     findidPopup.classList.remove("open");
//     findidPhone.classList.add("open");
// });
// findidClose2.addEventListener("click", ()=>{
//     findidPhone.classList.remove("open");
// });
// inputPhone.addEventListener("click", ()=>{
//     findidPhone.classList.remove("open");
//     findidSuccess.classList.add("open");
// });
// findPw.addEventListener("click", ()=>{
//     findidSuccess.classList.remove("open");
//     findpwPopup.classList.add("open");
// });
// findidClose3.addEventListener("click", ()=>{
//     findidSuccess.classList.remove("open");
// });

// findpwBtn.addEventListener("click", ()=>{
//     findpwPopup.classList.add("open");
// });
// findpwClose1.addEventListener("click", ()=>{
//     findpwPopup.classList.remove("open");
// });
// pwEmailBtn.addEventListener("click", ()=>{
//     findpwPopup.classList.remove("open");
//     findpwEmail.classList.add("open");
// });
// findpwClose2.addEventListener("click", ()=>{
//     findpwEmail.classList.remove("open");
// });
// inputEmail.addEventListener("click", ()=>{
//     findpwEmail.classList.remove("open");
//     findpwError.classList.add("open");
// });
// pwPhoneBtn.addEventListener("click", ()=>{
//     findpwPopup.classList.remove("open");
//     findpwPhone.classList.add("open");
// });
// findpwAgain.addEventListener("click", ()=>{
//     findpwError.classList.remove("open");
//     findpwPopup.classList.add("open");
// });
// findpwClose3.addEventListener("click", ()=>{
//     findpwPhone.classList.remove("open");
// });
// findpwClose4.addEventListener("click", ()=>{
//     findpwError.classList.remove("open");
// });
// inputPhonePw.addEventListener("click", ()=>{
//     findpwPhone.classList.remove("open");
//     findpwSuccess.classList.add("open");
// });
// findId.addEventListener("click", ()=>{
//     findpwSuccess.classList.remove("open");
//     findidPopup.classList.add("open");
// });
// findpwClose5.addEventListener("click", ()=>{
//     findpwSuccess.classList.remove("open");
// });
</script>

</html>