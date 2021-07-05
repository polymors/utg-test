<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductAttachments;

class FileUpload extends Controller
{
	//

	public static function upload_product_attachment(Request $request, $product_id)
	{

		$request->validate([
		'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1920'
		]);

		$fileModel = new ProductAttachments;

		$filename = time().'_'.$request->file->getClientOriginalName();
		$filepath = $request->file('file')->storeAs('uploads/products', $filename, 'public');

		$fileModel->product_id = $product_id;
		$fileModel->filename = $filename;
		$fileModel->path = '/storage/' . $filepath;

		$fileModel->save();
	
	}
}
