<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";


    
    $myMemberID = $_SESSION['myMemberID'];
    
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

        <section id="board" class="">
            <h2>게시판 수정 영역입니다.</h2>
            <div class="board__inner">
                <div class="boardWrite__title container">
                    <h3><span class="ir">네모네모</span>게시글 수정하기</h3>
                </div>
                <div class="gray board__writeInner">
                    <div class="board__write container">
                        <form action="boardModifySave.php" name="boardModify" method="post">
                            <fieldset>
                                <legend>게시판 작성 영역</legend>
                                <?php
    $myBoardID = $_GET['myBoardID'];
    $sql = "SELECT myBoardID, boardTitle, boardContents, myMemberID FROM myBoard WHERE myBoardID = {$myBoardID}";
    $result = $connect -> query($sql);
    $info = $result->fetch_array(MYSQLI_ASSOC);
    
    if($myMemberID !== $info['myMemberID']){
        echo "<script>alert('내가 작성한 글이 아닙니다.'); history.back(1)</script>";
        exit;
    }

    if($result){
        echo "<div style='display:none'><label class='ir' for='myBoardID'>번호</label><input type='text' name='myBoardID' id='myBoardID' value='".$info['myBoardID']."'></div>";
        echo "<div><label class='ir' for='boardTitle'>제목</label><input type='text' name='boardTitle' id='boardTitle' value='".$info['boardTitle']."'></div>";
    }
?>
                                <!-- <div class="board__modify__fieldset__div">
                                    <input type="text" name="boardTitle" id="boardTitle" placeholder="제목을 입력해주세요!">
                                </div> -->
                                <div class="board__writteLine"></div>
                                <div class="write__setting">
                                    <select name="문단" id="pg">
                                        <option value="1">문단</option>
                                        <option value="2">1</option>
                                        <option value="3">1</option>
                                        <option value="4">1</option>
                                        <option value="5">1</option>
                                    </select>
                                    <select name="폰트스타일" id="fz">
                                        <option value="1">글꼴</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <select name="폰트사이즈" id="fz">
                                        <option value="1">12</option>
                                        <option value="2">11</option>
                                        <option value="3">10</option>
                                        <option value="4">9</option>
                                        <option value="5">8</option>
                                    </select>
                                    <button class="b">B</button>
                                    <button class="i">i</button>
                                </div>
                                <div class="board__writteLine"></div>
                                <?php
    $result = $connect -> query($sql);

    if($result){
        $info = $result->fetch_array(MYSQLI_ASSOC);
        echo "<div><label class='ir' for='boardContents'>내용</label><textarea name='boardContents' id='boardContents' rows='20'>".$info['boardContents']."</textarea></div>";
    }
?>
                                <!-- <div class="board__modify__fieldset__div">
                                    <textarea name="boardContents" id="boardContents" placeholder="글 내용을 입력해주세요!"
                                        rows="20">
사뿐소품 자유게시판입니다. 이 글은 시험용으로 써졌습니다. 잘부탁드립니다. 감사합니다.
                                    </textarea>
                                </div> -->
                                <div class="board__writteLine"></div>
                                <!-- <div class="filebox bs3-primary">
                                    <span>첨부파일1</span>
                                    <input class="upload-name" value="파일선택" disabled="disabled">

                                    <label for="ex_filename">업로드</label>
                                    <input type="file" id="ex_filename" class="upload-hidden">
                                </div>
                                <div class="filebox bs3-primary">
                                    <span>첨부파일2</span>
                                    <input class="upload-name" value="파일선택" disabled="disabled">

                                    <label for="ex_filename">업로드</label>
                                    <input type="file" id="ex_filename" class="upload-hidden">
                                </div> -->
                                <?php
    $result = $connect -> query($sql);

    if($result){
        $info = $result->fetch_array(MYSQLI_ASSOC);
        echo "<div class='writepw'><span>비밀번호</span><label class='ir' for='youPass'>비밀번호</label><input class='pw' type='password' name='youPass' id='youPass' placeholder='로그인 비밀번호를 입력해주세요!'autocomplete='off' required></input></div>";
    }
?>
                                <!-- <div class="filebox bs3-primary">
                                    <span>비밀번호</span>
                                    <input class="text" placeholder="비밀번호를 입력해주세요">
                                </div> -->
                                <button type="submit" class="btn">글 수정하기</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- // footer -->
</body>

</html>