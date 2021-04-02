@component('mail::message')
# Форма тест-драйв
# Дата {{date('d.m.Y')}}

Имя клиента: {{$data['username']}}<br>
Телефон клиента: {{$data['userphone']}}<br>
Комментарий клиента: {{$data['usercomment']}}<br>
<br>
<br>
Получено со страницы: <a href="{{$data['url']}}">{{$data['url']}}</a>

<!-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent -->

<!-- Thanks,<br>
{{ config('app.name') }} -->
@endcomponent