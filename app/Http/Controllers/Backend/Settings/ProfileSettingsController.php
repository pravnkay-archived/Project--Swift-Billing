<?php

namespace App\Http\Controllers\Backend\Settings;

use App\ProfileSetting;
use Illuminate\Http\Request;
use Illuminate\Http\UploadFile;
use App\Http\Controllers\AceController\Controller;

Use Validator;
use Storage;

class ProfileSettingsController extends Controller
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
		$setting = ProfileSetting::find(1);

        return view('backend.settings.profilesettings', compact('setting'));
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
			'businessName'	=> 'required|string|max:255',
			'gstin'         => 'required|regex:/\d{2}[a-zA-Z]{5}\d{4}[a-zA-Z]{1}[0-9]{1}[zZ][0-9]{1}/',
			'panNumber'     => 'required|regex:/[a-zA-Z]{5}\d{4}[a-zA-Z]{1}/',
			'address'     	=> 'required',
			'placeOfOrigin'	=> 'required',
			'profileLogo'	=> 'image|nullable|max:1999',
		);

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			
			toast('Rectify errors and re-submit!','error','top-right')->autoclose(3500);

			return redirect()->route('Settings.profile.index')
				->withErrors($validator)
				->withInput($request->input());

		} else {

			if($request->has('profileLogo')){

				$extension = $request->file('profileLogo')->extension();
				$filenameToStore = 'profileLogo'.'_'.time().'.'.$extension;
				$path = $request->file('profileLogo')->storeAs('public/swiftbilling', $filenameToStore);

			}

			$request->request->add(['logoPath' => $filenameToStore]);

            ProfileSetting::whereId($id)->update($request->except('_token', '_method', 'profileLogo'));

			// redirect
			toast('Settings Updated Successfully!','success','top-right')->autoclose(3500);
			return redirect()->route('Settings.profile.index');
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
