<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <h1>やるべき家事と分担の入力画面</h1>

    
        
        
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
    <form action="input_do.php" method="post">
        
        <p>家事分野 <select name ="field" >
            <?php echo $field_data; ?></select></p>
        <p><textarea name ="housework" cols="50" rows="2" placeholder="家事の内容を記入してください"></textarea></p>
        <p><textarea name ="charge" cols="50" rows="2" placeholder="担当する人を入力してください"></textarea></p>
        <p>開始時刻 <input type="time" name ="stime" cols="50" rows="2" placeholder="開始時刻を00:00:00（時間:分:秒）の形式で記入してください"></input></p>
        <p>終了時刻 <input type="time" name ="ftime" cols="50" rows="2" placeholder="終了時刻を00:00:00（時間:分:秒）の形式で記入してください"></input></p>
        <button type="submit">登録する</button>
    </form>


</body>
</html>