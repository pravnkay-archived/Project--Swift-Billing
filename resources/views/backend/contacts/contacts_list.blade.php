@extends('layouts.backend')

@section('content')

<section>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<div class="col-6">
							<h3 class="h4">@lang('laryl-contacts.heading.list')</h3>
						</div>
						<div class="col-6 text-right">
							<a href="{{ route('Contacts.contacts.create')  }}" class="bttn-plain">
								<i class="fa fa-user-plus"></i>&emsp;@lang('laryl-contacts.buttons.create-new')
							</a>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th> @lang('laryl-contacts.table.serial') </th>
										<th> @lang('laryl-contacts.table.name') </th>
										<th> @lang('laryl-contacts.table.pan') </th>
										<th> @lang('laryl-contacts.table.mobile') </th>
										<th> @lang('laryl-contacts.table.state') </th>
										<th> @lang('laryl-contacts.table.gstin') </th>
										<th> @lang('laryl-contacts.table.options') </th>
									</tr>
								</thead>
								<tbody>
									@php
										$contact_array = $contacts->toArray();
										$i = $contact_array['from'];
									@endphp

									@if(count($contacts) > 0)

										@foreach($contacts as $contact)
											<tr>
												<th class="scope-row">{{$i}}</th>
												<td class="t-cap">{{$contact['name']}}</td>
												<td class="t-up">{{$contact['pan']}}</td>
												<td class="t-up">{{$contact['mobile']}}</td>
												<td class="t-cap">{{$contact['state']}}</td>
												<td class="t-up">{{$contact['gstin']}}</td>
												<td>

														<a class="btn btn-sm btn-success mb-2 mb-sm-0" href="{{ route('Contacts.contacts.show', $contact['id'])  }}" data-toggle="tooltip" title="@lang('laryl.tooltips.show')">
															@lang('laryl.buttons.show')
														</a>

														<a class="btn btn-sm btn-warning mb-2 mb-sm-0" href="{{ route('Contacts.contacts.edit', $contact['id'])  }}" data-toggle="tooltip" title="@lang('laryl.tooltips.edit')">
															@lang('laryl.buttons.edit')
														</a>

												</td>
											</tr>

											@php $i++; @endphp
											
										@endforeach
										
									@else 
										
										<tr class="text-center">
											<td colspan="7">@lang('laryl.messages.no-records')</td>
										</tr>

									@endif
								</tbody>
							</table>
							
						{{-- table responsive --}}
						</div> 

						<div class="row">
							<div class="col d-none d-sm-block">
								{{ $contacts->render() }}
							</div>

							<div class="col d-sm-none">
								{{ $contacts->links('pagination::simple-bootstrap-4') }}
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection