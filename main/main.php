<?php
    include "../connect/session.php";
    include "../connect/connect.php";

    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";

    $listsql = "SELECT * FROM sopumShopList ORDER BY shopListID DESC";
    $listresult = $connect -> query($listsql);
    $listinfo = $listresult -> fetch_array(MYSQLI_ASSOC);

    $tipSql = "SELECT * FROM myTip ORDER BY myTipID DESC LIMIT 5";
    $tipResult = $connect -> query($tipSql);
    $tipInfo = $tipResult -> fetch_array(MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>사뿐소품</title>

    <?php include "../include/link.php" ?>

</head>

<body>
    <?php include "../include/header.php" ?>
    <!-- // header -->

    <main>
        <section id="slider1" class="slider1 nanum">
            <div class="slider__tit">
                <h2 class="title">소품#</h2>
                <ul class="slider__tab">
                    <li class="active"><button type="button" data-filter="store">ALL</button></li>
                    <li><button type="button" data-filter="BEST">BEST</button></li>
                    <li><button type="button" data-filter="NEW">NEW</button></li>
                </ul>
            </div>
            <div class="slider__list__wrap swiper">
                <ul class="slider__list swiper-wrapper">
                    <?php foreach($listresult as $info){    ?>
                    <li class="<?=$info['best'].' '.$info['new']?> store swiper-slide">
                        <a href="../sopumList/sopumListView.php?shopListID=<?=$info['shopListID']?>">
                            <div class="image">
                                <img src="../sopumList/img/<?=$info['shopImgFile']?>" alt="<?=$info['shopName']?>" />
                                <div>
                                    <p class="tag">
                                        <span>#<?=$info['shopTag']?></span>
                                       
                                    </p>
                                    <p class="name"><?=$info['shopName']?></p>
                                </div>
                            </div>
                            <p class="location"><span></span><?=$info['shopAdress']?></p>
                        </a>
                    </li>
                    <?php
                    }   ?>
                    <!-- 키덜트 -->
                    <!-- <li class="store swiper-slide">
                        <a href="../sopumList/sopumListView.php?shopListID=">
                            <div class="image">
                                <img src="../html/assets/img/store1.jpg" alt="미미도넛" />
                                <div>
                                    <p class="tag">
                                        <span>#홍대</span>
                                        <span>#키덜트</span>
                                        <span>#귀여운</span>
                                        <span>#통통튀는</span>
                                    </p>
                                    <p class="name">미미도넛</p>
                                </div>
                            </div>
                            <p class="location"><span></span>서울특별시 마포구 동교동 177-4</p>
                        </a>
                    </li>
                    
                    <li class="BEST store swiper-slide">
                        <a href="../sopumList/sopumListView.php">
                            <div class="image">
                                <img src="../html/assets/img/store2.jpg" alt="오브젝트" />
                                <div>
                                    <p class="tag">
                                        <span>#홍대</span>
                                        <span>#신진디자이너</span>
                                        <span>#전시</span>
                                        <span>#팝업스토어</span>
                                    </p>
                                    <p class="name">오브젝트</p>
                                </div>
                            </div>
                            <p class="location"><span></span>서울특별시 마포구 와우산로35길 13</p>
                        </a>
                    </li>
                    <li class="BEST store swiper-slide">
                        <a href="../sopumList/sopumListView.php">
                            <div class="image">
                                <img src="../html/assets/img/store3.jpg" alt="메이드모먼" />
                                <div>
                                    <p class="tag">
                                        <span>#홍대</span>
                                        <span>#감성</span>
                                        <span>#기본템</span>
                                        <span>#깔끔</span>
                                    </p>
                                    <p class="name">메이드모먼</p>
                                </div>
                            </div>
                            <p class="location"><span></span>서울특별시 마포구 서교동 330-9 1층</p>
                        </a>
                    </li>
                    <li class="NEW store swiper-slide">
                        <a href="../sopumList/sopumListView.php">
                            <div class="image">
                                <img src="../html/assets/img/store4.jpg" alt="잼머의집" />
                                <div>
                                    <p class="tag">
                                        <span>#홍대</span>
                                        <span>#동화감성</span>
                                        <span>#인테리어</span>
                                        <span>#패브릭</span>
                                    </p>
                                    <p class="name">잼머의 집</p>
                                </div>
                            </div>
                            <p class="location"><span></span>서울특별시 마포구 연남로 43-2 초록대문</p>
                        </a>
                    </li>
                    <li class="BEST store swiper-slide">
                        <a href="../sopumList/sopumListView.php">
                            <div class="image">
                                <img src="../html/assets/img/store5.jpg" alt="어프어프" />
                                <div>
                                    <p class="tag">
                                        <span>#홍대</span>
                                        <span>#마니아</span>
                                        <span>#생필품</span>
                                        <span>#자체제작</span>
                                    </p>
                                    <p class="name">어프어프<br>홍대점</p>
                                </div>
                            </div>
                            <p class="location"><span></span>서울특별시 마포구 와우산로27길 35</p>
                        </a>
                    </li>
                    <li class="NEW store swiper-slide">
                        <a href="../sopumList/sopumListView.php">
                            <div class="image">
                                <img src="../html/assets/img/store6.jpg" alt="오월상점" />
                                <div>
                                    <p class="tag">
                                        <span>#홍대</span>
                                        <span>#다꾸러</span>
                                        <span>#동백시그니처</span>
                                        <span>#아기자기</span>
                                    </p>
                                    <p class="name">오월상점</p>
                                </div>
                            </div>
                            <p class="location"><span></span>서울특별시 마포구 서교동 340-2</p>
                        </a>
                    </li>
                    <li class="store swiper-slide">
                        <a href="../sopumList/sopumListView.php">
                            <div class="image">
                                <img src="../html/assets/img/store7.jpg" alt="알로하거제" />
                                <div>
                                    <p class="tag">
                                        <span>#거제</span>
                                        <span>#빈티지</span>
                                        <span>#우드</span>
                                        <span>#인테리어</span>
                                    </p>
                                    <p class="name">ALOHA GEOJE</p>
                                </div>
                            </div>
                            <p class="location"><span></span>경남 거제시 장목면 율천대금길 88-26</p>
                        </a>
                    </li>
                    <li class="BEST store swiper-slide">
                        <a href="../sopumList/sopumListView.php">
                            <div class="image">
                                <img src="../html/assets/img/store8.jpg" alt="만두상점" />
                                <div>
                                    <p class="tag">
                                        <span>#제주</span>
                                        <span>#애견동반</span>
                                        <span>#라탄</span>
                                        <span>#카페운영</span>
                                    </p>
                                    <p class="name">ㅁㄷㅅㅈ</p>
                                </div>
                            </div>
                            <p class="location"><span></span>제주 제주시 조천읍 함덕남14길 6 만두상점</p>
                        </a>
                    </li>
                    <li class="BEST store swiper-slide">
                        <a href="../sopumList/sopumListView.php">
                            <div class="image">
                                <img src="../html/assets/img/store9.jpg" alt="디자인에이비" />
                                <div>
                                    <p class="tag">
                                        <span>#제주</span>
                                        <span>#아티스트</span>
                                        <span>#엽서</span>
                                        <span>#디퓨저</span>
                                    </p>
                                    <p class="name">DESIGN AB</p>
                                </div>
                            </div>
                            <p class="location"><span></span>제주 제주시 한경면 판포4길 22</p>
                        </a>
                    </li>
                    <li class="BEST store swiper-slide">
                        <a href="../sopumList/sopumListView.php">
                            <div class="image">
                                <img src="../html/assets/img/store10.jpg" alt="수풀" />
                                <div>
                                    <p class="tag">
                                        <span>#제주</span>
                                        <span>#인테리어</span>
                                        <span>#오브제</span>
                                        <span>#그립톡</span>
                                    </p>
                                    <p class="name">SUPUL</p>
                                </div>
                            </div>
                            <p class="location"><span></span>제주 제주시 한림읍 명랑로 8 2층</p>
                        </a>
                    </li>
                    <li class="NEW store swiper-slide">
                        <a href="../sopumList/sopumListView.php">
                            <div class="image">
                                <img src="../html/assets/img/store11.jpg" alt="메리아일랜드" />
                                <div>
                                    <p class="tag">
                                        <span>#제주</span>
                                        <span>#핸드메이드</span>
                                        <span>#캔들</span>
                                        <span>#클래스</span>
                                    </p>
                                    <p class="name">MERRY ISLAND</p>
                                </div>
                            </div>
                            <p class="location"><span></span>제주 제주시 한림읍 금능길 80</p>
                        </a>
                    </li>
                    <li class="store swiper-slide">
                        <a href="../sopumList/sopumListView.php">
                            <div class="image">
                                <img src="../html/assets/img/store12.jpg" alt="블리홈" />
                                <div>
                                    <p class="tag">
                                        <span>#상수동</span>
                                        <span>#리빙</span>
                                        <span>#인테리어</span>
                                        <span>#포토스팟</span>
                                    </p>
                                    <p class="name">블리홈</p>
                                </div>
                            </div>
                            <p class="location"><span></span>서울 마포구 와우산로13길 43</p>
                        </a>
                    </li> -->
                    <!-- 상수동 포토스팟 -->
                </ul>
            </div>
            <div class="slider__scroll__wrap">
                <div>
                    <div class="swiper-scrollbar"></div>
                </div>
            </div>
        </section>
        <!-- // slider1 -->

        <div class="intro">
            <p class="intro__moveText">
                세상에 모든 소품샵을 한눈에
            </p>
            <div class="intro__text">
                <dl class="desc">
                    <dt></dt>
                    <dd>
                        여기저기 흩어져있는<br>
                        <em>소품샵</em>의 정보를<br>
                        확인해 보세요
                    </dd>
                </dl>
                <p>
                    소품샵에 대한 정보를 한 눈에 볼 수 있다면 얼마나 편할까?<br>
                    ‘사뿐소품’ 프로젝트는 이러한 물음으로부터 시작되었습니다.<br><br>
                    SNS 위주의 공지와 개별적인 정보 제공으로 인한 소비자의 불편함을 해결하기 위해<br>
                    소품샵의 정보를 모아 그때그때 바로 확인할 수 있도록 구성하였고,<br>
                    소비자와 판매자간 교류 공간이 되어 커뮤니케이션이 가능합니다.
                </p>
            </div>
        </div>
        <!-- // intro -->

        <section id="myTip" class="myTip">
            <h2>나만의 팁</h2>
            <div class="myTip__inner">
                <?php
                foreach($tipResult as $tip){
                    $i += 1; 
                    if($i == 3){$i = 1;}
                ?>
                <div class="tipBox t<?echo $i;?>">
                    <span>
                        <img src="../html/assets/img/myTip_icon<?echo $tip['rcvSlct']?>.svg" alt="icon1"/>
                    </span>
                    <p><?=$tip['tipMsg']?></p>
                </div>
                <?php
                }?>
                <!-- <div class="tipBox t1">
                    <span>🤓</span>
                    <p>나만의 팁을 적어야 하는데 아는게 없어서 일단은 채우기 용으로...</p>
                </div>
                <div class="tipBox t2">
                    <p>나만의 팁을 적어야 하는데 아는게 없어서 일단은 채우기 용으로...<br>이번엔 길게 두줄로 써보기 룰루루룰루</p>
                    <span>☺️</span>
                </div>
                <div class="tipBox t3">
                    <span>😗</span>
                    <p>나만의 팁을 적어야 하는데 아는게 없어서 일단은 채우기 용으로...</p>
                </div>
                <div class="tipBox t4">
                    <p>나만의 팁을 적어야 하는데 아는게 없어서 일단은 채우기 용으로...<br>이번엔 길게 두줄로 써보기 룰루루룰루</p>
                    <span>😶‍🌫️</span>
                </div> -->

            </div>
            <div class="more"><a href="../myTip/myTip.php">더보기</a></div>
        </section>
        <!-- // myTip -->

        <section id="goto" class="goto">
            <h2>바로가기</h2>
            <div class="goto__inner">
                <div class="box b1">
                    <img src="../html/assets/img/list__icon.svg" alt="소품샵 리스트">
                    <h3>소품샵 리스트</h3>
                    <a href="../sopumList/sopumList.php">바로가기</a>
                </div>
                <div class="box b2">
                    <img src="../html/assets/img/board__icon.svg" alt="소품샵 리스트">
                    <h3>자유게시판</h3>
                    <a href="../board/board.php">바로가기</a>
                </div>
                <div class="box b3">
                    <img src="../html/assets/img/myPage__icon.svg" alt="소품샵 리스트">
                    <h3>마이페이지</h3>
                    <a href="../mypage/myPage.php">바로가기</a>
                </div>
                <div class="box b4">
                    <img src="../html/assets/img/faq__icon.svg" alt="소품샵 리스트">
                    <h3>고객센터</h3>
                    <a href="../html/faq.html">바로가기</a>
                </div>
            </div>
        </section>
    </main>
    <!-- // main -->

    <?php include "../include/footer.php" ?>
    <!-- // footer -->

    <script src="../html/assets/js/test/jquery-3.4.1.min.js"></script>
    <script src="../html/assets/js/test/swiper.min.js"></script>
    <script src="../html/assets/js/test/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js"></script>

    <script>
    $(document).ready(function() {
        sliderWidth();
        var sliderWrap = new Swiper(".slider__list__wrap", {
            slidesPerView: "auto",
            spaceBetween: 30,
            freeMode: true,
            mousewheel: true,
            scrollbar: {
                el: ".slider__scroll__wrap .swiper-scrollbar",
                hide: false,
            },
        });
        $(".slider__tab > li > button").on("click", function() {
            $(".slider__tab > li").removeClass("active");
            $(this).parents("li").addClass("active");
            var filter = $(this).attr("data-filter");
            if (filter == "all") {
                $(".slider__list > li").css("display", "");
                sliderWrap.update();
                sliderWrap.scrollbar.updateSize();
                sliderWrap.slideTo(0);
            } else {
                $(".slider__list > li").css("display", "none");
                $(".slider__list > li." + filter).css("display", "");
                sliderWrap.update();
                sliderWrap.scrollbar.updateSize();
                sliderWrap.slideTo(0);
            }
        });
        $(".slider__list").hover(
            function() {
                $(".cursor").addClass("drag");
            },
            function() {
                $(".cursor").removeClass("drag");
            }
        );
    });
    $(window).resize(function() {
        sliderWidth();
        if ($(window).outerWidth() < 1200) {
            $(".slider__scroll__wrap").css("padding-left", "0");
        }
    });

    function sliderWidth() {
        var minusWidth = 0;
        if ($(".wrap").outerHeight() > $(window).innerHeight()) {
            minusWidth = ($(window).outerWidth() - 1200) / 2 - 8;
        } else {
            minusWidth = ($(window).outerWidth() - 1200) / 2;
        }

        // $(".slider__scroll__wrap").css("padding-left", minusWidth + "px");
    }
    </script>
    <script>
    $(window).scroll(function() {
        var scroll = $(this).scrollTop(),
            scrollVal = scroll / 1.3,
            scrollTxt = $('.intro__moveText');

        TweenMax.to(scrollTxt, .5, {
            x: -scrollVal
        })
    });
    </script>
    <script>
    // top버튼
    window.addEventListener("scroll", () => {
        let scrollTop = window.pageYOffset || window.scrollY || document.documentElement.scrollTop;

        // 02
        if (scrollTop >= (document.body.scrollHeight - window.innerHeight)) {
            document.querySelector(".goTop").classList.add("show");
        } else {
            document.querySelector(".goTop").classList.remove("show");
        }

    });

    document.querySelector(".goTop").addEventListener("click", () => {
        window.scrollTo({
            left: 0,
            top: 0,
            behavior: "smooth"
        });
    });
    </script>
    <script>
    // myTip
    function scroll() {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop || window.screenY;

        document.querySelectorAll(".tipBox").forEach(item => {
            if (scrollTop > item.offsetTop - window.innerHeight / 2) {
                item.classList.add("show");
            }
        });
        requestAnimationFrame(scroll);
    }
    scroll();
    </script>



</body>

</html>