@php
  $page = $paginator->currentPage();
  $first = 1;
  $last = $paginator->lastPage();
@endphp

<div class="search-pagenation">
  <ul class="flex-list">
    @if ($page - 2 >= $first)
      <li class="flex-item">
        <a href="{{ $paginator->url($first) }}">
          <img src="{{ asset('img/arrow-left.png') }}" alt="">
        </a>
      </li>
    @endif
    @if ($page - 2 >= $first)
      <li class="flex-item">
        <a href="{{ $paginator->url($page - 2) }}">
          <span>{{ $page - 2 }}</span>
        </a>
      </li>
    @endif
    @if ($page - 1 >= $first)
      <li class="flex-item">
        <a href="{{ $paginator->url($page - 1) }}">
          <span>{{ $page - 1 }}</span>
        </a>
      </li>
    @endif
    <li class="flex-item">
      <a class="active" href="{{ $paginator->url($page) }}">
        <span>{{ $page }}</span>
      </a>
    </li>
    @if ($page + 1 <= $last)
      <li class="flex-item">
        <a href="{{ $paginator->url($page + 1) }}">
          <span>{{ $page + 1 }}</span>
        </a>
      </li>
    @endif
    @if ($page + 2 <= $last)
      <li class="flex-item">
        <a href="{{ $paginator->url($page + 2) }}">
          <span>{{ $page + 2 }}</span>
        </a>
      </li>
    @endif
    @if ($page + 2 <= $last)
      <li class="flex-item">
        <a href="{{ $paginator->url($last) }}">
          <img src="{{ asset('img/arrow-right.png') }}" alt="">
        </a>
      </li>
    @endif
  </ul>
</div>
