
<?php
try {
    $db = new PDO('mysql:dbname=HWgantt;host=localhost;charset=utf8',
    'root', 'root');
}catch(PDOException $e){
    echo 'DB接続エラー： '. $e->getMessage();
}
?>

<?php
//POSTデータ取得
$id = $_POST['id'];
$field = $_POST['field'];
$housework = $_POST['housework'];
$charge = $_POST['charge'];
$stime = $_POST['stime'];
$ftime = $_POST['ftime'];
$sdate = $_POST['sdate'];
$fdate = $_POST['fdate'];

//echo($charge);
//ここまで値は取得できている

//２．データ更新SQL作成

$db->exec("UPDATE Items  
    SET 
        field= '. $_POST[field].', 
        housework=' . $_POST[housework]. ' , 
        charge=' . $_POST[charge]. ' , 
        stime=' . $_POST[stime]. ', 
        ftime=' . $_POST[ftime]. '  
    WHERE id = :id "
);



echo 'メッセージが更新されました';

?>

<a href =select.php> 登録家事一覧画面に戻る</a>


