<x-app>
	
	<div class="text-center">
		<h1>Home page</h1>
	</div>

	@include('layouts.product-list')
	
	<div class="text-center p-4">
		<a href="{{ route('create_product')}}">Add new product</a>
	</div>

</x-app>
