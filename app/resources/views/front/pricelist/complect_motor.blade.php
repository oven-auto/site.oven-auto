<div class="rn-bold">Исполнение {{$complect->code}}</div>
<div>Двигатель <span class="lowercase">{{$complect->motor->type->name}} {{$complect->motor->valve}} клапанный</span></div>
<div>Рабочий объем <span class="lowercase">{{$complect->motor->size/1000}}л. ({{$complect->motor->power}} л.с.)</span></div>
<div>КПП <span class="lowercase">{{$complect->motor->transmission->full_name}}</span></div>
<div>Привод <span class="lowercase">{{$complect->motor->driver->full_name}}</span></div>