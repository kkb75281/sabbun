<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>사뿐소품이란?</title>

    <link rel="stylesheet" href="../html/assets/css/fonts.css" />
    <link rel="stylesheet" href="../html/assets/css/common.css" />
    <link rel="stylesheet" href="../html/assets/css/reset.css" />
    <link rel="stylesheet" href="../html/assets/css/header.css" />
    <link rel="stylesheet" href="../html/assets/css/footer.css" />
    <link rel="stylesheet" href="../html/assets/css/WhatIsSBSP.css" />
    <!-- <link rel="stylesheet" href="assets/css/main.css " /> -->
    <link rel="stylesheet" href="../html/assets/js/test/swiper.min.css" />
</head>

<body>
    <?php include "../include/header.php" ?>
    <!-- // header -->

    <main>
        <section id="intro">
            <div class="intro__wrap">
                <div class="intro__inner">
                    <div class="intro__cont container">
                        <div class="intro__img">
                            <div class="img__Background">
                                <div class="img1"></div>
                                <div class="img2"></div>
                                <div class="img3"></div>
                            </div>
                        </div>
                        <div class="intro__desc nanum">
                            <h1>사뿐소품은</h1>
                            <h2>사뿐소품은</h2>
                            <p>
                                사뿐소품은 소품샵 정보 전달 및 공유를 위한 사이트입니다. 점점
                                늘어가는 소품샵에 비해 소품샵에 대한 정보는 SNS와 포털사이트
                                검색을 통해서만 찾을 수 있습니다. 사뿐소품 사이트는 소품샵을
                                사랑하는 사람들에게 편리한 정보전달을 위해 만들어진
                                사이트입니다.
                            </p>
                            <p>
                                소품샵의 정보 전달 뿐 아니라 소품샵을 좋아하는 사람들이 모여
                                함께 소통할 수 있는 커뮤니티 기능을 제공하여 편의성과 즐거움을
                                함께 느낄 수 있는 사이트입니다.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // intro -->

        <section id="sliderIntro">
            <div class="sliderIntro__wrap">
                <div class="sliderIntro__inner">
                    <div class="sliderIntro__desc nanum container">
                        <h2>당신이 원하던 소품샵과 정보를</h2>
                        <p>
                            소품샵 리스트를 통해 세상의 다양한 소품샵을 한눈에 모아보세요!
                            무슨말을 써야할가요? 아무말이나 지금 적고있지만 일단...하....
                            여러분 소품샵 많이 사랑해주세요 여러분들이 소비를 해야 경기가
                            살아나고 경기가 살아야 사람이 살고 사람이 살아야 나라가 삽니다!
                        </p>
                    </div>
                    <div class="sliderIntro__slide">
                        <div class="slider__box">
                            <div class="slide1"></div>
                            <div class="slide2"></div>
                            <div class="slide3"></div>
                            <div class="slide4"></div>
                            <div class="slide5"></div>
                            <!-- clone -->
                            <div class="slide1 clone"></div>
                            <div class="slide2 clone"></div>
                            <div class="slide3 clone"></div>
                            <div class="slide4 clone"></div>
                            <div class="slide5 clone"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="progressIntro">
            <div class="progressIntro__wrap">
                <div class="progressIntro__inner">
                    <div class="progressIntro__cont container">
                        <div class="progressIntro__desc nanum">
                            <h2>사뿐소품의 발자취</h2>
                            <p>
                                사뿐소품 프로젝트의 발자취를 소개합니다. 우리 정말 많은 일이
                                있었습니다. 하지만 그 많은 일들을 이겨내고 지금 여기, 이렇게
                                웹페이지가 만들어졌습니다. 여러분, 축하해주십시오!
                            </p>
                        </div>
                        <div class="progressIntro__img">
                            <div class="img1"></div>
                            <div class="img2"></div>
                            <div class="img3"></div>
                        </div>
                    </div>
                    <div class="progress__bar container">
                        <div class="progress__box">
                            <div class="progress1">
                                <span>22.08</span>
                                <p>조 결성</p>
                                <div class="progress__dot"></div>
                            </div>
                            <div class="progress2">
                                <span>22.08</span>
                                <p>주제 선정 / 프로토타입 프레임워크</p>
                                <div class="progress__dot"></div>
                            </div>
                            <div class="progress3">
                                <span>22.09</span>
                                <p>디자인 리뉴얼</p>
                                <div class="progress__dot"></div>
                            </div>
                            <div class="progress4">
                                <span>22.10</span>
                                <p>사뿐소품 완성</p>
                                <div class="progress__dot"></div>
                            </div>
                            <div class="progress5">
                                <span>22.11</span>
                                <p>사뿐소품은 계속 발전중!</p>
                                <div class="progress__dot"></div>
                            </div>
                        </div>

                        <div class="progress__border"></div>
                    </div>
                </div>
            </div>
        </section>

        <section id="SBSPISPresent" class="nanum">
            <div class="SBSPISPresent__wrap">
                <div class="SBSPISPresent__inner container">
                    <h3>
                        세상의 소품샵을 사랑하는 사람들에게 <br />
                        선물같은 사이트를 목표로 하는 사뿐소품
                    </h3>
                    <div class="SBSPISPresetn__img">
                        <!-- <div class="img_bulb"></div>
              <div class="img_heart"></div> -->
                        <div class="img_box"></div>
                    </div>
                    <a href="../main/main.php">이용하러 가기</a>
                </div>
            </div>
        </section>
    </main>

    <div class="goTop">
        <button>top</button>
    </div>
    <!-- // top 버튼 -->

    <?php include "../include/footer.php" ?>
    <!-- // footer -->
</body>

<script src="assets/js/test/jquery-3.4.1.min.js"></script>
<script src="assets/js/test/swiper.min.js"></script>
<script src="assets/js/test/TweenMax.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js"></script>

</html>