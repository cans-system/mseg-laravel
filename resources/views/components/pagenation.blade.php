@props([
  'pgnt'
])

<div class="search-pagenation">
  <ul class="flex-list">
    @if ($pgnt["first"])
      <li class="flex-item">
        <a href="{{ \App\MyUtil::url_param_change(['page' => $pgnt["first"]]); }}">
          <img src="{{ asset('img/arrow-left.png') }}" alt="">
        </a>
      </li>
    @endif
    @if ($pgnt["pprev"])
      <li class="flex-item">
        <a href="{{ \App\MyUtil::url_param_change(['page' => $pgnt["pprev"]]); }}">
          <span>{{ $pgnt["pprev"] }}</span>
        </a>
      </li>
    @endif
    @if ($pgnt["prev"])
      <li class="flex-item">
        <a href="{{ \App\MyUtil::url_param_change(['page' => $pgnt["prev"]]); }}">
          <span>{{ $pgnt["prev"] }}</span>
        </a>
      </li>
    @endif
    @if ($pgnt["current"])
      <li class="flex-item">
        <a class="active" href="{{ \App\MyUtil::url_param_change(['page' => $pgnt["current"]]); }}">
          <span>{{ $pgnt["current"] }}</span>
        </a>
      </li>
    @endif
    @if ($pgnt["next"])
      <li class="flex-item">
        <a href="{{ \App\MyUtil::url_param_change(['page' => $pgnt["next"]]); }}">
          <span>{{ $pgnt["next"] }}</span>
        </a>
      </li>
    @endif
    @if ($pgnt["nnext"])
      <li class="flex-item">
        <a href="{{ \App\MyUtil::url_param_change(['page' => $pgnt["nnext"]]); }}">
          <span>{{ $pgnt["nnext"] }}</span>
        </a>
      </li>
    @endif
    @if ($pgnt["last"])
      <li class="flex-item">
        <a href="{{ \App\MyUtil::url_param_change(['page' => $pgnt["last"]]); }}">
          <img src="{{ asset('img/arrow-right.png') }}" alt="">
        </a>
      </li>
    @endif
  </ul>
</div>
