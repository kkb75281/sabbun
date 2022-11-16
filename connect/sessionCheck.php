<?php
    if(!isset($_SESSION['myMemberID'])){
        // 로그인 페이지 이동
        echo '<script type="text/javascript">'; 
        echo 'alert("로그인 해주세요.");'; 
        echo 'window.location.href = "../login/login.php";';
        echo '</script>';

    }
?>