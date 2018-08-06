<?php

namespace App\Http\Controllers\Backend\Settings;

use App\InvoiceSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\AceController\Controller;

use Validator;

class InvoiceSettingsController extends Controller
{
	public function __construct(Request $request)
	{
		$request->route()->setParameter('page-heading', 'Settings');		
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$setting = InvoiceSetting::find(1);
		return view('backend.settings.invoicesettings', compact('setting'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$rules = array(
			'serialPrefix'			=> 'required|string|max:15',
			'serialNumberStart'		=> 'required|string|max:15',
		);

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			
			toast('Rectify errors and re-submit!','error','top-right')->autoclose(3500);

			return redirect()->route('Settings.invoice.index')
				->withErrors($validator)
				->withInput($request->input());

		} else {

			InvoiceSetting::whereId($id)->update($request->except('_token', '_method'));

			// redirect
			toast('Settings Updated Successfully!','success','top-right')->autoclose(3500);
			return redirect()->route('Settings.invoice.index');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
