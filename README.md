## ユーザ登録　完成
-   完了

## ホーム　完成
-   完了

## 商品一覧　完成
-   テーブルと対応　完了
-   CSS　完了
-   ボタンで詳細ページに遷移　完了

## 詳細ページ　完成
-   テーブルと対応　完了
-   ボタンでカートに追加　完了
-   ボタンで前ページに遷移　完了
-   CSS　完了

## 商品検索　完成
-   ボタンで検索　完了
-   CSS　完了

## 買い物カゴ　完成
-   購入リスト表示　完了
-   合計金額　完了
-   ボタンでOrderテーブルに保存　完了
-   ボタンでThanks画面に遷移　完了
- 　CSS　完了

## Orderテーブル
-   ユーザID
-   メアド
-   商品ID
-   商品名
-   料金
-   住所

## Thanksページ　完成
-   商品一覧ページに遷移　完了

## テスト
-   


## コマンドライン操作
 ./vendor/bin/sail php artisan make:model Shop -rmf

 ./vendor/bin/sail php artisan make:controller ShopController --resource

 ./vendor/bin/sail php artisan make:migration create_shop_table --create=shops
 ./vendor/bin/sail php artisan migrate

 ./vendor/bin/sail php artisan make:view shops.index
 ./vendor/bin/sail php artisan make:view shops.show
 ./vendor/bin/sail php artisan make:view shops.search
 ./vendor/bin/sail php artisan make:view shops.cart
  ./vendor/bin/sail php artisan make:view shops.thanks

 ./vendor/bin/sail npm run build

 ./vendor/bin/sail php artisan route:list --path=shops

## ルーティング設定
  GET|HEAD        shops ............................................................... shops.index › ShopController@index
  POST            shops ............................................................... shops.store › ShopController@store
  GET|HEAD        shops/cart ............................................................ shops.cart › CartController@cart
  GET|HEAD        shops/create ...................................................... shops.create › ShopController@create
  GET|HEAD        shops/search ...................................................... shops.search › ShopController@search
  GET|HEAD        shops/{shop} .......................................................... shops.show › ShopController@show
  PUT|PATCH       shops/{shop} ...................................................... shops.update › ShopController@update
  DELETE          shops/{shop} .................................................... shops.destroy › ShopController@destroy
  GET|HEAD        shops/{shop}/edit ..................................................... shops.edit › ShopController@edit

                                                                                        Showing [9] routes