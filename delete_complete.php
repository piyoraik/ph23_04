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

// 取得idのレコードを取得し削除
function getid_record(){
    $link = db_connect();
    @$id  = $_POST['id'];
    @$ext = $_POST['ext'];
    if(!empty($id) || !empty($ext)){
        $sql = "DELETE FROM sample2 WHERE id = '".$id."'";
        mysqli_query($link,$sql);
        mysqli_close($link);
        if(file_exists("./img/${id}.${ext}")){
            unlink("./img/${id}.${ext}");
        }else{
            $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード: 103)';
            require_once ("./tpl/error.php");
            return false;
        }
        $err_msg = NULL;
    }else{
        $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード: 103)';
        require_once ("./tpl/error.php");
        return false;
    }
}

// 関数の実行
getid_record();

require_once("./tpl/delete_complete.php");
?>