<div class="col-4">
  <a href="{{route('front.pricelist',$itemModel->slug)}}" class="tab-model-link">
    <div class="tab-model-bg">
      <img src="{{asset('storage/'.$itemModel->icon)}}">
    </div>
    <div class="tab-model-title">
      {{$itemModel->name}}
    </div>
    <div class="tab-model-title">
      от {{$itemModel->minPrice}}
    </div>
    <div class="tab-model-count">
      в наличии {{$itemModel->countCars}}
    </div>
  </a>
</div>