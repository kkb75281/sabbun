<?php 
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>
<?php
    if($_SESSION['myMemberID']==6 || $_SESSION['myMemberID']==7){
        // 로그인 페이지 이동
        
    }else{
        echo '<script type="text/javascript">'; 
        echo 'alert("소품샵 등록은 관리자 아이디로 가능합니다.");'; 
        echo 'window.location.href = "../main/main.php";';
        echo '</script>';
        exit;
    }
?>
<!DOCTYPE html>
<html lang="ko">
<style>
.img__button input[type="file"] {
    position: absolute;
    width: 0;
    height: 0;
    padding: 0;
    overflow: hidden;
    border: 0;
}
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sopumListWrite</title>
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
    <!-- // footer -->


    <main id="main">
        <section id="Post" class="Post__wrap">
            <h2>소품샵 리스트</h2>
            <div class="Post__inner">
                <div class="Post__title">
                    <h3>소품샵 리스트</h3>
                    <p>다양한 소품샵을 사뿐소품에서 확인해보세요!</p>
                </div>
                <!-- 소품샵 리스트 게시판 -->
                <form action="sopumListWriteSave.php" name="sopumListWrite" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <div class="post__box">
                            <div class="postWrite">
                                <div class="post__info">
                                    <div class="img">
                                        <div class="img__button">
                                            <label for="shopProfile">
                                                <div class="btn-upload">
                                                </div>
                                                <p>사진을 업로드해주세요!</p>
                                            </label>
                                            <input type="file" name="shopProfile" id="shopProfile"
                                                accept=".jpg, .jpeg, .png, .gif">
                                        </div>

                                    </div>
                                    <div class="shop__info">
                                        <div>
                                            <span>업체명</span><input type="text" name="shopName" id="shopName"
                                                placeholder="소품샵 이름을 입력해주세요">
                                        </div>
                                        <div>
                                            <span>소품샵 소개</span><input type="text" name="shopListContents"
                                                id="shopListContents" placeholder="간단한 소품샵 소개를 입력 해 주세요">
                                        </div>
                                        <div>
                                            <span>영업시간</span>
                                            <input class="time" type="text" name="shopHours" id="shopHours"
                                                placeholder="영업일/시간을 입력하세요">
                                        </div>
                                        <div>
                                            <span>연락처</span><input class="phone" type="text" name="shopNum" id="shopNum"
                                                placeholder="소품샵 연락처를 입력하세요">
                                        </div>
                                        <div>
                                            <span>상품종류</span><input type="text" name="goodsList" id="goodsList"
                                                placeholder="판매하는 상품 종류를 입력해주세요">
                                        </div>
                                        <div>
                                            <span>위치</span><input type="text" name="shopAdress" id="shopAdress"
                                                placeholder="소품샵 주소를 입력하세요">
                                        </div>

                                        <div class="shop__map">
                                            <div id="map" style="width:420px;height:230px;margin-left: 50px;"></div>
                                            <script type="text/javascript"
                                                src="//dapi.kakao.com/v2/maps/sdk.js?appkey=9d3637cebd20b21457c4e0c648d59d32&libraries=services,clusterer,drawing">
                                            </script>
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
                                            geocoder.addressSearch('<?=$info['shopAdress']?>', function(result,
                                                status) {

                                                // 정상적으로 검색이 완료됐으면 
                                                if (status === kakao.maps.services.Status.OK) {

                                                    var coords = new kakao.maps.LatLng(result[0].y, result[0]
                                                        .x);

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
                                    </div>
                                </div>
                                <!-- <div class="post__share ir">공유</div>
                        <div class="post__heart ir">좋아요</div> -->
                                <div class="tag">
                                    <span class="tag__title">키워드 태그</span>
                                    <input type="text" name="shopTag[]" id="shopTag" placeholder="태그를 입력해주세요">
                                    <input type="text" name="shopTag[]" id="shopTag" placeholder="태그를 입력해주세요">
                                    <input type="text" name="shopTag[]" id="shopTag" placeholder="태그를 입력해주세요">
                                </div>
                                <div class="tag">
                                    <span class="tag__title">Best New</span>
                                    <input type="checkbox" value='BEST' placeholder="베스트 소품샵" name="best" id="best">
                                    <label for="best">Best</label>
                                    <input type="checkbox" value='NEW' placeholder="뉴 소품샵" name="new" id="new">
                                    <label for="new">New</label>
                                </div>
                            </div>
                            <div class="container">
                                <button type="submit" class="btn">글 작성하기</button>
                            </div>
                        </div>
                        <!-- //소품샵 게시판 -->
                    </fieldset>
                </form>



            </div>
        </section>
        <!-- //board -->


    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- // footer -->

</body>

</html>