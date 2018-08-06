@extends('layouts.backend')

@section('content')

<section>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div class="row  justify-content-between align-items-center">
							<div class="col-6">
								<h3 class="h4">{{$contact->name}}@lang('laryl-contacts.heading.show')</h3>
							</div>
							<div class="col-6 text-right">
								<a href="{{ route('Contacts.contacts.index') }}" class="bttn-plain">
									@lang('laryl-contacts.buttons.back-to-contacts')
								</a>
							</div>
						</div>
					</div>
					<div class="card-body">

						<div class="container">

								<div class="row">
									<div class="col-md-8 mx-auto">
						
						<div class="row">
							<label class="col-md-12 view-form-label">@lang('laryl-contacts.form.label.name')<span>&ensp;:&emsp;</span><span class="t-cap">{{$contact->name}}</span>
							</label>
						</div>

						<div class="row">
							<label class="col-md-12 view-form-label">@lang('laryl-contacts.form.label.gstin')<span>&ensp;:&emsp;</span><span class="t-up">{{$contact->gstin}}</span>
							</label>
						</div>

						<div class="row">

							<div class="col-md-6">
								<div class="row">
									<label class="col-md-12 view-form-label">@lang('laryl-contacts.form.label.country')<span>&ensp;:&emsp;</span><span class="t-cap">{{$contact->country}}</span>
									</label>
								</div>
							</div>

							<div class="col-md-6">
								<div class="row">
									<label class="col-md-12 view-form-label">@lang('laryl-contacts.form.label.state')<span>&ensp;:&emsp;</span><span class="t-cap">{{$contact->state}}</span>
									</label>
								</div>
							</div>

						</div>

						<div class="row">

							<div class="col-md-6">
								<div class="row">
									<label class="col-md-12 view-form-label">@lang('laryl-contacts.form.label.person')<span>&ensp;:&emsp;</span><span class="t-cap">{{$contact->person}}</span>
									</label>
								</div>
							</div>

							<div class="col-md-6">
								<div class="row">
									<label class="col-md-12 view-form-label">@lang('laryl-contacts.form.label.mobile')<span>&ensp;:&emsp;</span><span class="t-cap">{{$contact->mobile}}</span>
									</label>
								</div>
							</div>

						</div>

						<div class="row">

							<div class="col-md-6">
								<div class="row">
									<label class="col-md-12 view-form-label">@lang('laryl-contacts.form.label.pan')<span>&ensp;:&emsp;</span><span class="t-up">{{$contact->pan}}</span>
									</label>
								</div>
							</div>

						</div>

						<div class="row">

							<div class="col-md-6">
								<div class="row">
									<label class="col-md-12 view-form-label">@lang('laryl-contacts.form.label.address')<span>&ensp;:&emsp;</span><span class="t-cap">{{$contact->address}}</span>
									</label> 
								</div>
							</div>

						</div>

						<div class="row">

							<div class="col-md-6">
								<div class="row">
									<label class="col-md-12 view-form-label">@lang('laryl-contacts.form.label.pincode')<span>&ensp;:&emsp;</span><span class="t-up">{{$contact->pincode}}</span>
									</label>
								</div>
							</div>

							<div class="col-md-6">
								<div class="row">
									<label class="col-md-12 view-form-label">@lang('laryl-contacts.form.label.city')<span>&ensp;:&emsp;</span><span class="t-cap">{{$contact->city}}</span>
									</label>
								</div>
							</div>

						</div>

						<div class="row">

							<div class="col-md-12">
								<div class="row">
									<label class="col-md-12 view-form-label">@lang('laryl-contacts.form.label.email')<span>&ensp;:&emsp;</span><span class="t-low">{{$contact->email}}</span>
									</label>
								</div>
							</div>

						</div>

						<div class="row">
							<div class="col-auto ml-auto">
								<a href="{{ route('Contacts.contacts.edit', $contact['id'])  }}" class="btn btn-md btn-warning" title="@lang('laryl.tooltips.edit')">
									@lang('laryl.buttons.edit')
								</a>
							</div>
						</div>

									</div>
								</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection