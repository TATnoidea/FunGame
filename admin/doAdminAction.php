<?php
require_once '../include.php';
$act=$_REQUEST['act'];
@$id=$_REQUEST['id'];
if($act=="logout"){
    logout();
}elseif($act=="addAdmin"){
    $mes=addAdmin();
}elseif($act=="editAdmin"){
    $mes=editAdmin($id);
}elseif($act=="delAdmin"){
    $mes=delAdmin($id);
}elseif($act=="addUser"){
    $mes=addUser();
}elseif($act=="editUser"){
    $mes=editUser($id);
}elseif($act=="delUser"){
    $mes=delUser($id);
}elseif($act=="addGame"){
    $mes=addGame();
}elseif($act=="editGame"){
    $mes=editGame($id);
}elseif($act=="delGame"){
    $mes=delGame($id);
}elseif($act=="addNews"){
    $mes=addNews();
}elseif($act=="editNews"){
    $mes=editNews($id);
}elseif($act=="delNews"){
    $mes=delNews($id);
} elseif($act=="addReview"){
    $mes=addReview();
}elseif($act=="editReview"){
    $mes=editReview($id);
}elseif($act=="delReview"){
    $mes=delReview($id);
}elseif($act=="addStrategy"){
    $mes=addStrategy();
}elseif($act=="editStrategy"){
    $mes=editStrategy($id);
}elseif($act=="delStrategy"){
    $mes=delStrategy($id);
}elseif($act=="addVideo"){
    $mes=addVideo();
}elseif($act=="editVideo"){
    $mes=editVideo($id);
}elseif($act=="delVideo"){
    $mes=delVideo($id);
}elseif($act=="delVideo"){
    $mes=delVideo($id);
}elseif($act=="delNewsCommit"){
    $mes=delNewsCommit($id);
}elseif($act=="delReviewCommit"){
    $mes=delReviewCommit($id);
}elseif($act=="delVideoCommit"){
    $mes=delVideoCommit($id);
}elseif($act=="delStrategyCommit"){
    $mes=delStrategyCommit($id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
    if($mes){
        echo $mes;
    }
?>
</body>
</html>
