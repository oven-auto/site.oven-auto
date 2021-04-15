@component('mail::message')
@if($data['type'] == 'sale')
# Форма обсудить покупку готового автомобиля
@endif

@if($data['type'] == 'config')
# Форма обсудить покупку сконфигурированного автомобиля
@endif

# Дата {{date('d.m.Y')}}


<img src="{{asset('storage/'.$data['car']->img)}}"><br> 
Автомобиль: {{$data['car']->mark->name}} {{$data['car']->complect->getFrontNameAttribute()}}<br>
VIN: {{$data['car']->vin}}<br>
Поставка: {{$data['car']->getStatus()}}<br>
Стоимость автомобиля: {{number_format($data['car']->total_price,0,'',' ')}} руб.<br>

<br>
<br>



@if(isset($data['packs']))

# Клиент выбрал следующие опции

@foreach($data['packs'] as $itemPack)
{{$itemPack->code}}: {{number_format($itemPack->price,0,'' ,' ')}} руб.<br>
@endforeach

@endif


<hr>
<br>

<?php if(isset($data['companies']) && count($data['companies'])): ?>

# Клиент выбрал следующие коммерческие акции<br>

<?php $sum = 0;?>

<?php foreach($data['companies'] as $itemCompany) : ?>

{{$itemCompany->company->controll->name}}: {{number_format($itemCompany->price($car),0,'',' ')}} руб.<br>

<?php $sum += $itemCompany->price($car);?>

<?php endforeach;?>
<hr>
Итого коммерческие акции: {{number_format(abs($sum),0,'',' ')}} руб.<br>
Клиент соориентирован на примерную сумму: {{ number_format($data['car']->total_price + $sum,0,'',' ')}} руб.<br>
<?php endif;?>






<br>
<br>
<br>
Имя клиента: {{$data['username']}}<br>
Телефон клиента: {{$data['userphone']}}<br>
Комментарий клиента: {{$data['usercomment']}}<br>
<br>
Получено со страницы: <a href="{{$data['url']}}">{{$data['url']}}</a>

<!-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent -->

<!-- Thanks,<br>
{{ config('app.name') }} -->
@endcomponent