<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Laryl Blade EN lines
	|--------------------------------------------------------------------------
	*/

	'create-new'	=> 'New Product',

	'heading' => [
		'list'		=> 'Products Master List',
		'new'		=> 'New Product',
		'show'	    => '\'s Information',
		'edit'   	=> 'Editing Product <span class="d-none d-sm-inline">:product</span>',
	],

	'table' => [
		'serial'			=> '#',
		'description'		=> 'Item Description',
		'hsn'				=> 'HSN/SAC Code',
		'sku'				=> 'SKU/Item Code',
		'taxRate'			=> 'Tax (%)',
		'saleValue'		=> 'Selling Price',
		'options'			=> 'Options',
	],

	'form' => [
		'label' => [
			'description'		=> 'Item Description',
			'type'				=> 'Item Type',
			'hsn'				=> 'HSN/SAC Code',
			'sku'				=> 'SKU/Item Code',
			'taxRate'			=> 'Tax Rate (%)',
			'cessValue'		=> 'Cess Amount',
			'saleValue'		=> 'Selling Price',
			'unit'				=> 'Product Unit',
			'discountRate'	=> 'Discount (%)',
			'productsExcel'	=> 'Excel File - Products (.xlsx)',
		]
	],

	'buttons' => [
		'create-new'    	=> '<span class="hidden-xs hidden-sm">New Product</span>',
		'back-to-products'	=> '<i class="fa fa-angle-double-left"></i>&emsp;Back <span class="d-none d-sm-inline">to Products List</span>',
		'back-to-product'	=> '<i class="fa fa-angle-double-left"></i>&emsp;Back <span class="d-none d-sm-inline">to Product</span>',
		'save-product'		=> '<i class="fa fa-save"></i>&emsp;<span>Save Product</span>',
		'update-product'	=> '<i class="fa fa-save"></i>&emsp;<span>Update Product</span>',
		'upload-file'		=> '<i class="fa fa-save"></i>&emsp;<span>Upload File</span>',
	],
];
