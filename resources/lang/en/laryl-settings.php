<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Laryl Blade EN lines
	|--------------------------------------------------------------------------
	*/

	'heading'	=> [
		'profile' => 'Profile Settings',
		'invoice' => 'Invoice Settings',
	],

	'form'		=> [
		'profile'	=> [
			'label'	=> [
				'businessName'	=> 'Firm Name',
				'gstin'		=> 'GSTIN',
				'panNumber'		=> 'PAN No.',
				'address'		=> 'Address',
				'placeOfOrigin'		=> 'State',
				'bankName'		=> 'Bank Name',
				'bankAccount'	=> 'Bank Account Number',
				'bankIfsc'		=> 'Bank IFSC Code',
				'bankBranch'	=> 'Bank Branch',
				'profileLogo'	=> 'Business Logo',
				'currentLogo'	=> 'Active Logo : &emsp;',
			]
		],
		'invoice'	=> [
			'label'	=> [
				'prefix'		=> 'Invoice Prefix',
				'startserial'	=> 'Starting Serial',
				'invoiceNotes'	=> 'Notes',
				'invoiceTerms'	=> 'Terms & Conditions',
			]
		],
	],

	'buttons'	=> [
		'save-settings'	=> '<i class="fa fa-save"></i>&emsp;<span>Save Settings</span>',
	],

];
