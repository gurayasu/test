# 情報ネット 開発、デプロイ環境構築 🐳

## Introduction

情報ネットの開発環境構築用の Doker

## Windows での環境設定

--  Install [VS Code](https://code.visualstudio.com/).
--  Install [Node.js](https://qiita.com/echolimitless/items/83f8658cf855de04b9ce).
--  Install [docker](https://www.docker.com/get-started).
--  Settin & Install [Linux System](https://tech.manafukurou.com/article/docker-for-windows/)

PowerShell を管理者権限で起動し以下を実行：

Enable-WindowsOptionalFeature -Online -FeatureName Microsoft-Windows-Subsystem-Linux
システムを再起動します。または以下のコマンドを管理者権限の PowerShell で実行します：
dism.exe /online /enable-feature /featurename:Microsoft-Windows-Subsystem-Linux /all /norestart
※詳しくは参考文献をご参照ください

PowerShell の起動方法については、次のサポート記事をご参照ください：


--  Install [make](https://beyondjapan.com/blog/2020/10/makefile-docker/#Make).
    make する際には必ず dockerを一度は起動しておくこと。




## Usage(full make)

```bash
$ git clone git@github.com:xkeiji/info_net_docker.git
$ cd info_net_docker
$ make build # 環境作成
$ make up # 環境起動
$ make init #初期設定
```

http://localhost

## Tips

-   Read this [Makefile](https://github.com/ucan-lab/docker-laravel/blob/main/Makefile).
-   Read this [Wiki](https://github.com/ucan-lab/docker-laravel/wiki).

## Container structures

```bash
├── app
├── web
└── db
```

### app container

-   Base image
    -   [php](https://hub.docker.com/_/php):8.0-fpm-bullseye
    -   [composer](https://hub.docker.com/_/composer):2.1

### web container

-   Base image
    -   [nginx](https://hub.docker.com/_/nginx):1.20-alpine
    -   [node](https://hub.docker.com/_/node):16-alpine

## db container

-   Base image
    -   [mysql/mysql-server](https://hub.docker.com/r/mysql/mysql-server):8.0


## git コマンド

```bash
$ git add .
$ git commit -m "comment"
$ git push origin info_net
```

## heroku インストール

-   各自で実施すること。

## heroku デプロイ コマンド

- デプロイ
```bash
git subtree push --prefix backend/ heroku master
```

## app 用コマンド

-   パッケージ導入

    ```bash
      $ docker-compose exec app composer require *****
    ```

-   artisan コマンド
    ```bash
      $ docker-compose exec app php artisan ****
    ```
-   ビルド
    ```bash
      $ make npm-install
    ```
-   開発環境デプロイ
    ```bash
      $ make npm-dev
    ```

## laravel コマンド

-   migration ファイルを作成

    ```bash
    $ docker-compose exec app php artisan make:migration create_*****_table --create=****
    ```

-   migration

    ```bash
    $ docker-compose exec app php artisan migrate
    ```

-   seeder 作成
    ```bash
    $ docker-compose exec app php artisan make:seeder ****TableSeeder
    ```
-   seeder 実行
    ```bash
    $ docker-compose exec app composer dump-autoload
    $ docker-compose exec app php artisan db:seed
    ```
-   モデル作成
    ```bash
    $ docker-compose exec app php artisan make:model ***
    ```
-   コントローラー作成
    ```bash
    $ docker-compose exec app php artisan make:controller ***/***Controller
    ```
-   URI 確認
    ```bash
    $ docker-compose exec app php artisan route:list
    ```
