# json-cms
SimpleなPHPによるCMS.

## Discription
このシステムは、既存のホームページ用に最適化したCMSであるCMS-on-PHP-v2 ( https://github.com/TaikiFnit/CMS-on-PHP-v2 ) を改良し、誰でも気軽に使用できるように汎用性を持たせた、フレームワーク未使用の純粋なPHP製のCMSです。
管理画面よりニュースなどの記事を投稿することによって、記事がデータベースに保存され、特定のURLにGETすることによって、保存されている記事の一覧、特定記事のコンテンツを取得することができます。
既存のサイトのCMS化を図りたいときやサーバーサイドとクライアントサイドのロジックを完璧に分離したい時などに役に立ちます。

## 動作条件
* Apache 2.x
* PHP 5以上
* MySQL 5

## How to use
1. config.php, users.phpを設定する。
dirctory内に、config.php.default, users.php.defaultが存在するので、これをコピーして、新たに2つのファイルを配置し、データベースの情報と、ユーザー情報をsettingします。
2. DBの作成, テーブルの作成を行う。
データベース名は任意、テーブルの構造は、/sql/setup.sqlに記述してあるSQL文を読み込むことにより、作成が完了します。
3. Apache等のウェブサーバーに配置。
PHP, MySQLが使えるウェブサーバーにすべてのディレクトリをUploadすることにより、このシステムが使えるようになります。

### テーブルの作成の仕方
#### コマンドラインを使用する方法
1. Terminal(cmd)で、sql dicretocryまで移動(cd)
2. mysqlにログイン (mysql -u user_name -p)
3. DBをuse (use database_name)
4. ファイルより、SQLを実行 (source ./setup.sql)

#### phpMyAdmin等を使用する方法
setup.sql内に書いてあるSQL文をコピーして、作成したデータベースでSQL文を実行する。

---

## 通信仕様
get bellows url, return bellows json data.

### GET /news/*
管理画面より、作成したnewsの一覧情報がjson形式でresponse.
使用したいサイトでAjaxなどでGETすると記事の一覧情報が得られる

#### Json Data format
    [
         {
             "news_id":"1",
             "title":"title",
             "content":"content",
             "author":"author",
             "created":"2016-01-01"
         },
         { ... },
         { ... }
     ]

---

### GET /news/1 (1はid)
管理画面より、作成したnewsの情報がjson形式でresponse.
使用したいサイトでAjaxなどでGETすると記事の情報が得られる

#### Json Data format
     {
         "news_id":"1",
         "title":"title",
         "content":"content",
         "author":"author",
         "created":"2016-01-01",
         "images_num": 3,
         "images" : [
            {
                "image_id": "1",
                "image_src": "http://",
                "image_alt": "alt attribute of this"
            },
            { ... },
            { ... }
         ]
     }

## Author
Taiki Fnit Watanabe (http://github.com/TaikiFnit)

## LICENCE
MIT