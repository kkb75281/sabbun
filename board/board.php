<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>board</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../html/assets/css/fonts.css">
    <link rel="stylesheet" href="../html/assets/css/common.css">
    <link rel="stylesheet" href="../html/assets/css/reset.css">
    <link rel="stylesheet" href="../html/assets/css/header.css">
    <link rel="stylesheet" href="../html/assets/css/footer.css">
    <link rel="stylesheet" href="../html/assets/css/board.css">

</head>

<body>
    <?php include "../include/header.php" ?>
    <!-- // header -->

    <main id="main">
        <section id="board" class="board__wrap container">
            <h2>게시판 영역입니다.</h2>
            <div class="board__inner">
                <div class="board__title">
                    <h3>Free Board</h3>
                    <p>사뿐소품 회원분들의 생각을 자유롭게 나누는 공간입니다.</p>
                </div>

                <div class="board__table">
                    <table>
                        <colgroup>
                            <col style="width: 7%">
                            <col>
                            <col style="width: 10%">
                            <col style="width: 10%">
                            <col style="width: 7%">
                            <col style="width: 7%">
                        </colgroup>
                        <thead>
                            <tr class="thead">
                                <th>No</th>
                                <th>제목</th>
                                <th>글쓴이</th>
                                <th>작성시간</th>
                                <th>조회수</th>
                                <th>좋아요</th>
                            </tr>
                        </thead>
                        <tbody>
<?php

if(isset($_GET['page'])){
    $page = (int)$_GET['page'];
} else {
    $page = 1;
}
$viewNum = 10;
$viewLimit = ($viewNum * $page) - $viewNum;

    $sql = "SELECT b.myBoardID, b.boardTitle, m.youName, b.regTime, b.boardView, b.boardLike FROM myBoard b JOIN myBMember m ON (b.myMemberID = m.myMemberID) ORDER BY myBoardID DESC LIMIT {$viewLimit}, {$viewNum}";
    $result = $connect -> query($sql);

    if($result){
        $count = $result -> num_rows;

        if($count > 0){
            for($i=1; $i <= $count; $i++){
                $info = $result -> fetch_array(MYSQLI_ASSOC);
                echo"<tr>";
                echo"<td>".$info['myBoardID']."</td>";
                echo"<td><a href='boardView.php?myBoardID={$info['myBoardID']}'>".$info['boardTitle']."</td>";
                echo"<td>".$info['youName']."</td>";
                echo"<td>".date('Y-m-d', $info['regTime'])."</td>";
                echo"<td>".$info['boardView']."</td>";
                echo"<td>".$info['boardLike']."</td>";
                echo"</tr>";
            }
        }
    }
?>

                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="board__search">
                    <div class="left">
                        <form action="boardSearch.php" name="boardSearch" method="get">
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
                                <a href="boardWrite.php" class="btn">글쓰기</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="board__pages">
                    <ul>
<?php
    $sql = "SELECT count(myBoardID) FROM myBoard";
    $result = $connect -> query($sql);

    $boardCount = $result -> fetch_array(MYSQLI_ASSOC);
    $boardCount = $boardCount['count(myBoardID)'];

    // 총 페이지 갯수
    $boardCount = ceil($boardCount/$viewNum);

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
        echo "<li><a href='board.php?page=1'>처음으로</a></li>";
        echo "<li><a href='board.php?page={$prevPage}'>이전</a></li>";
    }

    // 페이지 넘버 표시
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";
        if($i == $page) $active = "active";
        echo "<li class='{$active}'><a href='board.php?page={$i}'>{$i}</a></li>";
    }

    // 다음 페이지, 마지막 페이지
    if($page != $boardCount){
        $nextPage = $page +1;
        echo "<li><a href='board.php?page={$nextPage}'>다음</a></li>";
        echo "<li><a href='board.php?page={$boardCount}'>마지막으로</a></li>";
    }
?>
                        <!-- <li><a href="#">처음</a></li>
                        <li class="board__pages__prevbtn"><a href="#">&lt;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">6</a></li>
                        <li><a href="#">7</a></li>
                        <li class="board__pages__nextbtn"><a href="#">></a></li>
                        <li><a href="#">마지막</a></li> -->
                    </ul>
                </div>

                
            </div>
        </section>
        <!-- //board -->


    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- // footer -->

</body>
</html>