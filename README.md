## ユーザ登録　完成
-   完了

## ホーム　完成
-   完了

## 商品一覧　完成
-   テーブルと対応完了
-   CSS完了
-   ボタンで詳細ページに遷移完了

## 詳細ページ　未完成
-   テーブルと対応完了
-   ボタンでカートに追加　未実装
-   ボタンで前ページに遷移完了
-   CSS完了

## 商品検索　完成
-   ボタンで検索完了
-   CSS完了

## 買い物カゴ　未完成
-   テーブルと対応
-   CSS
-   決済
-   
-    

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