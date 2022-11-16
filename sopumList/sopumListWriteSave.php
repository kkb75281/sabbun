<?php 
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $myMemberID = $_SESSION['myMemberID'];      //회원가입한 사람만 쓸 수 있도록

    $shopImgFile = $_FILES['shopProfile'];
    $shopImgSize = $_FILES['shopProfile']['size'];
    $shopImgType = $_FILES['shopProfile']['type'];
    $shopImgName = $_FILES['shopProfile']['name'];
    $shopImgTmp = $_FILES['shopProfile']['tmp_name'];

    $shopListView = 1;
    $shopListLike = 0;

    $regTime = time();

    $shopListContents = $_POST['shopListContents'];

    $shopName = $_POST['shopName'];
    $shopHours = $_POST['shopHours'];
    $shopNum = $_POST['shopNum'];
    $goodsList = $_POST['goodsList'];
    $shopAdress = $_POST['shopAdress'];
    $shopTag = $_POST['shopTag'][0];
    //$shopTag = $_POST['shopTag'][1];
    //$shopTag = $_POST['shopTag'][2];
    $best = $_POST['best'];
    $new = $_POST['new'];


    $shopName = $connect -> real_escape_string($shopName);
    $shopHours = $connect -> real_escape_string($shopHours);
    $shopNum = $connect -> real_escape_string($shopNum);
    $goodsList = $connect -> real_escape_string($goodsList);
    $shopAdress = $connect -> real_escape_string($shopAdress);
 
    var_dump($_POST);

    if($shopImgType){
        $fileTypeExtension = explode("/", $shopImgType);
        $fileType = $fileTypeExtension[0];      //image
        $fileExtension = $fileTypeExtension[1]; //png
        //이미지 타입 확인
        if($fileType == "image"){
            if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
                $shopImgDir = "img/";
                $shopImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";
                
                //echo "이미지 파일이 맞네요!";
                $sql = "INSERT INTO sopumShopList(myMemberID, shopListContents, shopListView, shopListLike, regTime, shopName, shopHours, shopNum, goodsList, shopAdress, shopImgFile, shopImgSize, shopTag, best, new) VALUES('$myMemberID','$shopListContents', '$shopListView', '$shopListLike', '$regTime', '$shopName' , '$shopHours', '$shopNum', '$goodsList', '$shopAdress', '$shopImgName', '$shopImgSize', '$shopTag', '$best', '$new')";
            } 
        }else {
            echo '<script type="text/javascript">'; 
            echo 'alert("지원하는 이미지 파일이 아닙니다.");'; 
            echo 'history.back(1)';
            echo '</script>';
            exit;
        }
    } else {
        echo '<script type="text/javascript">'; 
        echo 'alert("사진을 첨부하지 않았습니다.");'; 
        echo 'history.back(1)';
        echo '</script>';
        exit;
        //$sql = "INSERT INTO sopumShopList(myMemberID, shopListContents, shopListView, shopListLike, regTime, shopName, shopHours, shopNum, goodsList, shopAdress, shopImgFile, shopImgSize, shopTag, best, new) VALUES('$myMemberID','$shopListContents', '$shopListView', '$shopListLike', '$regTime', '$shopName' , '$shopHours', '$shopNum', '$goodsList', '$shopAdress', 'Img_default.jpg', '$shopImgSize', '$shopTag' '$best', '$new')";
    }
    //이미지 사이즈 확인
    if($shopImgSize > 1000000){
        echo '<script type="text/javascript">'; 
        echo 'alert("이미지 용량이 1메가를 초과했습니다.");'; 
        echo 'history.back(1)';
        echo '</script>';
        exit;
    }else{
        "<script>alert('소품샵 정보가 등록됐습니다.');</script>";
        Header("Location: sopumList.php");
        $result = $connect -> query($sql);
        $result = move_uploaded_file($shopImgTmp, $shopImgDir.$shopImgName);
    }

    
    ?>