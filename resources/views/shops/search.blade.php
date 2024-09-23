<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('商品検索') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">

          <!-- 検索フォーム -->
          <form action="{{ route('shops.search') }}" method="GET" class="mb-6">
            <div class="flex items-center">
              <input type="text" name="keyword" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Search for tweets..." value="{{ request('keyword') }}">
              <button type="submit" class="button">
                Search
              </button>
            </div>
          </form>
          <!-- 検索結果表示 -->
          @if ($shops->count())

          <!-- ページネーション -->
          <div class="mb-4">
            {{ $shops->appends(request()->input())->links() }}
          </div>

          

          <!-- ページネーション -->
          <div class="mt-4">
            {{ $shops->appends(request()->input())->links() }}
          </div>

          @else
          <p>No Items.</p>
          @endif
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

<style>
.button{
  background-color: #4299e1;
  color: #ffffff;
  font-weight: bold;
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
  padding-left: 1rem;
  padding-right: 1rem;
  border-radius: 0.25rem;
  outline: none;
  box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
}
.button:hover{
  background-color: #2b6cb0;
}
</style>