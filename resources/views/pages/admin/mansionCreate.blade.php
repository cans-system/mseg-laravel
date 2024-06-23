<x-admin.layout>
  <div class="subpage-h2">
    <div>
      <h2 class="section-h2"><var>マンション新規登録</var>
        <div><span></span><p>create</p></div>
      </h2>
    </div>
  </div>
  <div class="admin-mansions-edit">
    <div class="back-to-index">
      <a href="{{ url("/admin/mansions") }}">← マンション一覧に戻る</a>
    </div>
    <div class="mansion-stmt">
      <p>
        <span>新規登録</span>
      </p>
    </div>
    <div style="margin-bottom: 12px;">
      ※画像の設定は作成後に行えます
    </div>
    <form action="/admin/mansions" method="post" enctype="multipart/form-data">
      @csrf
      <x-admin.mansionForm :mansion="$mansion" />
      <div class="admin-mansion-footer">
        <button class="create" type="button" onclick="submitOnClick(true)"><span>新規登録</span></button>
      </div>
    </form>
  </div>
</x-admin.layout>