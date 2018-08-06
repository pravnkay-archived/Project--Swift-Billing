@extends('layouts.backend')

@section('content')

<section>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<div class="col-6">
							<h3 class="h4">@lang('laryl-invoices.heading.list')</h3>
						</div>
						<div class="col-6 text-right">
							<a href="{{ route('Invoices.invoices.create')  }}" class="bttn-plain">
								<i class="fas fa-file-invoice"></i>&emsp;@lang('laryl-invoices.buttons.create-new')
							</a>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th> @lang('laryl-invoices.table.#') </th>
										<th> @lang('laryl-invoices.table.issueDate') </th>
										<th> @lang('laryl-invoices.table.dueDate') </th>
										<th> @lang('laryl-invoices.table.invoiceStatus') </th>
										<th> @lang('laryl-invoices.table.grandValue') </th>
										<th> @lang('laryl-invoices.table.options') </th>
									</tr>
								</thead>
								<tbody>
									@php
										$invoice_array = $invoices->toArray();
										$i = $invoice_array['from'];
									@endphp

									@if(count($invoices) > 0)

										@foreach($invoices as $invoice)
											<tr>
												<th class="scope-row">{{$i}}</th>
												<td class="t-cap">{{$invoice['issueDate']}}</td>
												<td class="t-up">{{$invoice['dueDate']}}</td>
												<td class="t-up">{{$invoice['invoiceStatus']}}</td>
												<td class="t-cap">Rs. {{$invoice['grandValue']}}</td>
												<td>

														<a class="btn btn-sm btn-success mb-2 mb-sm-0" href="{{ route('Invoices.invoices.show', $invoice['id'])  }}" data-toggle="tooltip" title="@lang('laryl.tooltips.show')">
															@lang('laryl.buttons.show')
														</a>

														<a class="btn btn-sm btn-warning mb-2 mb-sm-0" href="{{ route('Invoices.invoices.edit', $invoice['id'])  }}" data-toggle="tooltip" title="@lang('laryl.tooltips.edit')">
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
								{{ $invoices->render() }}
							</div>

							<div class="col d-sm-none">
								{{ $invoices->links('pagination::simple-bootstrap-4') }}
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection