@if(session('status'))
<div class="container p-0">

	    <div class="alert alert-danger">
		    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			{{ session('status') }}
		</div>
</div>
@endisset