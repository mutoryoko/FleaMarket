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
 .env.exampleファイルからenvファイルを作成し、環境変数を変更
  ```
  php artisan key:generate
  php artisan migrate
  php artisan db:seed
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
	<li>開発環境: <a href="http://localhost/">http://localhost/</a> </li>
	<li>phpmyadmin: <a href="http://localhost:8080">http://localhost:8080/</a> </li>
</ul>
