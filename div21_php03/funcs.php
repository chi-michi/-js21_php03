<!-- BootStrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<!-- BootStrap以上 -->

<!-- XSS対応 -->
<?php
function h($str) {
return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
?>

<!-- DB接続処理 -->
<?php
function db_conn() {
    try {
        $db = new PDO('mysql:dbname=HWgantt;host=localhost;charset=utf8',
        'root', 'root');
        
        return $db;
    }catch(PDOException $e){
        echo 'DB接続エラー： '. $e->getMessage();
    }
}
?>

<?php
function db_conn2() {
try {
    $db_name = 'HWgantt';    //データベース名
    $db_id   = 'root';      //アカウント名
    $db_pw   = 'root';      //パスワード：XAMPPはパスワード無しに修正してください。
    $db_host = 'localhost'; //DBホスト
    $pdo = new PDO('mysql:dbname=' . $db_name . ';' . 'host=' . $db_host . ';' .'charset=utf8;'.$db_id, $db_pw);
    return $pdo;  //PDO;リターンちゃんと入れる！！！関数化の時は。

}catch(PDOException $e){
    echo 'DB接続エラー： '. $e->getMessage();

}


//SQLエラー関数：sql_error($stmt)
function sql_error($stmt) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
}



//リダイレクト関数: redirect($file_name)
function redirect($file_name){
    exit();
}

?>