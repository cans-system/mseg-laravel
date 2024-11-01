<x-admin.layout>
  <div class="subpage-h2">
    <div>
      <h2 class="section-h2">マンション一覧
        <div><span></span><p>mansions</p></div>
      </h2>
    </div>
  </div>
  <div class="admin-mansions">
    <div class="search-form">
      <form action="/admin/mansions" name="searchForm" id="searchForm">
        <div class="flexbox">
          <div class="address">
            <label for="">名古屋市中村区</label>
            <input type="text" name="address" placeholder="以降の住所" value="{{ request()->query("address") }}">
          </div>
          <div class="freeword">
            <input type="text" name="freeword" placeholder="フリーワード" value="{{ request()->query("freeword") }}">
          </div>
          <div class="search-submit">
            <button type="submit"><span>検索</span></button>
          </div>
        </div>
      </form>
    </div>
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
      <ul class="mansion-list">
        @foreach ($mansions as $mansion)
          <li class="mansion-item">
            <div class="item-icon">
              <img src="{{ $mansion->getImageUrl("image") }}" alt="">
            </div>
            <div class="item-content">
              <h4>
                {{ $mansion->title }}
                @if ($mansion->private)
                  <span>非公開</span>
                @endif
              </h4>
              <div class="item-body">
                <ul>
                  <li>
                    <h5>査定金額</h5>
                    <p>{{ $mansion->unit_price."万/坪" }}</p>
                  </li>
                  <li>
                    <h5>所在地</h5>
                    <p>{{ $mansion->address }}</p>
                  </li>
                  <li>
                    <h5>交通</h5>
                    <p>{{ $mansion->access }}</p>
                  </li>
                  <li>
                    <h5>総戸数</h5>
                    <p>{{ $mansion->total_units ? $mansion->total_units.'戸' : "ーーー" }}</p>
                  </li>
                  <li>
                    <h5>築年数</h5>
                    <p>
                    @if ($mansion->birthday_set)
                      {{ str_replace('前', '', $mansion->birthday->diffForHumans()); }}
                      （{{ $mansion->birthday->format('Y年n月') }}）
                    @else
                      ーーー
                    @endif
                    </p>
                  </li>
                  <li>
                    <h5>階数</h5>
                    <p>{{ $mansion->floors ?? "ーーー" }}</p>
                  </li>
                  <li>
                    <h5>建築構造</h5>
                    <p>{{ $mansion->architecture ?? "ーーー" }}</p>
                  </li>
                </ul>
              </div>
            </div>
            <div class="item-buttons">
              <div>
                <a class="edit" href="/admin/mansions/{{ $mansion->id }}/edit"><span>編集</span></a>
              </div>
              <div>
                <a class="show {{$mansion->private ? "disabled" : "" }}" href="/mansions/{{ $mansion->id }}" target="_blank">
                  <span>公開ページ</span>
                </a>
              </div>
              <div>
                <form action="/admin/mansions/{{ $mansion->id }}" method="post" onsubmit="return window.confirm('本当に削除しますか？');">
                  @csrf
                  @method('DELETE')
                  <input class="delete" type="submit" value="削除">
                </form>
              </div>
            </div>
          </li>
        @endforeach
      </ul>
    </div>
    {{ $mansions->links() }}
  </div>
  <script src="{{ asset('script/clean_query.js') }}" defer></script>
  <script src="{{ asset('script/search.js') }}" defer></script>
</x-admin.layout>
