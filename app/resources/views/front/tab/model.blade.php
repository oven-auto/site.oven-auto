<div class="container model-tabs" >
  <!-- Nav tabs -->
  <ul class="nav nav-justified d-flex align-items-stretch" id="nav-tabs" role="tablist">
      <li class="nav-item d-flex align-items-stretch">
            <a class="nav-link active d-flex align-items-center" 
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
    @if($models->contains('body_id',$itemBody->id))
      <li class="nav-item d-flex align-items-stretch">
          <a class="nav-link  d-flex align-items-center" 
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
    @endif
  @endforeach
  </ul>


  <!-- Tab panes -->
  <div class="tab-content container pt-5">

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

            <div class="col-12">
              {{$itemBody->name}} отсутствуют
            </div>
          
          </div>

        </div>

      @endif
    @endforeach
  </div>
</div>