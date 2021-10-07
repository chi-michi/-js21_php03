<link rel="stylesheet" href="style.css">

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
//２．データ取得SQL作成

$stmt = $db->prepare('SELECT * FROM userlist ORDER BY id');
$status = $stmt->execute();

//echo($status);
?>


<h1>ユーザーリスト（管理者画面）</h1>
<?php
$view = '';
if ($status == false) {
    sql_error($status);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //GETデータ送信リンク作成
        // <a>で囲う。 .=は付け加え！
        $view .= '<tr>';
        $view .= '<td>' . $result['name']. '</td>' . '<td>'. $result['email'] . '</td>' . '<td>' . $result['password'] .'</td>'; 
        $view .= '</tr>';
        

    }


}
?>

<!DOCTYPE html>
<html lang="ja">
<body id="main">

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron">
            <table>
            <tr>
            <th>名前</th><th>メールアドレス</th><th>パスワード</th>
            </tr>
            <?= $view ?>    

            </table>
        </div>
    <!-- Main[End] -->

</body>

</html>

