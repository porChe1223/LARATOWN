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

## ルーティング設定
  GET|HEAD        shops ............................................................... shops.index › ShopController@index
  POST            shops ............................................................... shops.store › ShopController@store
  GET|HEAD        shops/cart ............................................................ shops.cart › ShopController@cart
  GET|HEAD        shops/create ...................................................... shops.create › ShopController@create
  GET|HEAD        shops/search ...................................................... shops.search › ShopController@search
  GET|HEAD        shops/{shop} .......................................................... shops.show › ShopController@show
  PUT|PATCH       shops/{shop} ...................................................... shops.update › ShopController@update
  DELETE          shops/{shop} .................................................... shops.destroy › ShopController@destroy
  GET|HEAD        shops/{shop}/edit ..................................................... shops.edit › ShopController@edit

                                                                                                        Showing [9] routes

## テスト
-   