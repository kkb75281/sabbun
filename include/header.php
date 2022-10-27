<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>헤더영역</title>
    
    <link rel="stylesheet" href="../html/assets/css/fonts.css">
    <link rel="stylesheet" href="../html/assets/css/header.css">
    <link rel="stylesheet" href="../html/assets/css/common.css">
    <link rel="stylesheet" href="../html/assets/css/reset.css">
</head>
<body>
    <header id="headerType" class="header__wrap nanum">
        <div class="header__inner">
            <div class="header__logo clearfix">
                <a href="../main/main.php">
                    <img src="../html/assets/img/temp_logo.svg" alt="사뿐소품 로고">
                </a>
            </div>
            <nav class="header__menu clearfix">
                <ul>
                    <li><a href="#sliderType">사뿐소품이란?</a></li>
                    <li><a href="../list/sopumList.php">소품샵 리스트</a></li>
                    <li><a href="../board/board.php">커뮤니티</a></li>
                    <li><a href="../mypage/mypage.php">마이페이지</a></li>
                    <li><a href="../faq/faq.php">고객센터</a></li>
                </ul>
            </nav>
            <div class="header__member clearfix">
                <ul>
<?php if( isset($_SESSION['myMemberID'])){ ?>
        <li><a href="#" class="black"><?=$_SESSION['youName']?>님 환영합니다:)</a></li>
        <li><a href="../login/logout.php">로그아웃</a></li>
<?php }else {   ?>
        <li><a href="../login/login.php">로그인</a></li>
        <li><a href="../join/join1.php">회원가입</a></li>
<?php  }   ?>
                    <!-- <li><a href="login.html">로그인</a></li>
                    <li><a href="join1.html">회원가입</a></li> -->
                </ul>
            </div>
            <div class="header__search clearfix">
                <form action="headerSearch.php" name="headerSearch" method="get">
                    <fieldset>
                        <legend>검색 영역</legend>
                        <input type="search" name="searchKeyword" id="searchKeyword" placeholder="검색어를 입력하세요 !" aria-label="search" required>
                        <button type="submit" class="searchBtn">
                            <img src="../html/assets/img/search_icon.svg" alt="검색버튼">
                        </button>
                    </fieldset>
                </form>
            </div>
            <div class="header__ham">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>
    <!-- // headerType -->
</body>
</html>