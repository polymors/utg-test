<div class="mt-5">

	@if (count($featured_products) > 0 )

		<h2 class="text-center pt-5">Featured products</h2>

		<div class="mt-5 featured-products">

			@foreach ($featured_products as $product)

				<div class="text-center mb-4 product-list-item">
					<div class="p-2  bg-white">
						<div class="image text-center">
							@isset($featured_products_attachments[$product->id])
								<img  class=" ml-auto mr-auto" src="{{ $featured_products_attachments[$product->id]['0']['path'] }}"/>
							@endisset
						</div>
						<h3 class="mt-2">{{ $product->name }} </h3>
						<span class="d-block m-2 font-weight-bold">${{ $product->price }} </span>
						<a class="btn btn-primary" href="{{ route('product', $product->slug) }}">View product</a>
					</div>
				</div>

			@endforeach
		</div>

	@else
		<h2 class="text-center">No featured products found...</h2>
	@endif

</div>