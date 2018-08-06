<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Laryl Blade EN lines
	|--------------------------------------------------------------------------
	*/

	'create-new'	=> 'New Invoice',

	'heading' => [
		'list'		=> 'Invoices Master List',
		'new'		=> 'New Invoice',
		'show'	    => 'Invoice :invoice',
		'edit'   	=> 'Editing Invoice <span class="d-none d-sm-inline">:invoice</span>',
	],

	'table' => [
		'#'					=> '#',
		'issueDate'			=> 'Inv. Date',
		'dueDate'			=> 'Due Date',
		'invoiceStatus'		=> 'Invoice Status',
		'grandValue'		=> 'Grand Total',
		'options'			=> 'Options',
	],

	'form' => [
		'label' => [
			'invoiceSerial'		=> 'Invoice Serial',
			'issueDate'			=> 'Invoice Date',
			'dueDate'			=> 'Invoice Due Date',
			'customerName'		=> 'Customer Name',
			'customerGstin'		=> 'Customer GSTIN',
			'customerMobile'	=> 'Customer Mobile',
			'billingAddress'	=> 'Billing Address',
			'shippingAddress'	=> 'Shipping Address',
			'placeOfSupply'		=> 'Place of Supply',
			'discountRate'		=> 'Discount (%)',
			'invoiceStatus'		=> 'Invoice Status',
		]
	],

	'buttons' => [
		'create-new'    	=> '<span class="hidden-xs hidden-sm">New Invoice</span>',
		'back-to-invoices'	=> '<i class="fa fa-angle-double-left"></i>&emsp;Back <span class="d-none d-sm-inline">to Invoices List</span>',
		'back-to-invoice'	=> '<i class="fa fa-angle-double-left"></i>&emsp;Back <span class="d-none d-sm-inline">to Invoice</span>',
		'save-invoice'		=> '<i class="fa fa-save"></i>&emsp;<span>Save Invoice</span>',
		'update-invoice'	=> '<i class="fa fa-save"></i>&emsp;<span>Update Invoice</span>',
	],
];
