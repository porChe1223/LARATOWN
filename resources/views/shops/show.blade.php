<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('商品詳細') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <div class="product-item">
            <h class= "name">{{$shop->name}}</h>
            <div class="product-docs">
              <div class="product-docs-left">
                <img class="product-image" src="{{$shop->img_link}}" alt="商品画像">
              </div>
              <div class="product-docs-right">
                <div class="product-info">
                  <span class= "description">{{$shop->description}}</span>
                  <span class="price">{{$shop->price}}円</span>
                  <span class="stock">残り{{$shop->stock}}個</span>
                </div>

                <div class="flex">
                  
                  <form id="cart-form" action="{{ route('cart.add', $shop->id) }}" method="POST">
                    @csrf
                    <button class="cart-button" type="submit">カートに追加する</button>
                  </form>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a class='back_link' href="javascript:history.back()">↩︎戻る</a>
  </div>
</x-app-layout>


<script>
  document.querySelector('.cart-button').addEventListener('click', function() {
    event.preventDefault();
    if (confirm('カートに追加しますか？')) {
      document.getElementById('cart-form').submit();
      alert('カートに追加しました');
    }
  });
</script>


<style>  
  .product-item{
    display: flex;
    flex-direction: column; 
  }
    .name{
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .product-docs{
      display: flex;
      flex-direction: row;
    }
      .product-docs-left{
        float: left;
        display: flex;
        flex-direction: column;
        width: 250px;
        margin: 10px;
      }
        .product-image{
          width: 100%;
          height: auto;
          margin: 10px;
          object-fit: cover;
        }
      .product-docs-right{
        float: right;
        display: flex;
        flex-direction: column;
        width: 550px;
        margin: 10px;
      }
        .product-info{
          text-align: left;
          display: flex;
          flex-direction: column;
        }
          .description{
            margin: 10px;
            height: 160px;
          }
          .price{
            margin: 10px;
            font-size: 24px;
            color: red;
          }
          .stock{
            margin: 20px;
          }
          .cart-button{
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
          .cart-button:hover{
            background-color: #2b6cb0;
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