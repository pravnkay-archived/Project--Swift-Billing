@extends('layouts.backend')

@section('content')

<section>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<div class="col-6">
							<h3 class="h4">@lang('laryl-settings.heading.invoice')</h3>
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
									<form method="POST" action="{{ route('Settings.invoice.update', $setting->id) }}">

										@method('PUT')
										@csrf

										<div class="form-group row">

											<div class="col-md-6">
												<div class="form-group row">
													<label for="serialPrefix" class="col-md-12 col-form-label">@lang('laryl-settings.form.invoice.label.serialPrefix')</label>
								
													<div class="col-md-12">
														<input id="serialPrefix" type="text" class="form-control t-cap" name="serialPrefix" value="{{ $setting->serialPrefix }}" autofocus>
													</div>

													@if ($errors->has('serialPrefix'))
														<span class="col-md-12 form-error-message">
															<small for="serialPrefix">{{ $errors->first('serialPrefix') }}</small>
														</span>
													@endif
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group row">
													<label for="serialNumberStart" class="col-md-12 col-form-label">@lang('laryl-settings.form.invoice.label.serialNumberStart')</label>
													
													<div class="col-md-12">
														<input id="serialNumberStart" type="text" class="form-control t-up" name="serialNumberStart" value="{{ $setting->serialNumberStart }}">
													</div>
				
													@if ($errors->has('serialNumberStart'))
														<span class="col-md-12 form-error-message">
															<small for="serialNumberStart">{{ $errors->first('serialNumberStart') }}</small>
														</span>
													@endif
												</div>
											</div>
										</div>

										<div class="form-group row">

											<div class="col-12 col-md-6">
												<label for="invoiceNotes" class="col-form-label">@lang('laryl-settings.form.invoice.label.invoiceNotes')</label>

												<textarea id="invoiceNotes" class="form-control autosize" name="invoiceNotes">{{ old('invoiceNotes', $setting->invoiceNotes) }}</textarea>

												@if ($errors->has('invoiceNotes'))
													<span class="col-md-12 form-error-message">
														<small for="invoiceNotes">{{ $errors->first('invoiceNotes') }}</small>
													</span>
												@endif
											</div>

											<div class="col-12 col-md-6">
												<label for="invoiceTerms" class="col-form-label">@lang('laryl-settings.form.invoice.label.invoiceTerms')</label>

												<textarea id="invoiceTerms" class="form-control autosize" name="invoiceTerms">{{ old('invoiceTerms', $setting->invoiceTerms) }}</textarea>

												@if ($errors->has('invoiceTerms'))
													<span class="col-md-12 form-error-message">
														<small for="invoiceTerms">{{ $errors->first('invoiceTerms') }}</small>
													</span>
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