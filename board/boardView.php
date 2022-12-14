<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    
    $myBoardID = $_GET['myBoardID'];

    $BoardSql = "SELECT * FROM myBoard WHERE myBoardID = '$myBoardID'";
    $BoardResult = $connect -> query($BoardSql);
    $BoardInfo = $BoardResult -> fetch_array(MYSQLI_ASSOC);
    
    $commentSql = "SELECT * FROM myComment WHERE myBoardID = '$myBoardID' ORDER BY myCommentID DESC";
    $commentResult = $connect -> query($commentSql);
    $commentInfo = $commentResult -> fetch_array(MYSQLI_ASSOC);
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
<style>
.blog__contents__comment h3 {
    display: inline-block;
    color: #000;
    font-weight: 700;
    margin-top: 10px;
    padding: 1px 10px
}

.comment {
    margin-bottom: 80px
}

.comment__view {
    display: flex;
    align-items: end;
    justify-content: space-between;
    margin-bottom: 10px
}

.comment__view__img {
    width: 10%
}

.comment__view__img img {
    width: 70px;
    height: 70px;
    border-radius: 50%
}

.comment__view__data {
    width: 20%;
    border-bottom: 1px solid #000;
    padding-bottom: 5px;
    font-weight: 300
}

.comment__view__data .name {
    display: block
}

.comment__view__data .data {
    display: block
}

.comment__view__msg {
    width: 70%;
    border-bottom: 1px solid #000;
    line-height: 1.4;
    padding-bottom: 5px
}

.comment__del {
    text-align: right;
    margin-top: -5px;
    line-height: 1.4
}

.comment__del a:hover {
    text-decoration: underline;
    text-underline-position: under
}

.comment__write {
    padding: 20px;
}

.comment__write label {
    position: absolute;
    clip: rect(0 0 0 0);
    width: 1px;
    height: 1px;
    margin: -1px;
    overflow: hidden
}

.comment__write input {
    border: 0;
    padding: 15px 20px;
    border-radius: 50px;
    background-color: #f5f5f5;
}

.comment__write button {
    border: 0;
    background: #4461f2;
    color: #fff;
    border-radius: 30px;
    cursor: pointer
}

.comment__write__info {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap
}

.comment__write__info>* {
    width: 32%;
    box-sizing: border-box
}

.comment__write__msg input {
    width: 100%;
    box-sizing: border-box;
    margin-top: 15px
}
</style>

<body>
    <?php include "../include/header.php" ?>
    <!-- // header -->
    <?php
                      
                      $sql = "UPDATE myBoard SET boardView = boardView + 1 WHERE myBoardID = {$myBoardID}";
                      $connect -> query($sql);
                  
                      $sql = "SELECT b.boardTitle, m.youName, m.blogImgFile, b.regTime, b.boardView FROM myBoard b JOIN myBMember m ON(m.myMemberID = b.myMemberID) WHERE b.myBoardID = {$myBoardID}";
                      $result = $connect -> query($sql);
                  
                      if($result){
                          $info = $result -> fetch_array(MYSQLI_ASSOC);?>
    <main id="main">
        <section id="board" class="board__wrap container">
            <h2>????????? ?????? ???????????????.</h2>
            <div class="board__inner">
                <!-- <div class="board__title">
                    <h3>Free Board</h3>
                    <p>?????? ????????? ????????? ???????????????.</p>
                </div> -->
                <div class="board__view">
                    <!-- <h3>[??????] 2021??? ?????? ?????????????????????.</h3> -->
                    <div class="board__view__head">
                        <div class="prof"><img src="../html/assets/img/profile/<?=$info['blogImgFile']?>" alt=""></div>
                        <div class="viewinfo">

                            <?php
        echo "<h3>".$info['boardTitle']."</h3>";
        echo "<span>".$info['youName']."</span>";
        echo "<span>".date('Y-m-d H:i', $info['regTime'])."</span>";
        echo "<span>????????? ".$info['boardView']."</span>";
    }
?>
                        </div>

                    </div>
                    <div class="board__view__contents">
                        <?php
    

    $sql = "SELECT * FROM myBoard WHERE myBoardID = {$myBoardID}";
    $bresult = $connect -> query($sql);

    if($bresult){
        $binfo = $bresult -> fetch_array(MYSQLI_ASSOC);

        echo "<p>".$binfo['boardContents']."</p>";
        if ($binfo['boardImgFile'] !== "Img_default.jpg"){
            echo "<p><img src='img/".$binfo['boardImgFile']."'></p>";
        }
        // echo "<span class='likes'><a href='#'><img src='../html/assets/img/boardView_disLike@3x.png' alt=''></a>".$binfo['boardLike']."</span>";

    }
?>

                        <!-- <span><a href="#">??????</a>7 </span>
                        <span><a href="#">????</a>4 </span>
                        <span class="tool"><a href="#">????</a></span>
                    </div> -->
                        <!-- <div class="board__view__comment">
                        <div>
                            <img src="https://cdn.imweb.me/thumbnail/20220905/d0de34bf2fde8.jpg" alt="">
                        </div>
                        <div>
                            <div>
                                <span class="name">?????????</span>
                                <span>2021-11-08 20:14</span>
                            </div>
                            <div>
                                <p>??? ????????? ?????????</p>

                            </div>
                            <div class="board__view__comment__modify">
                                <span>?????? /</span>
                                <span>?????? /</span>
                                <span>?????????</span>
                            </div>
                        </div>
                    </div>
                    <div class="board__view__comment comment last">
                        <div class="bvcc">???</div>
                        <div>
                            <img src="https://cdn.imweb.me/thumbnail/20220905/d0de34bf2fde8.jpg" alt="">
                        </div>
                        <div>
                            <div>
                                <span class="name">???????????? ??????</span>
                                <span>2021-11-08 20:14</span>
                            </div>
                            <div>
                                <p>???~ ?????????????????????</p>

                            </div>
                            <div class="board__view__comment__modify">
                                <span>??????</span>
                            </div>
                        </div>
                    </div> -->

                        <!-- <div class="board__view__comment__write">
                        <input type="text" placeholder=" ??????">
                        <input type="password" placeholder=" ????????????">
                        <textarea title="????????? ???????????????" placeholder="????????? ???????????????" rows="1" name="body" id="comment_body" data-action="btn_c_p2021110885356b873902d" data-autosize-on="true" style="overflow: hidden; overflow-wrap: break-word;"></textarea>
                        </textarea>
                        <div class="board__view__comment__write__imging"></div>
                        <div class="board__view__comment__write__btn">??????</div>
                    </div> -->
                    </div>
                    <!-- <div class="board__view__updownlist">
                    <div><span>???</span> [??????] ????????? ????????? ????????????</div>
                    <div><span>???</span> 7??? ?????? ????????? ???????????????.</div>
                </div> -->
                    <div class="blog__contents__comment">
                        <h3>??????</h3>
                        <?php


    foreach($commentResult as $comment){ ?>
                        <div class="comment" id="comment<?=$comment['myCommentID']?>">
                            <div class="comment__view">
                                <div class="comment__view__img">
                                    <img src="https://cdn.imweb.me/thumbnail/20220905/d0de34bf2fde8.jpg" alt="dd">
                                </div>
                                <div class="comment__view__data">
                                    <span class="name"><?=$comment['commentName']?></span>
                                    <span class="date"><?=date('Y-m-d', $comment['regTime'])?></span>
                                </div>
                                <div class="comment__view__msg">
                                    <?=$comment['commentMsg']?>
                                </div>
                            </div>
                            <div class="comment__del">
                                <a href="#" class="comment__del__del">??????</a>
                                <a href="#" class="comment_del__mod">??????</a>
                            </div>
                        </div>
                        <?php } ?>

                        <div class="comment__delete" style="display: none">
                            <label for="commentDeletePass">????????????</label>
                            <input type="text" id="commentDeletePass" name="commentDeletePass">
                            <button id="commentDeleteCancel">??????</button>
                            <button id="commentDeleteButton">??????</button>
                        </div>
                        <div class="comment__modify" style="display: none">
                            <label for="commentModifyMsg">?????? ??????</label>
                            <input type="text" id="commentModifyMsg" name="commentModifyMsg">
                            <label for="commentModifyPass">????????????</label>
                            <input type="text" id="commentModifyPass" name="commentModifyPass">
                            <button id="commentModifyCancel">??????</button>
                            <button id="commentModifyButton">??????</button>
                        </div>
                        <div class="comment__write">
                            <div class="comment__write__info">
                                <label for="commentName">??????</label>
                                <input type="text" id="commentName" name="commentName" placeholder="??????">
                                <label for="commentPass">????????????</label>
                                <input type="text" id="commentPass" name="commentPass" placeholder="????????????">
                                <button type="submit" id="commentBtn">?????? ??????</button>
                            </div>
                            <div class="comment__write__msg">
                                <label for="commentWrite">??????</label>
                                <input type="text" id="commentWrite" name="commentWrite" placeholder="????????? ????????????!">
                            </div>
                        </div>
                    </div>
                    <!-- //blog__contents__comment -->
                    <div class="board__view__btn">
                        <a class="modify" href="boardModify.php?myBoardID=<?=$myBoardID?>">????????????</a>
                        <a class="delete" href="boardRemove.php?myBoardID=<?=$myBoardID?>" onclick="async()">????????????</a>
                        <a class="list" href="board.php">????????????</a>
                    </div>
                </div>
        </section>
        <!-- //board -->


    </main>
    <!-- //main -->


    <?php include "../include/footer.php" ?>
    <!-- // footer -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
    const commentName = $("#commentName"); //?????? ??????
    const commentPass = $("#commentPass"); //?????? ????????????
    const commentWrite = $("#commentWrite"); //?????? ??????

    let commentID = "";

    // ?????? ?????? ?????? ?????????
    $(".comment__del__del").click(function(e) {
        e.preventDefault();
        // alert("?????? ?????? ?????? ?????????");
        $(".comment__delete").css("display", "block");

        // ??????????????? ?????? ???????????? ????????????
        commentID = $(this).parent().parent().attr("id");
    })

    // ?????? ?????? ?????? > ?????? ?????? ?????????
    $("#commentDeleteCancel").click(function() {
        $(".comment__delete").hide();
    })

    // ?????? ?????? ?????? > ?????? ?????? ?????????
    $("#commentDeleteButton").click(function() {
        let number = commentID.replace(/[^0-9]/g, "");
        if ($("#commentDeletePass").val() == '') {
            alert("?????? ????????? ??????????????? ???????????????!");
            $("#commentDeletePass").focus();
        } else {
            $.ajax({
                url: "boardCommentDelete.php",
                method: "POST",
                dataType: "json",
                data: {
                    "pass": $("#commentDeletePass").val(),
                    "commentID": number
                },
                success: function(data) {
                    console.log(data);
                    location.reload();
                },
                error: function(request, status, error) {
                    console.log("request" + request);
                    console.log("status" + status);
                    console.log("error" + error);
                }
            })
        }
    })

    // ?????? ?????? ?????? ?????????
    $(".comment_del__mod").click(function(e) {
        e.preventDefault();
        // alert("?????? ?????? ?????? ?????????");
        $(".comment__modify").slideDown();
        commentID = $(this).parent().parent().attr("id");
    })

    // ?????? ?????? ?????? > ?????? ??????
    $("#commentModifyCancel").click(function(e) {
        e.preventDefault();
        $(".comment__modify").hide();
    })

    // ?????? ?????? ?????? > ?????? ??????
    $("#commentModifyButton").click(function(e) {
        e.preventDefault();
        let number = commentID.replace(/[^0-9]/g, "");

        if ($("#commentModifyMsg").val() == '' || $("#commentModifyPass").val() == '') {
            alert("?????? ?????? ??? ??????????????? ??????????????????!");
            $("#commentModifyMsg").focus();
        } else {
            $.ajax({
                url: "boardCommentModify.php",
                method: "POST",
                dataType: "json",
                data: {
                    "msg": $("#commentModifyMsg").val(),
                    "pass": $("#commentModifyPass").val(),
                    "commentID": number
                },
                success: function(data) {
                    console.log(data);
                    location.reload();
                },
                error: function(request, status, error) {
                    console.log("request" + request);
                    console.log("status" + status);
                    console.log("error" + error);
                }
            })
        }
    })

    // ?????? ??????
    $("#commentBtn").click(() => {
        if ($("#commentWrite").val() == "") {
            alert("????????? ????????????!")
            $("#commentWrite").focus();
        } else {
            $.ajax({
                url: "boardCommentWrite.php",
                method: "POST",
                dataType: "json",
                data: {
                    "boardID": <?=$myBoardID?>,
                    "name": commentName.val(),
                    "pass": commentPass.val(),
                    "msg": commentWrite.val()
                },
                success: function(data) {
                    console.log(data);
                    location.reload();
                },
                error: function(request, status, error) {
                    console.log("request" + request);
                    console.log("status" + status);
                    console.log("error" + error);
                }
            });
        }
    });
    </script>
</body>

</html>