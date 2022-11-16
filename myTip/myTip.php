<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    //$myMemberID = $_SESSION['myMemberID'];

    // $mySql = "SELECT * FROM myBMember";
    // $myResult = $connect -> query($mySql);
    // $myInfo = $myResult -> fetch_array(MYSQLI_ASSOC);


    $tipSql = "SELECT * FROM myTip ORDER BY myTipID DESC";
    $tipResult = $connect -> query($tipSql);
    $tipInfo = $tipResult -> fetch_array(MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>자주묻는질문</title>

    <link rel="stylesheet" href="../html/assets/css/fonts.css">
    <link rel="stylesheet" href="../html/assets/css/common.css">
    <link rel="stylesheet" href="../html/assets/css/reset.css">
    <link rel="stylesheet" href="../html/assets/css/header.css">
    <link rel="stylesheet" href="../html/assets/css/myTip.css">
    <link rel="stylesheet" href="../html/assets/css/footer.css">
</head>
<style>
.tipBox #tipDeleteButton {
    display: none;
    position: absolute;
    top: 20px;
    left: 0;
    background: #4461f2;
    font-size: 20px;
    padding: 6px 10px;
    color: #fff;
    border-radius: 10px;
}


.tipBox>span {
    position: relative;
}

.tipBox>span>i {
    font-style: normal;
    padding: 10px 15px;
    background: #4461f2;
    color: #fff;
    font-family: "NanumSquare";
    border-radius: 5px;
}

.tipBox>span:hover #tipDeleteButton {
    display: block;
    cursor: pointer;
}
</style>

<body>
    <?php include "../include/header.php" ?>
    <!-- // header -->

    <main>
        <section id="myTip" class="myTip nanum">
            <h2>나만의 팁</h2>
            <p class="container">
                나만의 팁 게시판에서 여러분들이 원하는 정보를 자유롭게 얻고, 자유롭게
                공유하세요!
            </p>
            <div class="myTip__inner">
                <?php
        foreach($tipResult as $tip){
          $i += 1; 
          if($i == 3){$i = 1;}?>
                <div class="tipBox t<?echo $i;?>">

                    <span>
                        <img src="../html/assets/img/myTip_icon<?echo $tip['rcvSlct']?>.svg" alt="icon1" />
                        <a href="myTipDelete.php?myTipID=<?echo $tip['myTipID']?>" id="tipDeleteButton">X</a>
                        <i>
                            <?echo $tip['tipName']?>
                        </i>
                    </span>

                    <p>
                        <?echo $tip['tipMsg']?>
                    </p>
                </div>
                <?php
        }?>
                <!-- <div class="tipBox t1">
            <span
              ><img src="../html/assets/img/myTip_icon.svg" alt="icon1"
            /></span>

            <p>
              다이어리 꾸미기를 할 때, 스티커를 집기가 힘들면, "스티커 핀셋" 을
              이용해보세요!
            </p>
          </div>
          <div class="tipBox t2">
            <p>
              물건이 많은 방, 어지럽기만 하고 정리가 안 된다? "공간 분리"를
              해보세요!
            </p>
            <span
              ><img src="../html/assets/img/myTip_icon3.svg" alt="icon2"
            /></span>
          </div>
          <div class="tipBox t3">
            <span
              ><img src="../html/assets/img/myTip_icon2.svg" alt="icon3"
            /></span>
            <p>
              어려워보이는 제로웨이스트, 할 게 많아보일땐? 하나하나 차근차근!<br />
              먼저 "스테인리스 빨대" 부터 시작해보세요!
            </p>
          </div>
          <div class="tipBox t4">
            <p>
              이열 할말이 없는데~ 무슨 말을 할까 고민될땐? 헛소리를
              적어보세요!<br />나중에 수정할거랍니다! 호롤롤롤로!
            </p>
            <span
              ><img src="../html/assets/img/myTip_icon4.svg" alt="icon4"
            /></span>
          </div> -->

                <div class="myTip__Write__inner">
                    <div class="myTip__wirte">
                        <label for="myTip__Write"></label>
                        <input id="myTip__Write" type="text" placeholder="자신만의 팁을 마음껏 적어주세요!" />
                        <div class="profile__Img">
                            <div class="profile__select">
                                <!-- <span class="myTip__profileImg__Select">프로필 선택</span> -->
                                <label for="myTip__profileImg__Select"><input type="radio" name="radio" value="1"
                                        checked /><img src="../html/assets/img/myTip_icon1.svg" alt="icon1" /></label>
                                <label for="myTip__profileImg__Select"><input type="radio" name="radio" value="2" /><img
                                        src="../html/assets/img/myTip_icon2.svg" alt="icon2" /></label>
                                <label for="myTip__profileImg__Select"><input type="radio" name="radio" value="3" /><img
                                        src="../html/assets/img/myTip_icon3.svg" alt="icon3" /></label>
                                <label for="myTip__profileImg__Select"><input type="radio" name="radio" value="4" /><img
                                        src="../html/assets/img/myTip_icon4.svg" alt="icon4" /></label>
                            </div>
                            <!-- <div class="profile__Upload">
                                <label for="myTip__profileImg__Upload"> -->
                            <!-- <span>프로필 직접 지정</span> -->
                            <!-- <div class="myTip__profileImg__Upload"></div>
                                </label>
                                <input id="myTip__profileImg__Upload" type="file" />
                            </div> -->
                            <button type="submit" id="tipBtn">글쓰기</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="more"><a href="#c">더보기<span></span></a></div> -->
        </section>
    </main>

    <?php include "../include/footer.php" ?>
    <!-- // footer -->

    <script src="../assets/js/custom.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
    const myTip__Write = $("#myTip__Write"); //댓글 내용



    // 삭제 버튼 클릭시
    // $("#tipDeleteButton").click((e) => {
    //     // e.preventDefault();
    //     // myTipID = $(this).parent().parent();

    //     if () {
    //         alert("내가 쓴 글이 아닙니다!")
    //         // } else {
    //         //     $.ajax({
    //         //         url: "myTipDelete.php",
    //         //         method: "GET",
    //         //         dataType: "json",
    //         //         data: {
    //         //             "myTipID": $('#tipDeleteButton').val()
    //         //         },
    //         //         success: function(data) {
    //         //             console.log(data);
    //         //             location.reload();
    //         //         },
    //         //         error: function(request, status, error) {
    //         //             console.log("request" + request);
    //         //             console.log("status" + status);
    //         //             console.log("error" + error);
    //         //         }
    //         //     });
    //     }
    // });

    
    $("#tipBtn").click(() => {
        if ($("#myTip__Write").val() == "") {
            alert("댓글을 써주세요!")
            $("#myTip__Write").focus();
        } else {
            $.ajax({
                url: "myTipWrite.php",
                method: "POST",
                dataType: "json",
                data: {
                    "msg": myTip__Write.val(),
                    "rcvSlct": $('[name=radio]:checked').val()

                },
                success: function(data) {
                    console.log(data);
                    location.reload();
                },
                error: function(request, status, error) {
                    console.log("request" + request);
                    console.log("status" + status);
                    alert("로그인이 필요합니다.");
                }
            });
        }
    });
    </script>
</body>

</html>