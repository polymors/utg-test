<x-app>

	<div class="text-center mb-4">
		<div class="d-flex flex-wrap p-2 border pt-4 pb-4 mt-4 bg-white single-product">
			<div class="image col-sm-6 col-12">
				@if ($product->attachments)
					<img src="{{ $product->attachments[0]['path'] }}"/>
				@endif
			</div>
			<div class="col-sm-6 col-12 align-self-center ">
				<h3 class="name mt-4">{{ $product->name }} </h3>
				<h4 class="mt-3 mb-4">Price: $<span class="price">{{ $product->price }} </span></h4>
			</div>
		</div>
	</div>

	@include('layouts.featured-products')

</x-app>