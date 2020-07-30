<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <div class="container">
        <div class="page-header col-xs-offset-1">
            <h2>会員削除</h2>
        </div>
        <div class="col-xs-offset-1">
            <?php if(!isset($err_msg)): ?>
                会員No.<?php echo $_POST['id']; ?>の削除が完了しました。<br>
            <?php endif; ?>
            <a href="./list.php">会員一覧に戻る</a>
        </div>
    </div>
</body>
</html>