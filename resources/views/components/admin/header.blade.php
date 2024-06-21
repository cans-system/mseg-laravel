<header>
  <div class="header-logo">
    <a href="/admin/mansions">
      <img src="{{ asset('img/logo.png') }}" alt="">
    </a>
  </div>
  <div class="header-nav">
    <nav>
      <ul>
        <li><a href="/" target="_blank">公開ページ</a></li>
        <li><a href="/admin/mansions">マンション一覧</a></li>
        <li><a href="/admin/mansions/create">マンション新規登録</a></li>
        <li><a href="/admin/posts">投稿一覧</a></li>
        <li><a href="/admin/posts/create">投稿新規作成</a></li>
        @auth
          <li class="logout">
            <form action="/admin/logout" method="post">
              @csrf
              <button type="submit">ログアウト</button>
            </form>
          </li>
        @endauth
      </ul>
    </nav>
  </div>
</header>
