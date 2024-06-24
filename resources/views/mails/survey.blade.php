<x-mail::message>
【お客様情報】
名前: {{ $request->first_name }} {{ $request->last_name }}
名前(ひらがな): {{ $request->first_name_gana }} {{ $request->last_name_gana }}
電話番号: {{ $request->tel }}
メールアドレス: {{ $request->email }}

【アンケート】
ご家族: {{ $request->family }}
職業: {{ $request->job }}
勤務地等: {{ $request->job_field }}
勤続年数: {{ $request->length }}
現在の住居: {{ $request->house }}
現在の家賃: {{ $request->rent }}
現在の間取: {{ $request->floor }}
何で知りましたか: {{ $request->howknow }}
住宅を必要とする理由: {{ $request->reason }}
住宅購入の際お考えになること: {{ $request->worry }}
ご購入についてはお急ぎでしょうか: {{ $request->hurry }}
自己資金: {{ $request->fund }}
ご希望予算: {{ $request->budget }}
ご希望の間取: {{ $request->request_floor }}
月々の支払ご希望額: {{ $request->request_payment }}
年収: {{ $request->annual_income }}
ご希望物件: {{ $request->request_property }}
ご希望地域: {{ $request->request_area }}
備考: {{ $request->note }}
</x-mail::message>
