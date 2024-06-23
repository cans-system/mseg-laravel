<x-admin.layout>
  <div class="subpage-h2">
    <div>
      <h2 class="section-h2"><var>{{ $mansion->title }}</var>
        <div><span></span><p>edit</p></div>
      </h2>
    </div>
  </div>
  <div class="admin-mansions-edit">
    <div class="back-to-index">
      <a href="{{ url("/admin/mansions") }}">← マンション一覧に戻る</a>
    </div>
    <div class="mansion-stmt">
      <p>
        <span>作成日: </span>
        {{ $mansion->created_at->format("Y n/d H:i:s"). " | " . $mansion->created_at->diffForHumans() }}
        <span>マンションID: </span>
        {{ $mansion->id }}
        <span>公開URL: </span>
        <a href="{{ url("/mansions/{$mansion->id}") }}" target="_blank">
          {{ url("/mansions/{$mansion->id}") }}
        </a>
      </p>
    </div>
    <div class="field-item">
      <div class="item-head" style="margin-bottom: 8px;"><label for="">画像をアップロード</label></div>
      <div class="item-body">
        <form action="/admin/mansions/{{ $mansion->id }}/images" enctype="multipart/form-data" method="post">
          @csrf
          <input type="file" name="images[]" id="images" accept="image/*" onchange="form.submit()" multiple required>
        </form>
      </div>
    </div>
    <div class="admin-mansion-form">
      <div class="field-item w-full img">
        <div class="item-body">
          <ul>
            <li>
              <div class="img-wrapper">
                <a href="{{ $mansion->getImageUrl('image') }}">
                  <img src="{{ $mansion->getImageUrl('image') }}" alt="" id="preview1">
                </a>
              </div>
              <div class="img-controller">
                <label for="image">変更</label>
                <form action="/admin/mansions/{{ $mansion->id }}/image" enctype="multipart/form-data" method="post">
                  @csrf
                  <input type="file" name="image" id="image" accept="image/*" onchange="form.submit()" required>
                  <button type="reset" onclick="form.submit()">削除</button>
                </form>
              </div>
            </li>
            @foreach ($mansion->images as $image)
              <li>
                <div class="img-wrapper">
                  <a href="{{ asset('uploads/'.$image->image) }}">
                    <img src="{{ asset('uploads/'.$image->image) }}" alt="" id="preview1">
                  </a>
                </div>
                <div class="img-controller">
                  <div class=""></div>
                  <form action="/admin/images/{{ $image->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button>削除</button>
                  </form>
                </div>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
    <form action="/admin/mansions/{{ $mansion->id }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <x-admin.mansionForm :mansion="$mansion" />
      <div class="admin-mansion-footer">
        <input type="hidden" name="_method" value="PUT">
        <button type="button" onclick="submitOnClick()"><span>更新</span></button>
      </div>
    </form>
  </div>
  <script defer>
    const h2 = document.querySelector('.section-h2 var');
    const input = document.getElementById('mansionTitle');
    input.addEventListener('input', function(e) {
      h2.textContent = e.target.value;
    });
  </script>
</x-admin.layout>