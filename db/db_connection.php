<?php
$envFile = __DIR__ . '/.env';
if (file_exists($envFile)) {
    $env = file_get_contents($envFile);
    $env = preg_split('/\v+/', $env); // 行ごとに分割

    foreach ($env as $line) {
        $line = trim($line);
        if (!empty($line) && strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $_ENV[$key] = $value;
            putenv("$key=$value");
        }
    }
} 


//例外処理
try{
  //DB_の中身は.envファイルに記載有
  $pdo = new PDO($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //連想配列で返す
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //例外を表示
    PDO::ATTR_EMULATE_PREPARES => false, //SQLインジェクション対策
  ]);
  echo '接続成功';
} catch(PDOException $e) {
  echo '接続失敗' . $e->getMessage() . "\n";
  exit();
}
