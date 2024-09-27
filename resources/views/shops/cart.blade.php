<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('カート') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

        <div class="cart-list">
          @foreach($cart as $id=>$item)
              <li>{{ $item['name'] }} - {{ $item['quantity'] }} x ${{ $item['price'] }}</li>
          @endforeach
        </div>
        <div class="total-price">
          合計金額 : 
          @php
            $total = 0;
            foreach($cart as $id=>$item){
              $total += $item['quantity'] * $item['price'];
            }
            echo $total . ' 円';
          @endphp
        </div>
        <form action="{{ route('shops.thanks') }}" method="GET">
          <button class="buy-button" type="submit">購入する</button>
        </form>

      </div>
    </div>
    <a class='back_link' href="javascript:history.back()">↩︎戻る</a>
  </div>
</x-app-layout>


<script>
  var cartItemCount = {{ count($cart) }};

  document.addEventListener('DOMContentLoaded', function() {
    const buyButton = document.querySelector('.buy-button');

    // カート内に商品がない場合はボタンを無効化
    if (cartItemCount === 0) {
      buyButton.disabled = true;
      buyButton.style.backgroundColor = '#ccc';  // ボタンを無効化した場合の色を設定
      buyButton.style.cursor = 'not-allowed';    // ポインターも変更
    }

    buyButton.addEventListener('click', function(event) {
      if (cartItemCount === 0) {
        event.preventDefault();  // クリック時にカートが空なら何もしない
        return;
      }

      if (confirm('購入しますか？')) {
        alert('購入しました');
      }
    });
  });
</script>


<style>
  .cart-list{}
  .product-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }
    .product-group {
      width: calc(33.33% - 10px); 
    }
      .product-item {
        background-color: #ffffff;
        color: black;
        font-weight: bold;
        border: 1px solid #ebebeb;
        border-radius: 4px;
        padding: 3px;
        position: relative;
        height: 360px;
        outline: none;
        box-shadow: 0 0px 2px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 10px;
      }
      .product-item:hover {
        background-color: #f3f3f3;
      }
        .product-image {
          width: 100%;
          object-fit: cover;
        }
        .product-info {
          width: 100%;
          position: absolute;
          bottom: 25px;
        }
        .price{
          color: red;
        }
        .stock{
            margin: 20px;
          }
          .total-price{
            font-size: 24px;
            font-weight: bold;
          }
          .buy-button{
            background-color: #4299e1;
            color: #ffffff;
            font-weight: bold;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            padding-left: 1rem;
            padding-right: 1rem;
            border-radius: 0.25rem;
            outline: none;
            margin: 5px;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
          }
          .buy-button:hovernot(:disabled){
            background-color: #2b6cb0;
          }
          .buy-button:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
          }
  .back_link{
    position: absolute;
    bottom: 0px;
    font-size: 18px;
    font-weight: bold;
    color: #3b82f6;
    margin: 30px;
  }
  .back_link:hover{
    color: #1d4ed8;
  }
</style>
