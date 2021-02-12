<div class="container p-0">
	@if(session('status'))


		    <div class="alert alert-danger">
			    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ session('status') }}
			</div>

	@endif

	@if ($errors->any())
	    <div class="alert alert-danger">
	    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
</div>