<?php
function h($str) {
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
?>

<?php
try {
    $db = new PDO('mysql:dbname=HWgantt;host=localhost;charset=utf8',
    'root', 'root');
}catch(PDOException $e){
    echo 'DB接続エラー： '. $e->getMessage();
}

$id = $_GET['id'];
//echo($id);

?>


<?php
//２．データ登録SQL作成

$stmt = $db->prepare('SELECT * FROM Items WHERE id ='. $id . ';');
$status = $stmt->execute();

//echo($status);

?>


<h1>登録家事一覧</h1>
    <?php

$view = '';
if ($status == false) {
    sql_error($status);
} else {
    $row =$stmt -> fetch();
    }
?>

<!DOCTYPE html>
<html lang="ja">


<body id="main">

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron">
        <?php
        $field_data=['自分時間'=>'自分時間',
                        '食事'=>'食事',
                        '洗濯'=>'洗濯',
                        '掃除'=>'掃除',
                        '育児'=>'育児'       
       ];
       foreach($field_data as $field_data_key => $field_data_val){
        $field_data .= "<option value='". $field_data_key;
        $field_data .= "'>". $field_data_val. "</option>";
    }
    ?>
    <form action="update2.php" method="post">
        
        <p>家事分野 <select name ="field" >
            <?php echo $field_data; ?></select></p>
        <p><textarea name ="housework" cols="50" rows="2"  ><?= $row['housework'] ?></textarea></p>
        <p><textarea name ="charge" cols="50" rows="2"  ><?= $row['charge'] ?></textarea></p>
        <p>開始時刻 <input type="time" name ="stime" cols="50" rows="2" value="<?= $row['stime'] ?>"></input></p>
        <p>終了時刻 <input type="time" name ="ftime" cols="50" rows="2" value="<?= $row['ftime'] ?>"></input></p>
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <button type="submit">更新</button>
    </form>

    </div>
    <!-- Main[End] -->

</body>

</html>

ーーーーーー

