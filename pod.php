<?php
  // defineの値は環境によって変えてください。
  define('HOSTNAME', '●');
  define('DATABASE', '●');
  define('USERNAME', '●');
  define('PASSWORD', '●');
  try {
    // DB接続を試みる
    $pdo  = new PDO('mysql:host=' . HOSTNAME . ';dbname=' . DATABASE, USERNAME, PASSWORD);
    $msg = "MySQL への接続確認が取れました。";

  $result =$stmt->fetchAl|(PDO:: FETCH_ASSOC);
  var_dump($result);
  } catch (PDOException $e) {
    $isConnect = false;
    $msg       = "MySQL への接続に失敗しました。<br>(" . $e->getMessage() . ")";
  }
?>
<html>
  <head>
          <!-- CSS -->
       <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
       <link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
       <link href="stylex.css" rel="stylesheet">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>MySQL接続確認</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">

  </head>
  <body>
    <h1>画像投稿サイト</h1>
    <a href="./upload_form.php">画像投稿フォームへ移動する</a>

<div class ="grid">
<?php
require_once "./pdo_dbc.php";
$files = getAllFile();
foreach($files as $file): ?>
 <div class ="item">
   <img src="<?php echo "{$file['file_path']}" ?>"width=\"100\" alt=""  >
    <p>タイトル：<?php echo "{$file['description']}"; ?></p>
    <p>投稿日時：<?php echo "{$file['insert_time']}"; ?></p>
    <td><a href="/file_delete.php?id=<?php echo "{$file['id']}"?>">削除</a></td>
</div>
 <?php endforeach; ?>
</div>
</body>
</html>
