<x-app>

	<div class="text-center">
		<h1>Add new product</h1>
	</div>

	<div class="border p-4 ml-auto mr-auto form-t1">

		<form method="POST" action="{{ route('add_product')}}" enctype="multipart/form-data">
			@csrf
			<div class="form-group mb-4">
				<label class="form-label" for="name">Name</label>
				<input type="text" name="name" id="name" class="form-control" placeholder="name" required/>
			</div>

			<div class="form-group mb-4">
				<label class="form-label" for="price">Price</label>
				<input type="number" name="price" id="price" class="form-control" placeholder="price" step="any"/>
			</div>

			<div class="custom-file mb-3">
				<label for="file" class="custom-file-label"> Product image</label>
				<input type="file" class="custom-file-input" name="file" id="file" required/>
				<div class="invalid-feedback">Example invalid custom file feedback</div>
			</div>

			<button type="submit" class="btn btn-primary btn-block" data-toggle="button" >Create</button>
		</form>

		@if ($errors->any())
		<div class="alert alert-danger mt-4">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		
		@if ( null !== session('success') )
			<div class="alert alert-success mt-4">
			<p>{{ session('success') }}:</p>
			<p>Link: <a href="{{ route('product', ['slug' => session('product_slug')]) }} ">{{ session('product_name') }}</a></p>
			</div>
		@endif
	</div>
	
</x-app>