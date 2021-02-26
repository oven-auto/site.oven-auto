<div class="col-3">
  <img src="{{asset('storage/'.$itemModel->alpha)}}">
  <div class="">
    {{$itemModel->name}}
  </div>
  <div class="">
    от {{$itemModel->minPrice}}
  </div>
  <div class="">
    в наличии {{$itemModel->countCars}}
  </div>
</div>