<?php
try {
    $db = new PDO('mysql:dbname=HWgantt;host=localhost;charset=utf8',
    'root', 'root');
}catch(PDOException $e){
    echo 'DB接続エラー： '. $e->getMessage();
}

$id = $_GET['id'];

//２．データ登録SQL作成 prepareの後に削除するSQLを書く 書くSQLは・・・
// DELETE
// FROM
// テーブル名
// WHERE　場所　＝値

$stmt = $db->prepare('DELETE FROM Items WHERE id = :id;');
$stmt -> bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();



//３．データ表示
// $view = '';
// if ($status == false) {
//     sql_error($status);
// } else {
//     redirect('select.php');
// }

if ($status == false) {
    $error = $stmt -> errorInfo();
    exit('SQLError:' . print_r($error, true));
    // sql_error($stmt);
} else {
    header('Location: select.php');
    exit();
    // redirect('index.php');
}



?>
