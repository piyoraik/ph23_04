<?php
// データベース接続
function db_connect(){
    require_once("../const.php");
    $link = @mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
    if(!$link){
        $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード: 103)';
        require_once ("./tpl/error.php");
        return false;
    }
    mysqli_set_charset($link, 'utf8');
    return $link;
}

// すべてのレコードを取得
function db_list(){
    $link = db_connect();
    $sql = "SELECT * FROM sample2";
    $result = mysqli_query($link,$sql);
    if(!$result){
        mysqli_close($link);
        $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード：104)';
        require_once './tpl/error.php';
        return false;
    }
    $row = mysqli_fetch_all($result);
    mysqli_close($link);
    return $row;
}

// 関数を実行
$dblist = db_list();

require_once ("./tpl/list.php");
?>
