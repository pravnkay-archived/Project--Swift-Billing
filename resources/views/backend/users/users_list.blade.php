@extends('layouts.backend')

@section('content')

<section>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<div class="col-6">
							<h3 class="h4">@lang('laryl-users.heading.list')</h3>
						</div>
						<div class="col-6 text-right">
							<a href="{{ route('Users.users.create')  }}" class="bttn-plain">
								<i class="fa fa-user-plus"></i>&emsp;@lang('laryl-users.buttons.create-new')
							</a>
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
									@php
										$user_array = $users->toArray();
										$i = $user_array['from'];
									@endphp

									@if(count($users) > 0)

										@foreach($users as $user)
											<tr>
												<th class="scope-row">{{$i}}</th>
												<td>{{$user['name']}}</td>
												<td>{{$user['email']}}</td>
												<td>

														<a class="btn btn-sm btn-success mb-2 mb-sm-0" href="{{ route('Users.users.show', $user['id'])  }}" data-toggle="tooltip" title="@lang('laryl.tooltips.show')">
															@lang('laryl.buttons.show')
														</a>

														<a class="btn btn-sm btn-warning mb-2 mb-sm-0" href="{{ route('Users.users.edit', $user['id'])  }}" data-toggle="tooltip" title="@lang('laryl.tooltips.edit')">
															@lang('laryl.buttons.edit')
														</a>

														{{ Form::open(array('url' => route('Users.users.destroy', $user['id']), 'class' => 'delete_form')) }}
														{{ Form::hidden('_method', 'DELETE') }}
														{{ Form::button(__('laryl.buttons.delete'), ['class' => 'btn btn-sm btn-danger', 'type' => 'submit', 'title' => __('laryl.tooltips.delete')]) }}
														{{ Form::close() }}

												</td>
											</tr>

											@php $i++; @endphp
											
										@endforeach
										
									@else 
										
										<tr class="text-center">
											<td colspan="4">@lang('laryl.messages.no-records')</td>
										</tr>

									@endif
								</tbody>
							</table>
							
						{{-- table responsive --}}
						</div> 

						<div class="row">
							<div class="col d-none d-sm-block">
								{{ $users->render() }}
							</div>

							<div class="col d-sm-none">
								{{ $users->links('pagination::simple-bootstrap-4') }}
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection