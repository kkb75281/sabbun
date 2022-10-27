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
                    <p>자유 게시판입니다.</p>
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
    $sql = "SELECT b.myBoardID, b.boardTitle, b.boardContents, m.youName, b.regTime, b.boardView, b.boardLike FROM myBoard b JOIN myBMember m ON(b.myMemberID = m.myMemberID) ";
    switch($searchOption){
        case "title":
            $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY myBoardID DESC ";
            break;
        case "content":
            $sql .= "WHERE b.boardContents LIKE '%{$searchKeyword}%' ORDER BY myBoardID DESC ";
            break;
        case "name":
            $sql .= "WHERE m.youName LIKE '%{$searchKeyword}%' ORDER BY myBoardID DESC ";
            break;
    }
    // echo $sql;
    $result = $connect -> query($sql);
    // 전체 게시글 갯수
    $totalCount = $result -> num_rows;
    msg($totalCount);
?>
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
    $viewNum = 10;
    $viewLimit = ($viewNum * $page) - $viewNum;
    $sql = $sql."LIMIT {$viewLimit}, {$viewNum}";
    $result = $connect -> query($sql);
    if($totalCount > 0){
        // 위 result 값과 아래 result 값이 다르기 때문에 한번 더 설정
        $count = $result -> num_rows;
        for($i=1; $i <= $count; $i++){
            $info = $result -> fetch_array(MYSQLI_ASSOC);
            echo "<tr>";
            echo "<td>".$info['myBoardID']."</td>";
            echo "<td><a href='boardView.php?myBoardID={$info['myBoardID']}'>".$info['boardTitle']."</a></td>";
            echo "<td>".$info['youName']."</td>";
            echo "<td>".date('Y-m-d', $info['regTime'])."</td>";
            echo "<td>".$info['boardView']."</td>";
            echo "<td>".$info['boardLike']."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>게시글이 없습니다.</td></tr>";
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
    // echo $totalCount;
    // 총 페이지 갯수
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
        echo "<li><a href='boardSearch.php?page=1&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>처음으로</a></li>";
        echo "<li><a href='boardSearch.php?page={$prevPage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>이전</a></li>";
    }
    // 페이지 넘버 표시
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";
        if($i == $page) $active = "active";
        echo "<li class='{$active}'><a href='boardSearch.php?page={$i}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>{$i}</a></li>";
    }
    // 다음 페이지, 마지막 페이지
    if($page != $boardCount){
        $nextPage = $page +1;
        echo "<li><a href='boardSearch.php?page={$nextPage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>다음</a></li>";
        echo "<li><a href='boardSearch.php?page={$boardCount}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>마지막으로</a></li>";
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