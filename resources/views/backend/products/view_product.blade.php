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
								<h3 class="h4"><span class="t-up">{{$product->sku}}</span>@lang('laryl-products.heading.show')</h3>
							</div>
							<div class="col-6 text-right">
								<a href="{{ route('Products.products.index') }}" class="bttn-plain">
									@lang('laryl-products.buttons.back-to-products')
								</a>
							</div>
						</div>
					</div>
					<div class="card-body">

						<div class="container">

								<div class="row">
									<div class="col-md-8 mx-auto">
						
						<div class="row">
							<label class="col-md-12 view-form-label">@lang('laryl-products.form.label.description')<span>&ensp;:&emsp;</span><span class="t-cap">{{$product->description}}</span>
							</label>
						</div>

						<div class="row">
							<label class="col-md-12 view-form-label">@lang('laryl-products.form.label.type')<span>&ensp;:&emsp;</span><span class="t-cap">{{$product->type}}</span>
							</label>
						</div>

						<div class="row">

							<div class="col-md-6">
								<div class="row">
									<label class="col-md-12 view-form-label">@lang('laryl-products.form.label.hsn')<span>&ensp;:&emsp;</span><span class="t-cap">{{$product->hsn}}</span>
									</label>
								</div>
							</div>

							<div class="col-md-6">
								<div class="row">
									<label class="col-md-12 view-form-label">@lang('laryl-products.form.label.sku')<span>&ensp;:&emsp;</span><span class="t-up">{{$product->sku}}</span>
									</label>
								</div>
							</div>

						</div>

						<div class="row">

							<div class="col-md-6">
								<div class="row">
									<label class="col-md-12 view-form-label">@lang('laryl-products.form.label.taxRate')<span>&ensp;:&emsp;</span><span class="t-cap">{{$product->taxRate}}</span>
									</label>
								</div>
							</div>

							<div class="col-md-6">
								<div class="row">
									<label class="col-md-12 view-form-label">@lang('laryl-products.form.label.cessValue')<span>&ensp;:&emsp;</span><span class="t-cap">{{$product->cessValue}}</span>
									</label>
								</div>
							</div>

						</div>

						<div class="row">

							<div class="col-md-6">
								<div class="row">
									<label class="col-md-12 view-form-label">@lang('laryl-products.form.label.unit')<span>&ensp;:&emsp;</span><span class="t-up">{{$product->unit}}</span>
									</label>
								</div>
							</div>

						</div>

						<div class="row">

							<div class="col-md-6">
								<div class="row">
									<label class="col-md-12 view-form-label">@lang('laryl-products.form.label.saleValue')<span>&ensp;:&emsp;</span><span class="t-up">{{$product->saleValue}}</span>
									</label>
								</div>
							</div>

							<div class="col-md-6">
								<div class="row">
									<label class="col-md-12 view-form-label">@lang('laryl-products.form.label.discountRate')<span>&ensp;:&emsp;</span><span class="t-cap">{{$product->discountRate}}</span>
									</label>
								</div>
							</div>

						</div>

						<div class="row">
							<div class="col-auto ml-auto">
								<a href="{{ route('Products.products.edit', $product['id'])  }}" class="btn btn-md btn-warning" title="@lang('laryl.tooltips.edit')">
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