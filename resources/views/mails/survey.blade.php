【お客様情報】<br>
名前: {{ $request->first_name }} {{ $request->last_name }}<br>
名前(ひらがな): {{ $request->first_name_gana }} {{ $request->last_name_gana }}<br>
電話番号: {{ $request->tel }}<br>
メールアドレス: {{ $request->email }}<br>
<br>
【アンケート】<br>
ご家族: {{ $request->family }}<br>
職業: {{ $request->job }}<br>
勤務地等: {{ $request->job_field }}<br>
勤続年数: {{ $request->length }}<br>
現在の住居: {{ $request->house }}<br>
現在の家賃: {{ $request->rent }}<br>
現在の間取: {{ $request->floor }}<br>
何で知りましたか: {{ $request->howknow }}<br>
住宅を必要とする理由: {{ $request->reason }}<br>
住宅購入の際お考えになること: {{ $request->worry }}<br>
ご購入についてはお急ぎでしょうか: {{ $request->hurry }}<br>
自己資金: {{ $request->fund }}<br>
ご希望予算: {{ $request->budget }}<br>
ご希望の間取: {{ $request->request_floor }}<br>
月々の支払ご希望額: {{ $request->request_payment }}<br>
年収: {{ $request->annual_income }}<br>
ご希望物件: {{ $request->request_property }}<br>
ご希望地域: {{ $request->request_area }}<br>
備考: {{ $request->note }}
