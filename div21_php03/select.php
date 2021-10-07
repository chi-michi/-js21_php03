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
?>



<?php
//２．データ登録SQL作成

$stmt = $db->prepare('SELECT * FROM Items ORDER BY	stime');
$status = $stmt->execute();

//echo($status);
?>


<h1>登録家事一覧</h1>
    <?php

$view = '';
if ($status == false) {
    sql_error($status);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //GETデータ送信リンク作成
        // <a>で囲う。 .=は付け加え！
        $view .= '<p>';
        $view .= '<a href="detail.php?id=' . $result['id'] . '">';
        $view .= $result['stime']. "〜" . $result['ftime'] . '：' . $result['charge'] . $result['housework'];
        $view .= '</a>';
        
        //deleteのためにボタンを作るよ
            $view .= '<a href="delete.php?id=' . $result['id'] . '">';
            $view .= ' [削除] ';
            $view .= '</a>';
            //deleteのためにボタンを作るよここまで
            $view .= '</p>';
    }


}
?>

<!DOCTYPE html>
<html lang="ja">

<!-- <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>フリーアンケート表示</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head> -->

<body id="main">

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron">
            <a href="detail.php"></a>
            <?= $view ?>
        </div>

        <a class="navbar-brand" href="input_ganttchart_copy.php">データ登録</a>
    </div>
    <!-- Main[End] -->

</body>

</html>
