<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Laryl Blade EN lines
	|--------------------------------------------------------------------------
	*/

	'heading' => [
		'list'		=> 'Users List',
		'new'		=> 'New User',
		'edit'   => 'Editing User <span class="d-none d-sm-inline">:name</span>',
		'show'	    => '\'s Information',

	],

	'table' => [
		'caption'   => '{1} :userscount user total|[2,*] :userscount total users',
		'serial'	=> '#',
		'id'        => 'ID',
		'name'      => 'Name',
		'email'     => 'Email',
		'role'      => 'Role',
		'created'   => 'Created',
		'updated'   => 'Updated',
		'actions'   => 'Actions',
		'updated'   => 'Updated',
		'options'	=> 'Options',
	],

	'form' => [
		'label' => [
			'username'			=> 'Username',
			'password'			=> 'Password',
			'confirmPassword'	=> 'Confirm Password',
			'newPassword'		=> 'New Password',
			'confirmNewPassword'=> 'Confirm New Password',
			'userRole'			=> 'User Role',
			'email'				=> 'E-Mail',
		],
		'placeholder' => [
			'username'			=> 'Enter your Username',
			'password'			=> 'Enter your Password',
			'confirmPassword'	=> 'Confirm your Password',
			'newPassword'		=> 'New Password',
			'confirmNewPassword'=> 'Confirm New Password',
			'userRole'			=> 'User Role',
			'email'				=> 'Enter your E-Mail',
		]
	],

	'buttons' => [
		'create-new'    => '<span class="hidden-xs hidden-sm">New User</span>',
		'back-to-users' => '<i class="fa fa-angle-double-left"></i>&emsp;Back <span class="d-none d-sm-inline">to Users List</span>',
		'back-to-user'  => '<i class="fa fa-angle-double-left"></i>&emsp;Back <span class="d-none d-sm-inline">to User</span>',
		'save-user' => '<i class="fa fa-save"></i>&emsp;<span>Save User</span>',
		'update-user'	=> '<i class="fa fa-save"></i>&emsp;<span>Update User</span>',
	],


];
