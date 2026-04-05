# 重要！！
古いphp動かすときは、pcにデフォルトインストールしているphpと競合してしまって動かない場合もありうる（今回そうだった…）。

- 変更前
```json
…
"config": {
    "optimize-autoloader": true,
    "preferred-install": "dist",
    "sort-packages": true
},
…
```
- 変更後（`platform`ってのを追加することでcomposerにphpのバージョンを指定できるんだって）
```json
…
"config": {
    "platform": {
        "php": "8.2.30"
    },
    "optimize-autoloader": true,
    "preferred-install": "dist",
    "sort-packages": true
},
…
```

# バージョン確認
```bash
php artisan -V
```

# 起動
```bash
sail up -d
```

# 終了
```bash
sail down
```

# 閲覧
http://localhost

# 整形
```bash
pint
```
※このリポジトリでのみ有効。phpリポジトリにpintを導入する場合は[こちら](https://laravel.com/docs/13.x/pint#installation)を参照

# テストコード
テストコードファイルの作成
```bash
sail artisan make:test FileName
```

# テスト実施
```bash
sail test tests/Feature/TestFileName.php
```

# migration
```bash
sail artisan migrate
```

# db疎通
## 接続
```bash
sail mysql
```
## 切断
```bash
// 対話型shellを終了
ctrl + D
```

## memo
laravel8系をDLした直後は
```log
Illuminate\Database\QueryException
vendor/laravel/framework/src/Illuminate/Database/Connection.php:838
SQLSTATE[42S02]: Base table or view not found: 1146 Table 'laravel.sessions' doesn't exist (Connection: mysql, Host: mysql, Port: 3306, Database: laravel, SQL: select * from `sessions` where `id` = Jzw7Jh9fql4X84f4UtIy6Pw3YtEURBIaoto5OgBy limit 1)
```
のようにエラーになる。
これは手順には書いてないけど、migrateが必要なため。

```bash
./vendor/bin/sail artisan migrate
// エイリアス設定している場合は次のようにしてもok
sail artisan migrate
```
でmigrateしてやると完了する。

```log
user laravel-8 % ./vendor/bin/sail artisan migrate

   INFO  Preparing database.  

  Creating migration table ............................................................................. 151.65ms DONE

   INFO  Running migrations.  

  0001_01_01_000000_create_users_table ................................................................. 243.64ms DONE
  0001_01_01_000001_create_cache_table .................................................................. 61.49ms DONE
  0001_01_01_000002_create_jobs_table ................................................................... 88.76ms DONE

user laravel-8 % 
```


