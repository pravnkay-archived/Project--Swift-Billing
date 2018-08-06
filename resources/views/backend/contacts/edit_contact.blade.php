@extends('layouts.backend')

@section('content')

<section>
	<div class="container-fluid" id="app">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<div class="col-6">
							<h3 class="h4">@lang('laryl-contacts.heading.edit', ['name'=> $contact->name])</h3>
						</div>
						<div class="col-6 text-right">
							<a href="{{ route('Contacts.contacts.show', $contact->id)  }}" class="bttn-plain">
								@lang('laryl-contacts.buttons.back-to-contact')
							</a>
						</div>
					</div>
					<div class="card-body">
						<div class="container">

							<div class="row">
								<div class="col-md-8 mx-auto">

							<form method="POST" action="{{ route('Contacts.contacts.update', $contact->id) }}">
								
								@method('PUT')
								@csrf
						
								<div class="form-group row">
									<label for="name" class="col-md-12 col-form-label">@lang('laryl-contacts.form.label.name')</label>
						
									<div class="col-md-12">
										<input id="name" type="text" class="form-control t-cap" name="name" value="{{ $contact->name }}" autofocus>
									</div>

									@if ($errors->has('name'))
                                        <span class="col-md-12 form-error-message">
                                            <small for="name">{{ $errors->first('name') }}</small>
                                        </span>
									@endif
								</div>

								<div class="form-group row">
									<label for="gstin" class="col-md-12 col-form-label">@lang('laryl-contacts.form.label.gstin')</label>
						
									<div class="col-md-12">
										<input id="gstin" type="text" class="form-control t-up" name="gstin" value="{{ $contact->gstin }}" maxlength="15" >
									</div>

									@if ($errors->has('gstin'))
										<span class="col-md-12 form-error-message">
											<small for="gstin">{{ $errors->first('gstin') }}</small>
										</span>
									@endif
								</div>

								<div class="form-group row">

									<div class="col-md-6">
										<div class="form-group row">
											<label for="country" class="col-md-12 col-form-label">@lang('laryl-contacts.form.label.country')</label>
								
											<div class="col-md-12">
												<select name="country" id="country" class="form-control bfh-countries" data-country="India" readonly></select>
											</div>

											@if ($errors->has('country'))
												<span class="col-md-12 form-error-message">
													<small for="country">{{ $errors->first('country') }}</small>
												</span>
											@endif
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group row">
											<label for="state" class="col-md-12 col-form-label">@lang('laryl-contacts.form.label.state')</label>
											
											<div class="col-md-12">
												<select name="state" id="state" class="form-control bfh-states" data-country="country" data-state="{{ $contact->state }}" > </select>
											</div>
		
											@if ($errors->has('state'))
												<span class="col-md-12 form-error-message">
													<small for="state">{{ $errors->first('state') }}</small>
												</span>
											@endif
										</div>
									</div>

								</div>

								<div class="form-group row">

									<div class="col-md-6">
										<div class="form-group row">
											<label for="person" class="col-md-12 col-form-label">@lang('laryl-contacts.form.label.person')</label>
											
											<div class="col-md-12">
												<input id="person" type="text" class="form-control t-cap" name="person" value="{{ $contact->person }}">
											</div>
		
											@if ($errors->has('person'))
												<span class="col-md-12 form-error-message">
													<small for="person">{{ $errors->first('person') }}</small>
												</span>
											@endif
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group row">
											<label for="mobile" class="col-md-12 col-form-label">@lang('laryl-contacts.form.label.mobile')</label>
											
											<div class="col-md-12">
												<input id="mobile" type="text" class="form-control bfh-phone" name="mobile" data-country="country" value="{{ $contact->mobile }}">
											</div>
		
											@if ($errors->has('mobile'))
												<span class="col-md-12 form-error-message">
													<small for="mobile">{{ $errors->first('mobile') }}</small>
												</span>
											@endif
										</div>
									</div>

								</div>

								<div class="form-group row">

									<div class="col-md-6">
										<div class="form-group row">
											<label for="pan" class="col-md-12 col-form-label">@lang('laryl-contacts.form.label.pan')</label>
											
											<div class="col-md-12">
												<input id="pan" type="text" class="form-control t-up" name="pan" value="{{ $contact->pan }}">
											</div>

											@if ($errors->has('pan'))
												<span class="col-md-12 form-error-message">
													<small for="pan">{{ $errors->first('pan') }}</small>
												</span>
											@endif
										</div>
									</div>

								</div>

								<div class="form-group row">

									<div class="col-md-6">
										<div class="form-group row">
											<label for="address" class="col-md-12 col-form-label">@lang('laryl-contacts.form.label.address')</label>
											
											<div class="col-md-12">
												<textarea id="address" type="text" class="form-control autosize" name="address" value="{{ $contact->address }}"> </textarea>
											</div>

											@if ($errors->has('address'))
												<span class="col-md-12 form-error-message">
													<small for="address">{{ $errors->first('address') }}</small>
												</span>
											@endif
										</div>
									</div>

								</div>

								<div class="form-group row">

									<div class="col-md-6">
										<div class="form-group row">
											<label for="pincode" class="col-md-12 col-form-label">@lang('laryl-contacts.form.label.pincode')</label>
											
											<div class="col-md-12">
												<input id="pincode" type="text" class="form-control digit-6" name="pincode" value="{{ $contact->pincode }}">
											</div>

											@if ($errors->has('pincode'))
												<span class="col-md-12 form-error-message">
													<small for="pincode">{{ $errors->first('pincode') }}</small>
												</span>
											@endif
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group row">
											<label for="city" class="col-md-12 col-form-label">@lang('laryl-contacts.form.label.city')</label>
											
											<div class="col-md-12">
												<input id="city" type="text" class="form-control t-cap" name="city" value="{{ $contact->city }}">
											</div>

											@if ($errors->has('city'))
												<span class="col-md-12 form-error-message">
													<small for="city">{{ $errors->first('city') }}</small>
												</span>
											@endif
										</div>
									</div>

								</div>

								<div class="form-group row">

									<div class="col-md-6">
						
										<div class="form-group row">
											<label for="email" class="col-md-12 col-form-label">@lang('laryl-contacts.form.label.email')</label>
								
											<div class="col-md-12">
												<input id="email" type="email" class="form-control t-low" name="email" value="{{ $contact->email }}">
											</div>

											@if ($errors->has('email'))
												<span class="col-md-12 form-error-message">
													<small for="email">{{ $errors->first('email') }}</small>
												</span>
											@endif
										</div>
									</div>

								</div>

								<div class="row form-group align-items-center">
									<div class="col-md-12 text-right">
										<button type="submit" class="btn btn-success">@lang('laryl-contacts.buttons.update-contact')</button>
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