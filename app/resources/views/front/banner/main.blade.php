<div class="container banners">
	<div class="banner-carousel">
	  @foreach($banners as $itemBanner)
	  	<div class="">
	  		<img src="{{asset('storage/'.$itemBanner->img)}}">
	  	</div>
	  @endforeach
	</div>
</div>