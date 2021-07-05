<div class="p-4">
	@if (count($products) > 0 )

	<div class="d-flex justify-content-end m-3 mr-0">
		<div>
			Sort by:
			 <a href="?sort=price&order=asc" class="@if ($request->sort == 'price' &&  $request->order == 'asc') font-weight-bold @endif">Price low</a>
			 <a href="?sort=price&order=desc" class="@if ($request->sort == 'price' &&  $request->order == 'desc') font-weight-bold @endif">Price hight</a>
		</div>
	</div>

	<div class="d-flex justify-content-flex-start flex-wrap">

		@foreach ($products as $product)

			<div class="col-lg-4 text-center mb-4">
				<div class="p-4 border bg-white product-list-item">
					<div class="image">
						@isset($product_attachments[$product->id])
							<img src="{{ $product_attachments[$product->id]['0']['path'] }}"/>
						@endisset
					</div>
					<h3 class="mt-2">{{ $product->name }} </h3>
					<span class="d-block m-2 font-weight-bold">${{ $product->price }} </span>
					<a class="btn btn-primary" href="{{ route('product', $product->slug) }}">View product</a>
				</div>
			</div>

		@endforeach
	</div>

	<div class="navigation-links mt-5 text-center">

		@if (isset($request->sort) && isset($request->order) )
			{{ $products->appends(['sort' => $request->sort, 'order' => $request->order])->links() }}
		@else
			{{ $products->links() }}
		@endif

	</div>

	@else
		<h2 class="text-center">No products found...</h2>
	@endif

</div>