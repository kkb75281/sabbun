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
        <section id="board" class="">
            <h2>게시판 영역입니다.</h2>
            <div class="board__inner">
                <div class="boardWrite__title container">
                    <h3><span class="ir">네모네모</span>게시글 작성하기</h3>
                </div>
                <div class="gray board__writeInner">
                    <div class="board__write container">
                        <form action="boardWriteSave.php" name="boardWrite" method="post">
                            <fieldset>
                                <legend>게시판 작성 영역</legend>
                                <div class="board__modify__fieldset__div">
                                    <input type="text" name="boardTitle" id="boardTitle" placeholder="제목을 입력해주세요!">
                                </div>
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
                                <div class="board__modify__fieldset__div">
                                    <textarea name="boardContents" id="boardContents" placeholder="글 내용을 입력해주세요!"
                                        rows="20"></textarea>
                                </div>
                                <div class="board__writteLine3"></div>
                                <!-- 파일 업로드 -->
                                <div class="filebox bs3-primary">
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
                                </div>
                                <!-- 비밀번호 -->
                                <!-- <div class="filebox bs3-primary">
                                    <span>비밀번호</span>
                                    <input class="text" placeholder="비밀번호를 입력해주세요">
                                </div> -->
                                <button type="submit" class="btn">업로드</button>
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