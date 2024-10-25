【物件情報】<br>
マンション名・棟: {{ $request->manshion_name_bldg }}<br>
部屋番号: {{ $request->room_number }}<br>
物件所在地: {{ $request->address }}<br>
ご売却希望価格: {{ $request->sales }}<br>
残債: {{ $request->loan }}<br>
ご売却予定時期: {{ $request->schedule }}<br>
<br>
【お客様情報】<br>
名前: {{ $request->first_name }} {{ $request->last_name }}<br>
電話番号: {{ $request->tel }}<br>
メールアドレス: {{ $request->email }}<br>
<br>
【お問い合わせ内容】<br>
お問い合わせ内容: {{ $request->contact_content }}<br>
備考: {{ $request->note }}
