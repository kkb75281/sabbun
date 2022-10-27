<?php 
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $youPhone = $_POST['youPhone'];
    $youPass = $_POST['youPass'];
    $myMemberID = $_SESSION['myMemberID'];
    $youEmail = $_SESSION['youEmail'];

    // 데이터 가져오기 --> 유효성 검사 --> 데이터 조회 --> 로그인
    $sql = "SELECT myMemberID, youName, youNickName, youEmail, youPass, youPhone, blogImgFile, blogImgSize FROM myBMember WHERE myMemberID = {$myMemberID}";
    $result = $connect -> query($sql);
    $info = $result -> fetch_array(MYSQLI_ASSOC);


    function msg($alert){
        echo "<p class='alert'>{$alert}</p>";
    }

   // 비밀번호 검사

   if($info['youPass'] == $youPass){
        echo "비밀번호 일치";
        $sql = "UPDATE myBMember SET youPhone = '{$youPhone}' WHERE myMemberID = '{$myMemberID}'";
        $connect -> query($sql);  

    }else{
        echo "<script>alert('비밀번호가 틀렸습니다.'); history.back(1)</script>";
        exit;
    }

  
    $blogImgFile = $_FILES['blogFile'];
    $blogImgSize = $_FILES['blogFile']['size'];
    $blogImgType = $_FILES['blogFile']['type'];
    $blogImgName = $_FILES['blogFile']['name'];
    $blogImgTmp = $_FILES['blogFile']['tmp_name'];


    //이미지 파일명 확인
    if($blogImgType){
        $fileTypeExtension = explode("/", $blogImgType);
        $fileType = $fileTypeExtension[0];      //image
        $fileExtension = $fileTypeExtension[1]; //png
        //이미지 타입 확인
        if($fileType == "image"){
            if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
                $blogImgDir = "../html/assets/img/profile/";
                $blogImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";
                //echo "이미지 파일이 맞네요!";
                $sql = "UPDATE myBMember SET blogImgFile = '{$blogImgName}', blogImgSize = '{$blogImgSize}' WHERE myMemberID = '{$myMemberID}'";
                $result2 = $connect -> query($sql);
                $result2 = move_uploaded_file($blogImgTmp, $blogImgDir.$blogImgName);

            } else {
                echo "<script>alert('지원하는 이미지 파일이 아닙니다.'); history.back(1)</script>";
                exit;
            }
        }
    }else {
        echo "<p>프로필 사진을 첨부하지 않았습니다. <br> 마이 페이지에서 추가 해주세요!</p>";
        
    }

    //이미지 사이즈 확인
    if($blogImgSize > 1000000){
        echo "<script>alert('이미지 용량이 1메가를 초과했습니다.'); history.back(1)</script>";
        exit;
    }else{
        "<script>alert('회원 정보가 수정됐습니다.');</script>";
        Header("Location: ../main/main.php");
    }

   
    


?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.min.js"></script>

<script>



</script>