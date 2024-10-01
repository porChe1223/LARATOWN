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
          @if(empty($cart))
            <div class="empty-message">カートは空です!</p>
          @else
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
          @endif
        </div>
        <div class="total-price">
          合計金額 : {{session('total_price')}} 円
        </div>
        <form action="{{ route('order.create') }}" method="POST">
          @csrf
          <label for="place">配達場所:</label>
          <input type="text" id="place" name="place" placeholder="配達場所を入力" required>
          </br>
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
    const placeInput = document.getElementById('place');

    function toggleBuyButton() {
      if (cartItemCount === 0 || placeInput.value.trim() === "") {
        buyButton.disabled = true;
      } else {
            buyButton.disabled = false;
      }
    }

    toggleBuyButton();

    placeInput.addEventListener('input', toggleBuyButton);

    buyButton.addEventListener('click', function(event) {
      if (!confirm('購入しますか？')) {
        event.preventDefault();
        return;
      }
      alert('購入しました');
    });
  });
</script>


<style>
  .empty-message{
    font-size: 30px;
    font-weight: bold;
  }
  .cart-list{}
    .cart-item{
      font-size: 18px;
      font-weight: bold;
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
