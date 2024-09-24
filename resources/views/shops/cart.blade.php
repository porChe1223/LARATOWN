<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('カート') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

        <div class="product-container">
          @foreach($cart as $cart)
          <div class="product-group">

              <div class="product-item">
                <img class="product-image" src="{{$cart->img_link}}" alt="商品画像">
                <div class="product-info">
                  <span>{{$cart->name}}</span><br>
                  <span class="price">{{$cart->price}}円</span>
                </div>
                <a class='show_link' href="{{ route('shops.show', $shop->id) }}">詳細を見る</a>
              </div>
            </a>

          </div>
          @endforeach
        </div>

      </div>
    </div>
  </div>
</x-app-layout>


<style>
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
      .show_link{
        color: #3b82f6;
      }
      .show_link:hover{
        color: #1d4ed8;
      }
</style>
