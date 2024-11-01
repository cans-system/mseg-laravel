<x-layout title="マンション一覧">
  <div class="subpage-h2">
    <div class="noborder">
      <h2 class="section-h2"><span>S</span>earch
        <div><span></span><p>検索結果一覧</p></div>
      </h2>
    </div>
  </div>

  <div class="search-bg">
    <section class="search">
      <x-forms.search />
    </section>
  </div>

  <div class="breadcrumb">
    <div class="border">
      <p>
        <a href="">TOP</a> 〉
        <a href="">マンション検索</a> 〉
        <a href="">マンション情報一覧</a>
      </p>
    </div>
  </div>

  <div class="search-result">
    <h3>{{ request('address') ?? request('freeword') ?? '中村区' }} の検索結果一覧</h3>
    <div class="search-option">
      <p class="">{{ "{$mansions->total()}件中{$mansions->firstItem()}～{$mansions->lastItem()}件を表示" }}</p>
      <div class="flexbox">
        <div>
          <label for="">表示件数</label>
          <div class="select-wrapper">
            <select name="pageSize" class="searchLimit" onchange="this.form.submit()" form="searchForm">
              @foreach ([20, 40, 60] as $item)
                <option value="{{ $item }}" @selected(request()->query('pageSize') == $item)>
                  {{ $item }}件
                </option>
              @endforeach
            </select>
          </div>
        </div>
        <div>
          <label for="">並び順</label>
          <div class="select-wrapper">
            <select name="order" onchange="this.form.submit()" form="searchForm">
              <option value="latest" @selected(request()->query('order') == 'latest')>新着順</option>
              <option value="price" @selected(request()->query('order') == 'price')>価格の安い順</option>
              <option value="price-desc" @selected(request()->query('order') == 'price-desc')>価格の高い順</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="search-results">
      <ul class="grid-list">
        @foreach ($mansions as $mansion)
          <li class="grid-item">
            <a href="./mansions/{{ $mansion->id }}">
              <img src="{{ $mansion->getImageUrl("image") }}" alt="">
              <div>
                <p>{{ $mansion->title }}</p>
              </div>
            </a>
          </li>
        @endforeach
      </ul>
    </div>
    <div class="search-option buttom">
      <p class="">{{ "{$mansions->total()}件中{$mansions->firstItem()}～{$mansions->lastItem()}件を表示" }}</p>
    </div>
    {{ $mansions->links() }}
    <div class="re-search">
      <a href="/mansions"><span>条件を変更して再検索</span></a>
    </div>
  </div>

  <x-line />

  <script src="{{ asset('script/clean_query.js') }}" defer></script>
  <script src="{{ asset('script/search.js') }}" defer></script>
</x-layout>