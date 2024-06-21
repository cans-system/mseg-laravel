<x-admin.layout>
  <div class="login">
    <div>
      <img src="{{ asset('img/icon.png') }}" alt="">
    </div>
    <div>
      <div class="subpage-h2">
        <div>
          <h2 class="section-h2">ログイン
            <div><span></span><p>login</p></div>
          </h2>
        </div>
      </div>
      <form action="/admin/login" method="post">
        @csrf
        <div>
          <label for="">パスワード</label>
          <input type="password" name="password">
        </div>
        <div class="submit">
          <input type="submit" value="ログイン">
        </div>
      </form>
    </div>
  </div>

</x-admin.layout>