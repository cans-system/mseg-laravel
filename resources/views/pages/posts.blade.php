<x-layout title="NEWS">
  <div class="subpage-h2">
    <div class="noborder">
      <h2 class="section-h2"><span>N</span>ews
        <div><span></span><p>不動産成約最新情報</p></div>
      </h2>
    </div>
  </div>

  <div class="breadcrumb">
    <div class="border">
      <p>
        <a href="/">TOP</a> 〉
        <a href="/posts">NEWS</a>
      </p>
    </div>
  </div>

  <div class="search-result">
    <div class="search-results">
      <ul class="grid-list">
        @foreach ($posts as $post)
          <li class="grid-item">
            <a href="/posts/{{ $post->id }}">
              <img src="{{ asset('uploads/'.$post->thumbnail) }}" alt="">
              <div>
                <p>
                  {{ $post->title }}
                  <span style="font-size: 0.875rem; color: white; margin-left: 0.25rem;">
                    {{ $post->published_at->diffForHumans() }}
                  </span>
                </p>
              </div>
            </a>
          </li>
        @endforeach
      </ul>
    </div>
  </div>

  <x-line />
  <script src="{{ asset('script/clean_query.js') }}" defer></script>
  <script src="{{ asset('script/search.js') }}" defer></script>
</x-layout>