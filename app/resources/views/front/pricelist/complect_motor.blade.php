<div class="rn-bold">Исполнение {{$complect->code}}</div>
<div>Двигатель {{$complect->motor->type->name}} {{$complect->motor->valve}} клапанный</div>
<div>Рабочий объем {{$complect->motor->size/1000}}л. ({{$complect->motor->power}} л.с.)</div>
<div>КПП {{$complect->motor->transmission->full_name}}</div>
<div>Привод {{$complect->motor->driver->full_name}}</div>