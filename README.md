# Jewelry

![スクリーンショット 2021-01-27 10 40 21](https://user-images.githubusercontent.com/73946510/106109674-255bfa80-618d-11eb-9155-039921faac02.png)

# 概要
日々の美容ケアや化粧品の管理など全てを、1つのアプリで行うことを目指したサービスです。

# URL
http://mighty-springs-27172.herokuapp.com/ <br>

右上のゲストログインボタンから会員登録なしでログインができます。

# 制作背景
毎日のケアしているうちに、いつ何をしたのかわからなくなることが多々ありました。
毎日行う内容であれば問題ありませんが、顔のパックやトリートメント、また化粧道具の筆やパフの洗浄…。こういったものは週に1~3回がしか行うことができません。（やりすぎはよくないと言われています)
そんな時に、いつ、何を行ったのかカレンダーで一目で分ければ便利だと思い、このアプリを制作しました。

また、一緒に化粧品の管理も行えるようにしています。
外出先で化粧品を購入しようと思った時に、どの品番を購入すればいいのかわからなくなる時があります。そんな時のために、所有している化粧品と未発売の化粧品リストを分けて作成しました。

# 機能一覧
* ユーザー登録関連
    * 新規登録、プロフィール編集機能
    * ログイン、ログアウト機能
    * ゲストログイン機能   
* ページネーション機能
* 画像アップロード機能
* 検索機能
    * 商品名、ブランド名等キーワード検索が可能
* カレンダー表示機能(今日できたことをカレンダーで管理)
* 化粧品の登録関連(CRUD)

# 使用イメージ
* 今日できたことリストをカレンダーで表示することで、一目でわかるようになっています。

![スクリーンショット 2021-01-28 17 48 47](https://user-images.githubusercontent.com/73946510/106117140-1168c680-6196-11eb-81b8-c1fadf6cb854.png)


* 持っている化粧品は画像を中心に一覧が表示されるようにし、発売予定の商品は画像がない可能性があるため、文字を中心に一覧が表示されるようにしています。

![スクリーンショット 2021-01-28 17 49 27](https://user-images.githubusercontent.com/73946510/106118657-b3d57980-6197-11eb-8d40-e884867cd6d7.png)

![スクリーンショット 2021-01-28 17 49 11](https://user-images.githubusercontent.com/73946510/106118767-ce0f5780-6197-11eb-9e87-3ad223d9a2f5.png)


# 使用技術
* フロントエンド
    * SCSS
    * Bootstrap 5.0
    * JavaScript、jQuery、Ajax
    
* バックエンド
    * PHP 7.4.13
    * Laravel 6.20.9

* 開発環境
    * Docker / Docker-compose
    * MySQL 5.7.30
