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
								<h3 class="h4">{{$user->name}}@lang('laryl-users.heading.show')</h3>
							</div>
							<div class="col-6 text-right">
								<a href="{{ route('Users.users.index') }}" class="bttn-plain">
									@lang('laryl-users.buttons.back-to-users')
								</a>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>@lang('laryl-users.table.serial')</th>
										<th>@lang('laryl-users.table.name')</th>
										<th>@lang('laryl-users.table.email')</th>
										<th>@lang('laryl-users.table.options')</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>{{$user->name}}</td>
										<td>{{$user->email}}</td>
										<td class="text-capitalize">{{$user->roles[0]->name}}</td>
										<td>
											<a href="{{ route('Users.users.edit', $user['id'])  }}" class="btn btn-md btn-warning" title="@lang('laryl.tooltips.edit')">
												@lang('laryl.buttons.edit')
											</a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection