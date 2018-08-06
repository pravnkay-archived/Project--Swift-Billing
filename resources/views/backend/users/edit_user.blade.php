@extends('layouts.backend')

@section('content')

<section>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<div class="col-6">
							<h3 class="h4">@lang('laryl-users.heading.edit', ['name'=> $user->name])</h3>
						</div>
						<div class="col-6 text-right">
							<a href="{{ route('Users.users.show', $user->id)  }}" class="bttn-plain">
								@lang('laryl-users.buttons.back-to-user')
							</a>
						</div>
					</div>
					<div class="card-body">
						<div class="container">
							<form action="{{ route('Users.users.update', $user->id)  }}" method="POST">

								@method('PUT')
								@csrf

								<div class="row form-group">
									<div class="col-md-3 text-md-right align-self-center">
										<label for="name" class="mb-md-0">@lang('laryl-users.form.label.username')</label>
									</div>
									<div class="col-md-9">
										<input name="name" id="name" type="text" class ="form-control" value= "{{$user->name}}"
											placeholder="@lang('laryl-users.form.placeholder.username')"/>
									</div>

									@if ($errors->has('name'))
                                        <span class="col-md-6 offset-md-3 form-error-message">
                                            <small for="name">{{ $errors->first('name') }}</small>
                                        </span>
									@endif
								</div>

								<div class="row form-group">
									<div class="col-md-3 text-md-right align-self-center">
										<label for="email" class="mb-md-0">@lang('laryl-users.form.label.email')</label>
									</div>
									<div class="col-md-9">
										<input name="email" id="email" type="email" class ="form-control" value= "{{$user->email}}"
											placeholder="@lang('laryl-users.form.placeholder.email')" />
									</div>

									@if ($errors->has('email'))
                                        <span class="col-md-6 offset-md-3 form-error-message">
                                            <small for="email">{{ $errors->first('email') }}</small>
                                        </span>
									@endif
								</div>

								<div class="row form-group">
									<div class="col-md-3 text-md-right align-self-center">
										<label for="role" class="mb-md-0">@lang('laryl-users.form.label.userRole')</label>
									</div>
									<div class="col-md-9">
										<select name="role" id="role" class="form-control">

											@foreach($userroles as $role)

												@php $roleid = $role->id @endphp

												<option value = {{$roleid}} @if($role->id === $user->roles[0]->pivot->role_id ) selected @endif > {{$role->description}} </option>

											@endforeach

										</select>
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-3 text-md-right align-self-center">
										<label for="password" class="mb-md-0">@lang('laryl-users.form.label.newPassword')</label>
									</div>

									<div class="col-md-9">
										<input id="password" type="password" class="form-control" name="password" placeholder="@lang('laryl-users.form.placeholder.newPassword')">
									</div>

									@if ($errors->has('password'))
                                        <span class="col-md-6 offset-md-3 form-error-message">
                                            <small for="password">{{ $errors->first('password') }}</small>
                                        </span>
									@endif
								</div>

								<div class="row form-group">
									<div class="col-md-3 text-md-right align-self-center">
										<label for="password-confirm" class="mb-md-0">@lang('laryl-users.form.label.confirmNewPassword')</label>
									</div>

									<div class="col-md-9">
										<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="@lang('laryl-users.form.placeholder.confirmNewPassword')">
									</div>
								</div>
								<div class="row form-group align-items-center">
									<div class="col-md-12 text-right">
										<button type="submit" class="btn btn-success">@lang('laryl-users.buttons.update-user')</button>
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