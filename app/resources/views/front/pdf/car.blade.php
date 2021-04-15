<!DOCTYPE html>
<html>
<head>
    <title>Invoice Example</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
		body { font-family: DejaVu Sans, sans-serif;font-size: 12px; }
    </style>
</head>

<body>
	<div style="background: #333;color: #fff;padding: 5px 10px;">
		<div style="font-size: 20px;">ООО "Фирма "Овен-Авто"</div>
		<div>г. Сыктывкар, ул. Гаражная, 1</div>
		<div>Телефон отдела продаж: 8 (8212) 288 588</div>
		<div>Email: renault@oven-auto.ru</div>
	</div>

	<div style="background: #fc3; color: #333;padding:5px 10px;">
		КОММЕРЧЕСКОЕ ПРЕДЛОЖЕНИЕ НА АВТОМОБИЛЬ
	</div>

	<div style="padding: 5px 10px;">
		<table>
			<tr>
				<td style="font-size: 14px;">
					<div style="padding-bottom: 5px;">Модель: {{$car->mark->brand->name}} {{$car->mark->name}}</div>
					<div style="padding-bottom: 5px;">Комплектация: {{$car->complect->front_name}}</div>
					<div style="padding-bottom: 5px;">Цвет: {{$car->color->name}}</div>
					<div style="padding-bottom: 5px;">VIN-номер: {{$car->vin}}</div>
					<div>Год выпуска: {{$car->year}}</div>
				</td>

				<td style="text-align: center;">
					<img src="{{storage_path('app/public/'.$car->img)}}" style="width: 300px;">
					<div style="font-size: 8px;color: #666;text-align: center;">
						Автомобиль на эскизе может отличаться от реального
					</div>
				</td>
			</tr>
		</table>
	</div>

	<div style="background: #ddd;color: #333;font-size: 14px;padding: 5px 10px;">
		<table style="width: 100%;">
			<tr>
				<td style="">
					Состав базовой комплектации
				</td>

				<td style="text-align: right;">
					{{number_format($car->complect->price,0,'',' ')}} руб.
				</td>
			</tr>
		</table>
	</div>

	<div style="padding: 5px 10px;font-size: 9px;color: #666;">
		<table style="width: 100%;">
			<tr>
				@foreach($car->complect->options->chunk(ceil($car->complect->options->count()/2)+2) as $chunk)
					<td style="width: 50%;vertical-align: top;">
						@foreach($chunk as $itemOption)
							{{$itemOption->option->name}}<br>
						@endforeach
					</td>
				@endforeach
			</tr>
		</table>
	</div>

	<div style="background: #ddd;color: #333;font-size: 14px;padding: 5px 10px;">
		<table style="width: 100%;">
			<tr>
				<td style="">
					Опционное оборудование
				</td>

				<td style="text-align: right;">
					{{
						number_format($car->packs->sum(function($pack){
							return $pack->pack->price;
						}),0,'',' ').' руб.'
					}}
				</td>
			</tr>
		</table>
	</div>

	<div style="padding: 5px 10px;font-size: 9px;color: #666;">
		<table style="width: 100%;">
				
				@foreach($car->packs->chunk(2) as $chunk)

					<tr>
						@foreach($chunk as $itemPack)
						<td style="vertical-align: top;width: 50%;">
							<b>{{$itemPack->pack->code}}</b><br>
							@foreach($itemPack->pack->options as $itemOption)
								<div>{{$itemOption->option->name}}</div>
							@endforeach
						</td>
						@endforeach
					</tr>

				@endforeach

		</table>
	</div>

	<div style="background: #ddd;color: #333;font-size: 14px;padding: 5px 10px;">
		<table style="width: 100%;">
			<tr>
				<td style="">
					Дополнительное оборудование
				</td>

				<td style="text-align: right;">
					{{number_format($car->option_price,0,'',' ')}} руб.
				</td>
			</tr>
		</table>
	</div>

	<div style="padding: 5px 10px;font-size: 9px;color: #666;">
		<table style="width: 100%;">
			<tr>
				@foreach($car->options->chunk(ceil($car->options->count()/2)) as $chunk)
					<td style="width: 50%;vertical-align: top;">
						@foreach($chunk as $itemOption)
							{{$itemOption->option->name}}<br>
						@endforeach
					</td>
				@endforeach
			</tr>
		</table>
	</div>

	<div style="text-align: right;font-size: 20px;">
		{{number_format($car->total_price,0,'',' ')}} руб.
	</div>

</body>
</html>