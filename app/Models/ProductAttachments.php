<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttachments extends Model
{
	use HasFactory;

	public $timestamps = true;

	protected $table = 'product_attachments';
	protected $fillable = [
		'product_id',
		'filename',
		'path'
	];
}
