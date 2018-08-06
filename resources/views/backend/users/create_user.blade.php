@extends('layouts.backend')

@section('content')

<section>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<div class="col-6">
							<h3 class="h4">@lang('laryl-users.heading.new')</h3>
						</div>
						<div class="col-6 text-right">
							<a href="{{ route('Users.users.index')  }}" class="bttn-plain">
								@lang('laryl-users.buttons.back-to-users')
							</a>
						</div>
					</div>
					<div class="card-body">
						<div class="container">
							<form method="POST" action="{{ route('Users.users.store') }}">
								@csrf
						
								<div class="form-group row">
									<label for="name" class="col-md-4 col-form-label text-md-right">@lang('laryl-users.form.label.username')</label>
						
									<div class="col-md-6">
										<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>
									</div>

									@if ($errors->has('name'))
                                        <span class="col-md-6 offset-md-4 form-error-message">
                                            <small for="name">{{ $errors->first('name') }}</small>
                                        </span>
									@endif
								</div>
						
								<div class="form-group row">
									<label for="email" class="col-md-4 col-form-label text-md-right">@lang('laryl-users.form.label.email')</label>
						
									<div class="col-md-6">
										<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
									</div>

									@if ($errors->has('email'))
                                        <span class="col-md-6 offset-md-4 form-error-message">
                                            <small for="email">{{ $errors->first('email') }}</small>
                                        </span>
									@endif
								</div>
						
								<div class="form-group row">
									<label for="password" class="col-md-4 col-form-label text-md-right">@lang('laryl-users.form.label.password')</label>
						
									<div class="col-md-6">
										<input id="password" type="password" class="form-control" name="password" >
									</div>

									@if ($errors->has('password'))
                                        <span class="col-md-6 offset-md-4 form-error-message">
                                            <small for="password">{{ $errors->first('password') }}</small>
                                        </span>
									@endif
								</div>
						
								<div class="form-group row">
									<label for="password-confirm" class="col-md-4 col-form-label text-md-right">@lang('laryl-users.form.label.confirmPassword')</label>
						
									<div class="col-md-6">
										<input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
									</div>
								</div>

								<div class="row form-group">
									<label for="role" class="col-md-4 col-form-label text-md-right">@lang('laryl-users.form.label.userRole')</label>

									<div class="col-md-6">
											<select name="role" id="role" class="form-control">

												@foreach($userroles as $role)
	
													@php $roleid = $role->id @endphp
	
													<option value = {{$roleid}} @if($role->id === 2 ) selected @endif > {{$role->description}} </option>
	
												@endforeach
	
											</select>
									</div>
								</div>
						
								<div class="form-group row mb-0">
									<div class="col-md-6 offset-md-4">
										<button type="submit" class="btn btn-success">
											@lang('laryl-users.buttons.save-user')
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
</section>


@if ($errors->any())
 <script>
	@foreach ($errors->getMessages() as $key => $message)
		$("input#{{$key}}").addClass("form-error-field");
	@endforeach
 </script>
@endif

@endsection