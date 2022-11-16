<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";



    
    $boardImgFile = $_FILES['boardFile'];
    $boardImgSize = $_FILES['boardFile']['size'];
    $boardImgType = $_FILES['boardFile']['type'];
    $boardImgName = $_FILES['boardFile']['name'];
    $boardImgTmp = $_FILES['boardFile']['tmp_name'];

    echo "<pre>";
    var_dump($boardImgFile);
    echo "</pre>";
    
    

    $boardTitle = $_POST['boardTitle'];
    $boardContents = $_POST['boardContents'];
    $boardTitle = $connect -> real_escape_string($boardTitle);
    $boardContents = $connect -> real_escape_string($boardContents);
    $boardView = 1;
    $boardLike = 0;
    $regTime = time();
    $myMemberID = $_SESSION['myMemberID'];      //회원가입한 사람만 쓸 수 있도록


    if($boardImgType){
        $fileTypeExtension = explode("/", $boardImgType);
        $fileType = $fileTypeExtension[0];      //image
        $fileExtension = $fileTypeExtension[1]; //png
        //이미지 타입 확인
        if($fileType == "image"){
            if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
                $boardImgDir = "img/";
                $boardImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";
                //echo "이미지 파일이 맞네요!";
                $sql = "INSERT INTO myBoard(myMemberID, boardTitle, boardContents, boardView, boardLike, regTime, boardImgFile, boardImgSize) VALUES('$myMemberID','$boardTitle', '$boardContents', '$boardView', '$boardLike', '$regTime', '$boardImgName' , '$boardImgSize')";
            } 
        }else {
            echo "<script>alert('지원하는 이미지 파일이 아닙니다.'); history.back(1)</script>";
            exit;
        }
    } else {
        echo "<p>사진을 첨부하지 않았습니다.</p>";
        $sql = "INSERT INTO myBoard(myMemberID, boardTitle, boardContents, boardView, boardLike, regTime, boardImgFile, boardImgSize) VALUES('$myMemberID','$boardTitle', '$boardContents', '$boardView', '$boardLike', '$regTime', 'Img_default.jpg' , '$boardImgSize')";
    }
    //이미지 사이즈 확인
    if($boardImgSize > 1000000){
        echo "<script>alert('이미지 용량이 1메가를 초과했습니다.'); history.back(1)</script>";
        exit;
    }
    $result = $connect -> query($sql);
    $result = move_uploaded_file($boardImgTmp, $boardImgDir.$boardImgName);
    
    Header("Location: board.php");



?>