@extends('layouts.backend')

@section('content')

<section>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<div class="col-6">
							<h3 class="h4">@lang('laryl-products.heading.list')</h3>
						</div>
						<div class="col-6 text-right">
							<a href="{{ route('Products.products.create')  }}" class="bttn-plain">
								<i class="fas fa-cart-plus"></i>&emsp;@lang('laryl-products.create-new')
							</a>
						</div>
					</div>
					<div class="card-header d-flex align-items-center">
						<form method="POST" action="/products/uploadexcel" enctype="multipart/form-data" class="col-9">
							@csrf
					
							<div class="form-group row">
					
								<div class="col-auto">
									<input id="productsExcel" type="file" class="form-control" name="productsExcel" required>
								</div>

								@if ($errors->has('productsExcel'))
									<span class="col-md-12 form-error-message">
										<small for="productsExcel">{{ $errors->first('productsExcel') }}</small>
									</span>
								@endif

								<div class="col-auto mt-3 mt-sm-0">
									<button type="submit" class="btn btn-success  ml-auto">
										@lang('laryl-products.buttons.upload-file')
									</button>
								</div>
							</div>
						</form>
						<div class="col-3 text-right">
							<a class="" href="/products/downloadexcel"><h4>Download<br />Products Excel</h4></a>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th> @lang('laryl-products.table.serial') </th>
										<th> @lang('laryl-products.table.description') </th>
										<th> @lang('laryl-products.table.hsn') </th>
										<th> @lang('laryl-products.table.sku') </th>
										<th> @lang('laryl-products.table.taxRate') </th>
										<th> @lang('laryl-products.table.saleValue') </th>
										<th> @lang('laryl-products.table.options') </th>
									</tr>
								</thead>
								<tbody>
									@php
										$product_array = $products->toArray();
										$i = $product_array['from'];
									@endphp

									@if(count($products) > 0)

										@foreach($products as $product)
											<tr>
												<th class="scope-row">{{$i}}</th>
												<td class="t-cap">{{$product['description']}}</td>
												<td class="t-up">{{$product['hsn']}}</td>
												<td class="t-up">{{$product['sku']}}</td>
												<td class="t-cap">{{$product['taxRate']}}</td>
												<td class="t-up">{{$product['saleValue']}}</td>
												<td>

														<a class="btn btn-sm btn-success mb-2 mb-sm-0" href="{{ route('Products.products.show', $product['id'])  }}" data-toggle="tooltip" title="@lang('laryl.tooltips.show')">
															@lang('laryl.buttons.show')
														</a>

														<a class="btn btn-sm btn-warning mb-2 mb-sm-0" href="{{ route('Products.products.edit', $product['id'])  }}" data-toggle="tooltip" title="@lang('laryl.tooltips.edit')">
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
								{{ $products->render() }}
							</div>

							<div class="col d-sm-none">
								{{ $products->links('pagination::simple-bootstrap-4') }}
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection