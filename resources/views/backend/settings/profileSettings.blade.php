@extends('layouts.backend')

@section('content')

<section>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<div class="col-6">
							<h3 class="h4">@lang('laryl-settings.heading.profile')</h3>
						</div>
						{{-- <div class="col-6 text-right">
							<a href="{{ route('Products.products.create')  }}" class="bttn-plain">
								<i class="fa fa-user-plus"></i>&emsp;@lang('laryl-products.create-new')
							</a>
						</div> --}}
					</div>
					<div class="card-body">	
						<div class="container">
							<div class="row">
								<div class="col-md-8 mx-auto">
									<form method="POST" action="{{ route('Settings.profile.update', $setting->id) }}" enctype="multipart/form-data">

										@method('PUT')
										@csrf
								
										<div class="form-group row">
											<label for="businessName" class="col-md-12 col-form-label">@lang('laryl-settings.form.profile.label.businessName')</label>
								
											<div class="col-md-12">
												<input id="businessName" type="text" class="form-control t-cap" name="businessName" value="{{ $setting->businessName }}" autofocus>
											</div>

											@if ($errors->has('businessName'))
												<span class="col-md-12 form-error-message">
													<small for="businessName">{{ $errors->first('businessName') }}</small>
												</span>
											@endif
										</div>

										<div class="form-group row">
											<div class="col-sm-6 col-md-6">
												<div class="row">
													<label for="address" class="col-auto col-form-label">@lang('laryl-settings.form.profile.label.address')</label>
			
													<div class="col-md-12">
														<textarea id="address" rows=4 class="form-control autosize t-cap" name="address">{{old('address', $setting->address)}}</textarea>
													</div>
				
													@if ($errors->has('address'))
														<span class="col-md-12 form-error-message">
															<small for="address">{{ $errors->first('address') }}</small>
														</span>
													@endif
												</div>
											</div>
									
											<div class="col-sm-6 col-md-6">
												<div class="row">
													<label for="placeOfOrigin" class="col-md-12 col-form-label">@lang('laryl-settings.form.profile.label.placeOfOrigin')</label>
					
													<div class="col-md-12">
														<select id="placeOfOrigin" name="placeOfOrigin" class="form-control bfh-states" data-country="India" data-state="{{ old('placeOfOrigin', $setting->placeOfOrigin) }}"></select>
													</div>
				
													@if ($errors->has('placeOfOrigin'))
														<span class="col-md-12 form-error-message">
															<small for="placeOfOrigin">{{ $errors->first('placeOfOrigin') }}</small>
														</span>
													@endif
												</div>
											</div>
										</div>

										<div class="form-group row">

											<div class="col-md-6">
												<div class="form-group row">
													<label for="gstin" class="col-md-12 col-form-label">@lang('laryl-settings.form.profile.label.gstin')</label>
							
													<div class="col-md-12">
														<input id="gstin" type="text" class="form-control t-up" name="gstin" value="{{ $setting->gstin }}">
													</div>
		
													@if ($errors->has('gstin'))
														<span class="col-md-12 form-error-message">
															<small for="gstin">{{ $errors->first('gstin') }}</small>
														</span>
													@endif
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group row">
													<label for="panNumber" class="col-md-12 col-form-label">@lang('laryl-settings.form.profile.label.panNumber')</label>
													
													<div class="col-md-12">
														<input id="panNumber" type="text" class="form-control t-up" name="panNumber" value="{{ $setting->panNumber }}">
													</div>
				
													@if ($errors->has('panNumber'))
														<span class="col-md-12 form-error-message">
															<small for="panNumber">{{ $errors->first('panNumber') }}</small>
														</span>
													@endif
												</div>
											</div>
										</div>

										<div class="form-group row">
											
											<div class="col-12 col-md-6">
												<label for="bankName" class="col-form-label">@lang('laryl-settings.form.profile.label.bankName')</label>

												<input type="text" id="bankName" class="form-control" name="bankName" value="{{$setting->bankName}}">

												@if ($errors->has('bankName'))
													<span class="col-md-12 form-error-message">
														<small for="bankName">{{ $errors->first('bankName') }}</small>
													</span>
												@endif
											</div>

											<div class="col-12 col-md-6">
												<label for="bankBranch" class="col-form-label">@lang('laryl-settings.form.profile.label.bankBranch')</label>

												<input type="text" id="bankBranch" class="form-control" name="bankBranch" value="{{$setting->bankBranch}}">

												@if ($errors->has('bankBranch'))
													<span class="col-md-12 form-error-message">
														<small for="bankBranch">{{ $errors->first('bankBranch') }}</small>
													</span>
												@endif
											</div>

										</div>

										<div class="form-group row">

											<div class="col-12 col-md-6">
												<label for="bankAccount" class="col-form-label">@lang('laryl-settings.form.profile.label.bankAccount')</label>

												<input type="text" id="bankAccount" class="form-control" name="bankAccount" value="{{$setting->bankAccount}}">

												@if ($errors->has('bankAccount'))
													<span class="col-md-12 form-error-message">
														<small for="bankAccount">{{ $errors->first('bankAccount') }}</small>
													</span>
												@endif
											</div>

											<div class="col-12 col-md-6">
												<label for="bankIfsc" class="col-form-label">@lang('laryl-settings.form.profile.label.bankIfsc')</label>

												<input type="text" id="bankIfsc" class="form-control" name="bankIfsc" value="{{$setting->bankIfsc}}">

												@if ($errors->has('bankIfsc'))
													<span class="col-md-12 form-error-message">
														<small for="bankIfsc">{{ $errors->first('bankIfsc') }}</small>
													</span>
												@endif
											</div>

										</div>

										<div class="form-group row">
											<div class="col-12 col-md-6">
												<label for="profileLogo" class="col-form-label">@lang('laryl-settings.form.profile.label.profileLogo')</label>

												<input type="file" name="profileLogo" class="form-control" />
											</div>
											<div class="col-12 col-md-6">
												<label for="profileLogo" class="col-form-label">@lang('laryl-settings.form.profile.label.currentLogo')</label>
												@if($setting->logoPath != null)
													<img src="{{asset("storage/swiftbilling/$setting->logoPath")}}" height="100px" />
												@else
													{{-- <img src="{{asset("storage/swiftbilling/defaultLogo.png")}}" max-height="100px" /> --}}
													<span>No Active Logo.</span>
												@endif
											</div>
										</div>

										<div class="form-group row mb-0">
											<div class="col-auto ml-auto">
												<button type="submit" class="btn btn-success  ml-auto">
													@lang('laryl-settings.buttons.save-settings')
												</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@if ($errors->any())
 <script>
	@foreach ($errors->getMessages() as $key => $message)
		$("#{{$key}}.form-control").addClass("form-error-field");
	@endforeach
 </script>
@endif

<script>

	$(function() {
		
		autosize($('textarea.autosize'));

	});


</script>

@endsection