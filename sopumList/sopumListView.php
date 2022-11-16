<?php 
    include "../connect/connect.php";
    include "../connect/session.php";

    $shopListID = $_GET['shopListID'];
    // var_dump($shopListID);
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
    <link rel="stylesheet" href="../html/assets/css/sopumListView.css">

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
    <section id="store__wrap" class="store__wrap nanum">
            <div class="store__inner">
                <!-- 소품샵 리스트 게시판 -->
                <div class="visual">
                    <div class="img">
                        <img src="img/<?=$info['shopImgFile']?>" alt="<?=$info['shopName']?> 대표 이미지">
                    </div>
                    <div class="tit">
                        <p class="tag">
                            <span>#<?=$info['shopTag']?></span>
                        </p>
                        <p class="name">"<?=$info['shopName']?>"</p>
                    </div>
                </div>
                <div class="contents">
                    <div class="tit">
                        <h4><?=$info['shopName']?>을 소개합니다!</h4>
                        <img class="heart" src="../html/assets/img/heart_empty.png" alt="빈하트">
                    </div>
                    <div class="store__map">
                        <div class="img">
                            <img src="img/<?=$info['shopImgFile']?>" alt="<?=$info['shopName']?> 대표 이미지">
                        </div>
                        <div class="card">
                            <img src="../html/assets/img/info__icon5.png" alt="위치 지도">
                            <span>여기에요!</span>
                            <div id="map"></div>
                        </div>
                        <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=9d3637cebd20b21457c4e0c648d59d32&libraries=services,clusterer,drawing"></script>
                                            <script>
                                        var container = document.getElementById('map');
                                        var options = {
                                            center: new kakao.maps.LatLng(33.450701, 126.570667),
                                            level: 3
                                        };

                                        var map = new kakao.maps.Map(container, options);
                                        
                                        
                                        // 주소-좌표 변환 객체를 생성합니다
                                        var geocoder = new kakao.maps.services.Geocoder();

                                        // 주소로 좌표를 검색합니다
                                        geocoder.addressSearch('<?=$info['shopAdress']?>', function (result, status) {

                                            // 정상적으로 검색이 완료됐으면 
                                            if (status === kakao.maps.services.Status.OK) {

                                                var coords = new kakao.maps.LatLng(result[0].y, result[0].x);

                                                // 결과값으로 받은 위치를 마커로 표시합니다
                                                var marker = new kakao.maps.Marker({
                                                    map: map,
                                                    position: coords
                                                });

                                                // 인포윈도우로 장소에 대한 설명을 표시합니다
                                                var infowindow = new kakao.maps.InfoWindow({
                                                    content: '<div style="width:150px;text-align:center;padding:6px 0;"><?=$info['shopName']?></div>'
                                                });
                                                infowindow.open(map, marker);

                                                // 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
                                                map.setCenter(coords);
                                            }
                                        });

                                    </script>
                    </div>
                    <div class="info">
                        <div class="card">
                            <img src="../html/assets/img/info__icon1.png" alt="위치">
                            <span>위치</span>
                            <p><?=$info['shopAdress']?></p>
                        </div>
                        <div class="card">
                            <img src="../html/assets/img/info__icon2.png" alt="영업시간">
                            <span>영업시간</span>
                            <p><?=$info['shopHours']?></p>
                        </div>
                        <div class="card">
                            <img src="../html/assets/img/info__icon3.png" alt="연락처">
                            <span>연락처</span>
                            <p><?=$info['shopNum']?></p>
                        </div>
                        <div class="card">
                            <img src="../html/assets/img/info__icon4.png" alt="상품종류">
                            <span>상품종류</span>
                            <p><?=$info['goodsList']?></p>
                        </div>
                    </div>
                    <div class="btns">
                        <ul>
                            <li>
                                <a href="sopumList.php">
                                    <button type="submit">
                                        <img src="../html/assets/img/info__icon6.png" alt="다른 가게 구경하기">
                                        <span>다른 가게 구경하기</span>
                                    </button>
                                </a>
                            </li>
                            <li>
                                <a href="sopumListDelete.php?shopListID=<?=$shopListID ?>">
                                    <button type="submit">
                                        <img src="../html/assets/img/info__icon8.png" alt="삭제하기">
                                        <span>삭제하기</span>
                                    </button>
                                </a>
                            </li>
                            <li>
                                <a href="sopumListModify.php?shopListID=<?=$shopListID ?>">
                                    <button type="submit">
                                        <img src="../html/assets/img/info__icon7.png" alt="수정하기">
                                        <span>수정하기</span>
                                    </button>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>


            </div>
        </section>


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