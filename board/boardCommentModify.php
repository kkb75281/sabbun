<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $commentMsg = $_POST['msg'];
    $commentPass = $_POST['pass'];
    $commentID = $_POST['commentID'];

    
    
    
    $comsql = "SELECT commentPass FROM myComment WHERE mycommentID = {$commentID}";
    $comresult = $connect -> query($comsql);
    $info = $comresult->fetch_array(MYSQLI_ASSOC);
    
    if($commentPass == $info['commentPass']){
        $sql = "UPDATE myComment SET commentMsg = '{$commentMsg}' WHERE myCommentID = '{$commentID}'";
        $result = $connect -> query($sql);
        echo json_encode(array("info" => $commentID));
    }else{
        echo '<script type="text/javascript">'; 
        echo 'alert("댓글 비밀번호가 틀립니다.");'; 
        echo '</script>';
    }


    

   
?>