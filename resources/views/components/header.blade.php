<header>
  <div class="flexbox">
    <div class="flexbox-logo">
      <a href="/"><img src="{{ asset('img/logo.png') }}" alt=""></a>
    </div>
    <div class="flexbox-nav">
      <nav>
        <ul>
          <li><a href="/mansions">マンション検索</a></li>
          <li><a href="/mansions">マンション一覧</a></li>
          <li><a href="/posts">NEWS</a></li>
          <li><a href="/#flow">売却の流れ</a></li>
          <li><a href="/#faq">よくある質問</a></li>
        </ul>
      </nav>
      <div class="header-contact">
        <a href="/contact"><span>お問い合わせ</span></a>
      </div>
    </div>
    <div class="toggle-button-sp">
      <div class="hamburger">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
</header>
<div class="header-menu">
  <div class="menu">
    <ul class="menu__parent-list">
      <li><a href="/mansions">マンション検索</a></li>
      <li><a href="/mansions">マンション一覧</a></li>
      <li><a href="/posts">NEWS</a></li>
      <li><a href="/#flow">売却の流れ</a></li>
      <li><a href="/#faq">よくある質問</a></li>
    </ul>
  </div>
</div>
<script>
  $(function() {
    // ハンバーガーメニュー
    $(".toggle-button-sp").on("click", function() {
      $(this).toggleClass("open");
      $(".header-menu").toggleClass("open");
      $(".logo").toggleClass("open");
    });
  });
</script>