<!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
          <a class="nav-link active" 
            id="model-tab-all" 
            data-toggle="tab" 
            href="#model-tab-content-all" 
            role="tab" 
            aria-controls="settings" 
            aria-selected="false"
          >
              Все модели
          </a>
    </li>
@foreach($bodies as $itemBody)
    <li class="nav-item">
        <a class="nav-link" 
          id="model-tab-{{$itemBody->id}}" 
          data-toggle="tab" 
          href="#model-tab-content-{{$itemBody->id}}" 
          role="tab" 
          aria-controls="settings" 
          aria-selected="false"
        >
            {{$itemBody->name}}
        </a>
  </li>
@endforeach
</ul>


<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="model-tab-content-all" role="tabpanel" aria-labelledby="model-tab-all">
    <div class="row">
    @foreach($models as $itemModel)
        @include('front.tab.item-model')
    @endforeach
    </div>
  </div>

  @foreach($bodies as $itemBody)
    @if($models->contains('body_id',$itemBody->id))
      <div class="tab-pane" id="model-tab-content-{{$itemBody->id}}" role="tabpanel" aria-labelledby="model-tab-{{$itemBody->id}}">
        <div class="row"> 
          @foreach($models->where('body_id',$itemBody->id) as $itemModel)
              @include('front.tab.item-model')
          @endforeach
        </div>
      </div>
    @else
      <div class="tab-pane" id="model-tab-content-{{$itemBody->id}}" role="tabpanel" aria-labelledby="model-tab-{{$itemBody->id}}">
        <div class="row">
          <div class="col">
            {{$itemBody->name}} отсутствуют
          </div>
        </div>
      </div>
    @endif
  @endforeach
</div>