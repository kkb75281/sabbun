<?php 
    include "../connect/connect.php";
    include "../connect/session.php";

    
    // $sql = "SELECT * FROM sopumShopList ORDER BY shopListID DESC";
    // $result = $connect -> query($sql);
    // $info = $result -> fetch_array(MYSQLI_ASSOC);
    
    $shopTag = $_GET['Tag'];
    $shopTagSql = "SELECT * FROM sopumShopList WHERE shopTag = '$shopTag' ORDER BY ShopListID DESC LIMIT 10";
    $shopTagResult = $connect -> query($shopTagSql);
    $shopTagInfo = $shopTagResult -> fetch_array(MYSQLI_ASSOC);
    $shopTagCount = $shopTagResult -> num_rows;


?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>board</title>
    <style>
    .board__title {
        text-align: center;
        margin-bottom: 50px;
    }

    .board__title p {
        margin-bottom: 50px !important;
    }

    .board__title a {
        color: #fff;
        margin: 0 10px;
        padding: 7px 12px;
        font-size: 14px;
        font-weight: 500;
        background: #4461f2;
        border-radius: 12px;
    }
    </style>
    <!-- CSS -->
    <link rel="stylesheet" href="../html/assets/css/sopumList.css">
    <link rel="stylesheet" href="../html/assets/css/fonts.css">
    <link rel="stylesheet" href="../html/assets/css/common.css">
    <link rel="stylesheet" href="../html/assets/css/reset.css">
    <link rel="stylesheet" href="../html/assets/css/header.css">
    <link rel="stylesheet" href="../html/assets/css/footer.css">
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
        <section id="board" class="board__wrap nanum">
            <h2>소품샵 리스트</h2>
            <div class="board__inner">
                <div class="board__title">
                    <h3>소품#</h3>
                    <p>다양한 소품샵을 사뿐소품에서 확인해보세요!</p>
                    <a><?=$shopTagInfo['shopTag']?>와 관련된 글이 <?=$shopTagCount?>개 있습니다.</a>
                </div>

                <!-- 소품샵 리스트 -->
                <div class="list__inner">

                    <?php
                    foreach($shopTagResult as $shopTagInfo){  ?>
                    <div class="list">
                        <a href="sopumListView.php?shopListID=<?=$shopTagInfo['shopListID']?>">
                            <h4 class="list_title">
                                <?=$shopTagInfo['shopName']?><span><?=$shopTagInfo['shopListContents']?></span>
                            </h4>
                        </a>

                        <div class="list__img">
                            <a href="sopumListView.php?shopListID=<?=$shopTagInfo['shopListID']?>">
                                <img src="img/<?=$shopTagInfo['shopImgFile']?>" alt=""></a>
                        </div>
                        <div class="list__icon">
                            <span class=" heart">

                            </span>
                            <span class=" share">
                                <img src="../html/assets/img/List_share.svg" alt="">
                            </span>
                        </div>
                    </div>
                    <?php
                    }   ?>

                </div>
                <!-- //소품샵 리스트 -->
                <div class="board__search">
                    <div class="left">
                        <form action="sopumListSearch.php" name="boardSearch" method="get">
                            <fieldset>
                                <legend>게시판 검색 영역</legend>
                                <input type="search" name="searchKeyword" id="searchKeyword" placeholder="Search"
                                    aria-label="search" required>
                                <button type="submit" class="searchBtn">
                                    <img src="../html/assets/img/search_icon.svg" alt="검색버튼">
                                </button>
                                <select name="searchOption" id="searchOption">
                                    <option value="title">제목</option>
                                    <option value="content">내용</option>
                                    <option value="name">등록자</option>
                                </select>
                            </fieldset>
                        </form>
                    </div>
                    <div>
                        <form>
                            <fieldset>
                                <a href="sopumListWrite.php" class="btn">글쓰기</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="board__pages">
                    <ul>
                        <li><a href="#">처음</a></li>
                        <li class="board__pages__prevbtn"><a href="#">&lt;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">6</a></li>
                        <li><a href="#">7</a></li>
                        <li class="board__pages__nextbtn"><a href="#">></a></li>
                        <li><a href="#">마지막</a></li>
                    </ul>
                </div>


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