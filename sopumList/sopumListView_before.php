<?php 
    include "../connect/connect.php";
    include "../connect/session.php";

    $shopListID = $_GET['shopListID'];
    //var_dump($shopListID);
    $sql = "SELECT * FROM sopumShopList WHERE shopListID = {$shopListID}";
    $result = $connect -> query($sql);
    $info = $result -> fetch_array(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sopumListView</title>
    <style>

    </style>
    <!-- CSS -->
    <link rel="stylesheet" href="../html/assets/css/fonts.css">
    <link rel="stylesheet" href="../html/assets/css/common.css">
    <link rel="stylesheet" href="../html/assets/css/reset.css">
    <link rel="stylesheet" href="../html/assets/css/header.css">
    <link rel="stylesheet" href="../html/assets/css/footer.css">
    <link rel="stylesheet" href="../html/assets/css/sopumList.css">
    <!-- <link rel="stylesheet" href="assets/css/board.css"> -->
    <!-- META -->
    <meta name="author" content="webstoryboy">
    <meta name="description" content="PHP 사이트 만들기입니다.">
    <meta name="keyword" content="사이트, 만들기, 튜토리얼, 웹스토리보이">
    <meta name="robots" content="all">

    <!-- ICON -->
    <link rel="icon" href="../html/assets/img/icon_256.png" />
    <link rel="shortcut icon" href="../html/assets/img/icon_256.png" />
    <link rel="icon" type="image/png" sizes="256x256" href="../html/assets/img/icon_256.png" />
    <link rel="icon" type="image/png" sizes="192x192" href="../html/assets/img/icon_192.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="../html/assets/img/icon_32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../html/assets/img/icon_16.png" />
</head>

<body>
    <?php include "../include/header.php" ?>
    <!-- // header -->


    <main id="main">
        <section id="Post" class="Post__wrap">
            <h2>소품샵 리스트</h2>
            <div class="Post__inner">
                <div class="Post__title">
                    <h3>소품샵 리스트</h3>
                    <p>다양한 소품샵을 사뿐소품에서 확인해보세요!</p>
                </div>
                <!-- 소품샵 리스트 게시판 -->
                <div class="post__box">
                    <div class="postWrite">
                        <div class="post__info">
                            <div class="img">
                                <img src="img/<?=$info['shopImgFile']?>" alt="">

                            </div>
                            <div class="shop__info">

                                <div class="info__desc">
                                    <span>업체명</span>
                                    <div class="info"><?=$info['shopName']?></div>
                                </div>
                                <div class="info__desc">
                                    <span>영업시간</span>
                                    <div class="info"><?=$info['shopHours']?></div>
                                </div>
                                <div class="info__desc">
                                    <span>연락처</span>
                                    <div class="info"><?=$info['shopNum']?></div>
                                </div>
                                <div class="info__desc">
                                    <span>상품종류</span>
                                    <div class="info"><?=$info['goodsList']?></div>
                                </div>
                                <div class="info__desc">
                                    <span>위치</span>
                                    <div class="info"><?=$info['shopAdress']?></div>
                                </div>

                                <div class="shop__map">
                                    <div id="map"></div>
                                    <script type="text/javascript"
                                        src="//dapi.kakao.com/v2/maps/sdk.js?appkey=9d3637cebd20b21457c4e0c648d59d32">
                                    </script>
                                    <script>
                                    var container = document.getElementById('map');
                                    var options = {
                                        center: new kakao.maps.LatLng(33.450701, 126.570667),
                                        level: 3
                                    };

                                    var map = new kakao.maps.Map(container, options);
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="list__icon">
                            <span class="ir heart">
                                heart</span>
                            <span class="ir share">
                                <img src="../html/assets/img/List_share.svg" alt="">
                                share</span>
                        </div>
                        <div class="tag">
                            <span class="tag__title">키워드 태그</span>
                            <div class="tag__desc">제로웨이스트</div>
                            <div class="tag__desc">패브릭</div>
                            <div class="tag__desc">코지</div>
                            <div class="tag__desc">에코프렌들리</div>
                            <div class="tag__desc">인테리어</div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="post__btn">
                            <div class="post__btn__left">
                                <a href="sopumList.php"><button type="submit" class="btn1">목록으로</button></a>
                            </div>
                            <div class="post__btn__right">
                                <a href="sopumListDelete.php?shopListID=<?=$shopListID ?>"><button
                                        class="btn2">삭제하기</button></a>
                                <a href="sopumListModify.php?shopListID=<?=$shopListID ?>"><button
                                        class="btn3">수정하기</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //소품샵 게시판 -->


            </div>
        </section>
        <!-- //board -->


    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- // footer -->

    <script>
    const LikeBtn = document.querySelectorAll(".heart");

    LikeBtn.forEach((e) => {
        e.addEventListener("click", () => {
            e.classList.toggle("red")
        })
    })
    </script>
</body>

</html>