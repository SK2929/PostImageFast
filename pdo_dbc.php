<?php

function pdo_dbc(){
  define('HOSTNAME', '●');
  define('DATABASE', '●');
  define('USERNAME', '●');
  define('PASSWORD', '●');

  // DB接続を試みる
  try {
    $pdo  = new PDO('mysql:host=' . HOSTNAME . ';dbname=' . DATABASE, USERNAME, PASSWORD,
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  return $pdo;
  } catch (PDOException $e) {
    exit($e->getMessage());
  }
}

/**
 * ファイルデータを保存
 * @param string $file_name ファイル名
 * @param string $save_path ファイルパス
 * @param string $caption キャプション
 */
function fileSave($file_name, $save_path, $caption){
  $result = False;

  $sql = "INSERT INTO image_table (title, file_path, description) VALUE (?, ?, ?)";

  try {
    $stmt = pdo_dbc()->prepare($sql);
    $stmt->bindValue(1, $file_name);
    $stmt->bindValue(2, $save_path);
    $stmt->bindValue(3, $caption);
    $result = $stmt->execute();
    return $result;
  } catch(\Eception $e) {}
  echo $e->getMessage();
  return $result;
}

function getAllFile(){
  //sqlの準備
  $sql = "SELECT  * FROM image_table WHERE del_flg = 0";
  //sqlの実行
  $fileData = pdo_dbc()->query($sql);
  return $fileData;
}

// 削除フラグを1(削除)に設定する
function updateFileFlg($id){
  //idチェック
  if(empty($id)){
    exit('idが不正です');
  }

  $sql = "UPDATE image_table SET del_flg = 1 WHERE id = :id";

  $stmt = pdo_dbc()->prepare($sql);
  $stmt->bindValue(":id", (int)$id, \PDO::PARAM_INT);
  $result = $stmt->execute();
  return $result;
}
