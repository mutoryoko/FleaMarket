# FleaMarket App

### Dockerビルド
```
git clone git@github.com:mutoryoko/FleaMarket.git
docker compose up -d --build
```

### Laravel環境構築
```
docker compose exec php bash
composer install
```
.env.exampleファイルをコピーし、.envファイルを作成。<br />
.envファイルにメール、決済サービスの設定を追加する。

<details open><summary>メールの設定</summary>

メール機能はMailtrapを想定。<br />
アカウント作成後、.envファイルを編集する。
```
MAIL_USERNAME=Mailtrapのユーザー名
MAIL_PASSWORD=Mailtrapのパスワード
```
</details>

<details open><summary>決済サービスの設定</summary>

決済機能はStripeを想定。<br />
Stripeのアカウント作成後、.envファイルに設定を追加する。
```
STRIPE_KEY=テスト用の公開可能キー
STRIPE_SECRET_KEY=テスト用のシークレットキー
```
</details>

.envファイルを編集後、以下のコマンドを実行。
```
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan storage:link
```

### テスト環境構築
.envファイルをコピーして.env.testingを作成。<br />
.env.testingファイルのAPP_ENVとAPP_KEYを以下に変更。
```
APP_ENV=test
APP_KEY=
```
.env.testingファイルのデータベース情報を以下に変更。
```
DB_DATABASE=demo_test
DB_USERNAME=root
DB_PASSWORD=root
```
.env.testingを編集後、以下のコマンドを実行。
```
docker compose exec php bash
php artisan key:generate --env=testing
php artisan config:clear
php artisan migrate --env=testing
```

## 実行環境
<ul>
	<li>PHP: 8.1</li>
	<li>mysql: 8.0.26</li>
	<li>nginx:1.21.1</li>
	<li>Laravel Framework: 9.52.20</li>
</ul>

## ER図
![image](ER.drawio.svg)

## URL
<ul>
	<li>開発環境: <a href="http://localhost">http://localhost</a> </li>
	<li>phpmyadmin: <a href="http://localhost:8080">http://localhost:8080</a> </li>
</ul>