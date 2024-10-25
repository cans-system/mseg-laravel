@if ($sended)
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // ページの読み込みが完了したら実行
      document.querySelector(".contactform-form").style.display = "none";

      // statusIconsのクラス変更
      const statusIcons = document.querySelectorAll(".status-icon");
      statusIcons[0].classList.remove("active");
      statusIcons[1].classList.remove("active");
      statusIcons[2].classList.add("active");

      // 入力必須事項の文言を非表示
      document.querySelector(".supply").style.display = "none";
    });
  </script>
  <div style="padding: 30px; padding-bottom: 70px"><p style="text-align: center">送信が完了しました。</p></div>
@endif

<div class="contactform-form">
  <form action="" method="post" id="contactform-contact" name="contact">
    @csrf
    <h3>お客様情報</h3>
    <ul class="field-list">
      <li class="field-item">
        <div class="field-head"><label class="required">名前</label></div>
        <div class="field-body">
          <div class="field-children">
            <div class="child-field">
              <div class="child-head"><label>性</label></div>
              <div class="child-body"><input type="text" name="first_name"></div>
            </div>
            <div class="child-field">
              <div class="child-head"><label>名</label></div>
              <div class="child-body"><input type="text" name="last_name"></div>
            </div>
          </div>
        </div>
      </li>
      <li class="field-item">
        <div class="field-head"><label class="required">電話番号</label></div>
        <div class="field-body"><input type="tel" name="tel"></div>
      </li>
      <li class="field-item">
        <div class="field-head"><label class="required">メールアドレス</label></div>
        <div class="field-body"><input type="email" name="email"></div>
      </li>
    </ul>
    <h3>物件情報</h3>
    <ul class="field-list">
      <li class="field-item">
        <div class="field-head"><label class="required">マンション名・棟</label></div>
        <div class="field-body"><input type="text" name="manshion_name_bldg"></div>
      </li>
      <li class="field-item">
        <div class="field-head"><label class="required">部屋番号</label></div>
        <div class="field-body"><input type="text" name="room_number"></div>
      </li>
    </ul>
    <h3>お問い合わせ内容</h3>
    <ul class="field-list">
      <li class="field-item">
        <div class="field-head"><label class="required">お問い合わせ内容</label></div>
        <div class="field-body">
          <div class="select-wrapper">
            <select name="contact_content" id="">
              <option hidden>選択してください</option>
              <option value="相場が知りたい">相場が知りたい</option>
              <option value="簡易査定をご相談">簡易査定をご相談</option>
              <option value="書面査定書を希望">書面査定書を希望</option>
              <option value="買取をご相談">買取をご相談</option>
              <option value="その他">その他</option>
            </select>
          </div>
        </div>
      </li>
      <li class="field-item textarea">
        <div class="field-head">
          <label>備考</label>
          <p>※ご希望連絡時間やご相談物件の特徴などございましたらお聞かせください。</p>
        </div>
        <div class="field-body"><textarea name="note" id="" cols="30" rows="10"></textarea></div>
      </li>
    </ul>
    <div class="contactform-footer">
      <p>個人情報の取扱いについて<br class="sp-br">（必ずお読みください）</p>
      <div class="privacy-policy"><a href="/privacy-policy">プライバシーポリシー</a></div>
      <div class="approval">
        <p>
          <input type="hidden" name="approval" value="0">
          <input type="checkbox" name="approval" value="1" class="approvalInput">
          <label>上記に同意する<span> *</span></label>
        </p>
      </div>
      <div class="back"><button type="button" onclick="backOnClick()">入力画面に戻る</button></div>
      <div class="submit"><input type="submit" name="submit" value="送信する"></div>
      <div class="confirm"><button type="button" onclick="comfirmOnClick()">確認画面へ</button></div>
    </div>
  </form>
</div>
