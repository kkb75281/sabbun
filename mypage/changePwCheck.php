<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html><?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $youPass = $_POST['youPass'];
    $myMemberID = $_SESSION['myMemberID'];

    $sql = "UPDATE myBMember SET youPass = '{$youPass}' WHERE myMemberID = '{$myMemberID}'";
    $connect -> query($sql);
    
    echo '<script type="text/javascript">'; 
    echo 'alert("비밀번호가 수정됐습니다.");'; 
    echo 'window.location.href = "../login/login.php";';
    //echo 'history.back(1)';
    echo '</script>';


    
?>