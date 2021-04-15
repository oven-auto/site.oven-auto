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
		Прайс-лист {{$complect->mark->name}} {{$complect->full_name}}
	</div>

	<div style="padding: 5px 10px;">
		<table style="width: 100%;">
			@if(isset($complect->mark) && $complect->mark->colors->count())

				@foreach($complect->complectcolors->chunk(4) as $chunk)
				<tr>
					@foreach($chunk as $itemComplectColor)
						@if($complect->mark->colors->contains('color_id',$itemComplectColor->color_id))
						<td style="width: 24%;">
							<img 
							style="width: 100%;" 
							src="{{storage_path('app/public/'.$complect->mark->colors->where('color_id',$itemComplectColor->color_id)->first()->img)}}"
							>
							<div style="font-size: 7px;text-align: center;">
								{{$complect->mark->colors->where('color_id',$itemComplectColor->color_id)->first()->color->name}}
							</div>
						</td>
						@endif
					@endforeach
				</tr>
				@endforeach					
			@endif			
		</table>
	</div>

	<div style="background: #ddd;color: #333;font-size: 14px;padding: 5px 10px;">
		<table style="width: 100%;">
			<tr>
				<td style="">
					Состав базовой комплектации
				</td>

				<td style="text-align: right;">
					{{number_format($complect->price,0,'',' ')}} руб.
				</td>
			</tr>
		</table>
	</div>

	<div style="padding: 5px 10px;font-size: 9px;color: #666;">
		<table style="width: 100%;">
			<tr>
				@foreach($complect->options->chunk(ceil($complect->options->count()/2)+2) as $chunk)
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
					
				</td>
			</tr>
		</table>
	</div>

	<div style="padding: 5px 0px;font-size: 9px;color: #666;">
		<table style="width: 100%;">
				
				@foreach($complect->packs->chunk(2) as $chunk)

					<tr>
						@foreach($chunk as $itemPack)
						<td style="vertical-align: top;width: 50%;padding: 10px;">
							<b>{{$itemPack->pack->code}}</b><br>
							@foreach($itemPack->pack->options as $itemOption)
								<div>{{$itemOption->option->name}}</div>
							@endforeach

							<div style="font-size: 12px;text-align: right;">
								{{number_format($itemPack->pack->price,0,'',' ')}} руб.
							</div>
						</td>
						@endforeach
					</tr>

				@endforeach

		</table>
	</div>

</body>
</html>