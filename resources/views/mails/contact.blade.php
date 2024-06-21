【お客様情報】
名前: {{ $request->first_name }} {{ $request->last_name }}
名前(ひらがな): {{ $request->first_name_gana }} {{ $request->last_name_gana }}
電話番号: {{ $request->tel }}
メールアドレス: {{ $request->email }}

【物件情報】
マンション名・棟: {{ $request->manshion_name_bldg }}
部屋番号: {{ $request->room_number }}
物件所在地: {{ $request->address }}

【お問い合わせ内容】
お問い合わせ内容: {{ $request->contact_content }}
備考: {{ $request->not }} 