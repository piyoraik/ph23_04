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

// 取得idのレコードを取得
function getid_record(){
    $link = db_connect();
    $id = $_GET['id'];
    if(isset($id)){
        $sql = "SELECT * FROM sample2 WHERE id = '".$id."'";
        $result = mysqli_query($link,$sql);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($link);
        return $row;
    }else{
        echo "<script type='text/javascript'>window.close();</script>";
    }
}

// 関数の実行し、結果を$getid_recordに代入
$getid_record = getid_record();

// $getid_recordに値が入っていなかった場合
if(empty($getid_record['id'])){
    $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード: 103)';
    require_once ("./tpl/error.php");
    $getid_record['id'] = '未登録';
    $getid_record['name'] = '未登録';
    $getid_record['age'] = '未登録';
}

require_once("./tpl/detail.php");
?>