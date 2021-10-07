<!-- DB接続処理 -->
<?php
// require_once('funcs.php');
// $db = db_conn();
try {
    $db = new PDO('mysql:dbname=HWgantt;host=localhost;charset=utf8',
    'root', 'root');
}catch(PDOException $e){
    echo 'DB接続エラー： '. $e->getMessage();

}

// <!-- DB接続処理以上 -->

$db->exec('INSERT INTO Items SET field="' . $_POST['field']. ' ", housework="' . $_POST['housework']. ' ", charge="' . $_POST['charge']. ' ", stime="' . $_POST['stime']. ' ", ftime="' . $_POST['ftime']. ' "');
echo 'メッセージが登録されました';

?>

<a href="input_ganttchart_copy.php">入力画面に戻る</a>

