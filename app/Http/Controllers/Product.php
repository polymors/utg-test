<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Models\ProductAttachments;
use App\Http\Controllers\FileUpload;

class Product extends Controller
{
	
	// Show form for create product
	public function create()
	{
		return view('product-create');
	}
	
	// Save product
	public function add(Request $request)
	{

		$request->validate([
			'name'  => 'required|max:255',
			'price' => 'required|numeric',
			'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1920'
		]);

		$product_id = Products::insertGetId([
			'name'  => $request->name,
			'price' => $request->price,
			'created_at' => date('Y-m-d H:i:s')
		]);
		
		if ($product_id) {
			$slug = $request->name.'_'.$product_id;

			Products::where('id', $product_id)
				->update(['slug' => $slug]);

			if ($request->file){
				
				// Save attachment
				FileUpload::upload_product_attachment($request, $product_id);
			}
			
			return back()->with('success','Product created successfull')
				->with('product_id', $product_id)
				->with('product_name', $request->name)
				->with('product_slug', $slug);
		}

		return back()->with('error','Error! Product was not created');
	}

	// Get single product
	public function get(Request $request, $slug)
	{		
		$product = Products::where('slug', $slug)
			->first();

		if ($product) {

			$product->attachments = $this->get_product_attachments($product->id);

			$featured_products = $this->get_featured_products($product->id);

			foreach ($featured_products as $featured_product) {
				$featured_products_attachments[$featured_product->id] = $this->get_product_attachments($featured_product->id);
			}

			return view('single-product', compact('product', 'featured_products', 'featured_products_attachments'));
		} else {
			return view('404', ['message' => 'Product not found'] );
		}
	}

	// Get Product list
	public function get_list(Request $request)
	{
		if ( isset($request->sort) && isset($request->order)) {
			$sort = $request->sort;
			$order = $request->order;
		} else {
			$sort = 'id';
			$order = 'desc';
		}

		$products = Products::orderBy($sort, $order)
			->paginate(6);

		foreach ($products as $product) {
			$product_attachments[$product->id] = $this->get_product_attachments($product->id);
		}

		return view('front-page', compact('products','request','product_attachments'));
	}

	// Get featured product list
	public function get_featured_products($id)
	{
		$products = Products::where('id', '!=', $id)
			->inRandomOrder()->limit(6)->get();

		return $products;
	}

	// Get product attachments
	public function get_product_attachments ($product_id)
	{

		return ProductAttachments::where('product_id', $product_id )
			->get()->toArray();

	}
}
