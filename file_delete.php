<?php
  require_once "./pdo_dbc.php";

  $get_id = $_GET['id'];
  // 削除フラグを1(削除)にする
  $result = updateFileFlg($get_id);
  if($result){
    echo '画像を削除しました';
  }
?>

<p><a href="./pod.php">戻る</a></p>
