【お客様情報】<br>
名前: {{ $request->first_name }} {{ $request->last_name }}<br>
電話番号: {{ $request->tel }}<br>
メールアドレス: {{ $request->email }}<br>
<br>
【物件情報】<br>
マンション名・棟: {{ $request->manshion_name_bldg }}<br>
部屋番号: {{ $request->room_number }}<br>
<br>
【お問い合わせ内容】<br>
お問い合わせ内容: {{ $request->contact_content }}<br>
備考: {{ $request->not }} <br>
