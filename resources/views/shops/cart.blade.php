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
            <div class="cart-item">
                {{ $item['name'] }} - {{ $item['quantity'] }} x ${{ $item['price'] }}</li>
              <form action="{{ route('cart.remove', $id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="delete-button" type="submit">カートから削除</button>
              </form>
            </div>
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
        <form action="{{ route('order.create') }}" method="POST">
          @csrf
          <input type="hidden" name="total" value="{{ $total }}">
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
    .cart-item{
      margin: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
        .delete-button{
          background-color: #4299e1;
          color: #ffffff;
          font-weight: bold;
          border-radius: 0.25rem;
          box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
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
