<?php 
    include "../connect/connect.php";
    include "../connect/session.php";
    

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
        padding: 5px;
        font-size: 14px;
        font-weight: 500;
        background: #4461f2;
        border-radius: 10px;
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

                    <?php
     if(isset($_GET['page'])){
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }

    function msg($alert){
        echo "<p>총 ".$alert."건이 검색되었습니다.</p>";
    }
    $searchKeyword = $_GET['searchKeyword'];
    $searchOption = $_GET['searchOption'];
    $searchKeyword = $connect -> real_escape_string(trim($searchKeyword));
    $searchOption = $connect -> real_escape_string(trim($searchOption));
    $sql = "SELECT * FROM sopumShopList ";

    switch($searchOption){
        case "title":
            $sql .= "WHERE shopName LIKE '%{$searchKeyword}%' ORDER BY shopListID DESC";
            break;
        case "content":
            $sql .= "WHERE shopAdress LIKE '%{$searchKeyword}%' ORDER BY shopListID DESC";
            break;
        case "name":
            $sql .= "WHERE goodsList LIKE '%{$searchKeyword}%' ORDER BY shopListID DESC";
            break;
    }
    

    // echo $sql;
    $result = $connect -> query($sql);
    // 전체 게시글 갯수
    $totalCount = $result -> num_rows;
    msg($totalCount);
?>
                    <br><br>
                </div>

                <!-- 소품샵 리스트 -->
                <div class="list__inner">
       

                    <?php
                     $viewNum = 10;
                     $viewLimit = ($viewNum * $page) - $viewNum;
                     $sql = $sql." LIMIT {$viewLimit}, {$viewNum}";
                     $result = $connect -> query($sql);
                     
                     if($totalCount > 0){
                         // 위 result 값과 아래 result 값이 다르기 때문에 한번 더 설정
                         foreach($result as $info){?>
                    <div class="list">
                        <a href="sopumListView.php?shopListID=<?=$info['shopListID']?>">
                            <h4 class="list_title"><?=$info['shopName']?><span><?=$info['shopListContents']?></span>
                            </h4>
                        </a>

                        <div class="list__img">
                            <a href="sopumListView.php?shopListID=<?=$info['shopListID']?>">
                                <img src="img/<?=$info['shopImgFile']?>" alt=""></a>
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
                        };
                    };?>

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
                                    <option value="title">샵이름</option>
                                    <option value="content">샵주소</option>
                                    <option value="name">상품종류</option>
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
                    <?php



    $boardCount = ceil($totalCount/$viewNum);
    // echo $boardCount;
    // 현재 페이지를 기준으로 보여주고 싶은 갯수
    $pageCurrent = 5;
    $startPage = $page - $pageCurrent;
    $endPage = $page + $pageCurrent;
    // 처음/마지막 페이지 초기화
    if($startPage < 1) $startPage = 1;
    if($endPage >= $boardCount) $endPage = $boardCount;
    // 이전 페이지, 처음 페이지 (순서상 페이지 넘버 표시 전에 위치)
    if($page != 1){
        $prevPage = $page -1;
        echo "<li><a href='sopumListSearch.php?page=1&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>처음으로</a></li>";
        echo "<li><a href='sopumListSearch.php?page={$prevPage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>이전</a></li>";
    }
    // 페이지 넘버 표시
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";
        if($i == $page) $active = "active";
        echo "<li class='{$active}'><a href='sopumListSearch.php?page={$i}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>{$i}</a></li>";
    }
    // 다음 페이지, 마지막 페이지
    if($page != $boardCount){
        $nextPage = $page +1;
        echo "<li><a href='sopumListSearch.php?page={$nextPage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>다음</a></li>";
        echo "<li><a href='sopumListSearch.php?page={$boardCount}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>마지막으로</a></li>";
    }
?>
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