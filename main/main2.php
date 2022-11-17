<?php
    include "../connect/session.php";

    echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>사뿐소품</title>


    <?php include "../include/link.php" ?>



    <style>
        
    </style>
</head>
<body>
    <?php include "../include/header.php" ?>
    <!-- // header -->

    <main id="mainType" class="nanum">
        <section id="sliderType" class="slider__wrap scroll">
            <h2 class="ir">Hot Issue</h2>
            <div class="slider__inner">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="desc">
                                <span>사뿐소품1</span>
                                <h3>사뿐소품1</h3>
                                <p>
                                    다이어리는 이제 기록을 넘어선 문화 예술이 되었습니다.<br>
                                    다이어리 꾸미기의 매력에 빠져보세요
                                </p>
                                <div class="btn">
                                    <a href="#">자세히보기</a>
                                    <a href="#" class="black">사이트보기</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="desc">
                                <span>사뿐소품2</span>
                                <h3>사뿐소품2</h3>
                                <p>
                                    다이어리는 이제 기록을 넘어선 문화 예술이 되었습니다.<br>
                                    다이어리 꾸미기의 매력에 빠져보세요
                                </p>
                                <div class="btn">
                                    <a href="#">자세히보기</a>
                                    <a href="#" class="black">사이트보기</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="desc">
                                <span>사뿐소품3</span>
                                <h3>사뿐소품3</h3>
                                <p>
                                    다이어리는 이제 기록을 넘어선 문화 예술이 되었습니다.<br>
                                    다이어리 꾸미기의 매력에 빠져보세요
                                </p>
                                <div class="btn">
                                    <a href="#">자세히보기</a>
                                    <a href="#" class="black">사이트보기</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button">
                        <div class="swiper-button-play"><span class="ir">play</span></div>
                        <div class="swiper-button-stop"><span class="ir">stop</span></div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>

                </div>
            </div>
        </section>
        <!-- sliderType -->

        <section id="imgTextType" class="imgText__wrap section scroll">
            <div class="imgText__inner container">
                <div class="imgText__article1">
                    <div class="imgText__text">
                        <span>New!</span>
                        <h3><a href="#">집요하게 다듬은 예술가의 언어, 오민</a></h3>
                    </div>
                    <div class="imgText__img">
                        <img src="../html/assets/img/imgtext__bg01.jpg" alt="">
                    </div>
                </div>
                <div class="imgText__article2">
                    <div class="imgText__text">
                        <span>New!</span>
                        <h3><a href="#">집요하게 다듬은 예술가의 언어, 오민</a></h3>
                    </div>
                    <div class="imgText__img">
                        <img src="../html/assets/img/imgtext__bg02.jpg" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- imgTextType -->

        <section id="cardSliderType" class="section scroll">
            <div class="cardSlider__wrap">
                <h2 class="container">리뷰</h2>
                <div class="cardSlider__img">
                    <div class="cardSlider__inner">
                        <div class="cardSlider s1" role="group" aria-label="1/5">
                            <img src="../html/assets/img/cardSlider__bg01.jpg" alt="슬라이드 이미지1">
                            <span>#태그</span>
                            <span>#태그</span>
                            <span>#태그</span>
                            <span>#태그</span>
                            <h3><a href="/">제목입니다</a></h3>

                        </div>
                        <div class="cardSlider s2" role="group" aria-label="1/5">
                            <img src="../html/assets/img/cardSlider__bg02.jpg" alt="슬라이드 이미지1">
                            <span>#태그</span>
                            <span>#태그</span>
                            <span>#태그</span>
                            <span>#태그</span>
                            <h3><a href="/">제목입니다</a></h3>

                        </div>
                        <div class="cardSlider s3" role="group" aria-label="1/5">
                            <img src="../html/assets/img/cardSlider__bg03.jpg" alt="슬라이드 이미지1">
                            <span>#태그</span>
                            <span>#태그</span>
                            <span>#태그</span>
                            <span>#태그</span>
                            <h3><a href="/">제목입니다</a></h3>
                        </div>
                        <div class="cardSlider s4" role="group" aria-label="1/5">
                            <img src="../html/assets/img/cardSlider__bg04.jpg" alt="슬라이드 이미지1">
                            <span>#태그</span>
                            <span>#태그</span>
                            <span>#태그</span>
                            <span>#태그</span>
                            <h3><a href="/">제목입니다</a></h3>

                        </div>
                        <div class="cardSlider s5" role="group" aria-label="1/5">
                            <img src="../html/assets/img/cardSlider__bg05.jpg" alt="슬라이드 이미지1">
                            <span>#태그</span>
                            <span>#태그</span>
                            <span>#태그</span>
                            <span>#태그</span>
                            <h3><a href="/">제목입니다</a></h3>

                        </div>
                    
                    </div>
                </div>
            </div>
        </section>
        <!-- cardSliderType -->

        <section id="textType" class="text__wrap scroll container">
            <h2 class="container">나만의 팁</h2>
            <div class="text__inner">
                <div class="text__article">
                    <div class="text__desc">
                        <span>#가을</span><span>#아이템</span><span>#소품</span><span>#추천</span>
                        <h3><a href="/">놀랍게도 제목입니다. 나만의 팁!</a></h3>
                    </div>
                </div>
                <div class="text__article">
                    <div class="text__desc">
                        <span>#가을</span><span>#아이템</span><span>#소품</span><span>#추천</span>
                        <h3><a href="/">놀랍게도 제목입니다. 나만의 팁!</a></h3>
                    </div>
                </div>
                <div class="text__article">
                    <div class="text__desc">
                        <span>#가을</span><span>#아이템</span><span>#소품</span><span>#추천</span>
                        <h3><a href="/">놀랍게도 제목입니다. 나만의 팁!</a></h3>
                    </div>
                </div>
                <div class="text__article">
                    <div class="text__desc">
                        <span>#가을</span><span>#아이템</span><span>#소품</span><span>#추천</span>
                        <h3><a href="/">놀랍게도 제목입니다. 나만의 팁!</a></h3>
                    </div>
                </div>
            </div>
        </section>
        <!-- textType -->

        <section id="banner" class="banner__wrap scroll container">
            <div class="banner__inner">
                <div class="banner__img">
                    <div class="banner__desc">
                        <h3>버그를 제보해주세요!</h3>
                        <p>버그 제보하고 1000포인트 받아가세요~</p>
                        <a href="#">버그 알려주러 가기</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner -->
        <section id="textType2" class="text__wrap2 scroll container">
            <h2 class="container title2">공지사항</h2>
            <div class="text__inner2">
                <div class="text__article2">
                    <div class="text__desc2">
                        <span>2022.10.18</span>
                        <h3><a href="/">사뿐소품의 공지사항입니다. 모두 주목!</a></h3>
                    </div>
                </div>
                <div class="text__article2">
                    <div class="text__desc2">
                        <span>2022.10.18</span>
                        <h3><a href="/">신규 등록된 상점 목록 알려드립니다.</a></h3>
                    </div>
                </div>
                <div class="text__article2">
                    <div class="text__desc2">
                        <span>2022.10.18</span>
                        <h3><a href="/">공지사항 제목입니다 짜쟌!</a></h3>
                    </div>
                </div>
                <div class="text__article2">
                    <div class="text__desc2">
                        <span>2022.10.18</span>
                        <h3><a href="/">공지사항 제목입니다 짜쟌!</a></h3>
                    </div>
                </div>
                <div class="text__article2">
                    <div class="text__desc2">
                        <span>2022.10.18</span>
                        <h3><a href="/">공지사항 제목입니다 짜쟌!</a></h3>
                    </div>
                </div>
            </div>
        </section>
        <!-- textType -->
        
    </main>
    <!-- mainType -->

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

    <script src="../html/assets/js/custom.js"></script>
    <script src="../html/assets/js/swiper-bundle.min.js"></script>
    <script src="../html/assets/js/cardSlider.js"></script>

        <!-- Initialize Swiper -->
        <script>
        var swiper = new Swiper(".mySwiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true,
            },
        });

        const btnStop = document.querySelector(".swiper-button-stop");
        const btnStart = document.querySelector(".swiper-button-stop");
        const btnHam = document.querySelector(".header__ham");
        const btnMenu = document.querySelector(".header__menu");
        const btnMenuList = btnMenu.querySelectorAll("ul li a");

        btnStart.style.display = "none";

        document.querySelector(".swiper-button-stop").addEventListener("click", () => {
            swiper.autoplay.stop();
            btnStart.style.display = "block";
            btnStop.style.display = "none";

        });
        document.querySelector(".swiper-button-play").addEventListener("click", () => {
            swiper.autoplay.start();
            btnStart.style.display = "none";
            btnStop.style.display = "block";
        });

        btnHam.addEventListener("click", () => {
            btnHam.classList.toggle("active");
            btnMenu.classList.toggle("active");
            document.body.classList.toggle("fixed");

        })

        btnMenuList.forEach((List)=>{
            List.addEventListener("click", ()=>{
                btnMenu.classList.remove("active");
                btnHam.classList.remove("active");
                document.body.classList.remove("fixed");
            })
        })

        window.addEventListener("resize", () => {
            let width = window.innerWidth;
            if (width > 1300) {
                document.body.classList.remove("fixed");
                btnMenu.classList.remove("active");
                btnHam.classList.remove("active");

            }
        });

        document.querySelectorAll("a").forEach(li => {
            li.addEventListener("click", (e) => {
                e.preventDefault();
                document.querySelector(li.getAttribute("href")).scrollIntoView({
                    behavior:"smooth"
                });
            });
        });
    </script>



</body>
</html>