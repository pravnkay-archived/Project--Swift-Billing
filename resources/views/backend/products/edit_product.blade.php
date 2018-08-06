@extends('layouts.backend')

@section('content')

<section>
	<div class="container-fluid" id="app">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<div class="col-6">
							<h3 class="h4">@lang('laryl-products.heading.edit', ['product'=> $product->sku])</h3>
						</div>
						<div class="col-6 text-right">
							<a href="{{ route('Products.products.show', $product->id)  }}" class="bttn-plain">
								@lang('laryl-products.buttons.back-to-product')
							</a>
						</div>
					</div>
					<div class="card-body">
						<div class="container">

							<div class="row">
								<div class="col-md-8 mx-auto">

							<form method="POST" action="{{ route('Products.products.update', $product->id) }}">
						
								@method('PUT')
								@csrf
						
								<div class="form-group row">
									<label for="description" class="col-md-12 col-form-label">@lang('laryl-products.form.label.description')</label>
						
									<div class="col-md-12">
										<input id="description" type="text" class="form-control t-cap" name="description" value="{{ $product->description }}" autofocus>
									</div>

									@if ($errors->has('description'))
                                        <span class="col-md-12 form-error-message">
                                            <small for="description">{{ $errors->first('description') }}</small>
                                        </span>
									@endif
								</div>

								<div class="form-group row">

									<div class="col-md-6">
										<div class="form-group row">
											<label for="type" class="col-md-12 col-form-label">@lang('laryl-products.form.label.type')</label>
								
											<div class="col-md-12">
												<select id="type" class="form-control" name="type" value="{{ $product->type }}">
													<option value="goods">Goods</option>
													<option value="service">Service</option>
												</select>
											</div>

											@if ($errors->has('type'))
												<span class="col-md-12 form-error-message">
													<small for="type">{{ $errors->first('type') }}</small>
												</span>
											@endif
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group row">
											<label for="hsn" class="col-md-12 col-form-label">@lang('laryl-products.form.label.hsn')</label>
											
											<div class="col-md-12">
												<input id="hsn" type="text" class="form-control digit-8" name="hsn" value="{{ $product->hsn }}">
											</div>
		
											@if ($errors->has('hsn'))
												<span class="col-md-12 form-error-message">
													<small for="hsn">{{ $errors->first('hsn') }}</small>
												</span>
											@endif
										</div>
									</div>
								</div>

								<div class="form-group row">

									<div class="col-md-6">
										<div class="form-group row">
											<label for="sku" class="col-md-12 col-form-label">@lang('laryl-products.form.label.sku')</label>
											
											<div class="col-md-12">
												<input id="sku" type="text" class="form-control t-cap" name="sku" value="{{ $product->sku }}">
											</div>
		
											@if ($errors->has('sku'))
												<span class="col-md-12 form-error-message">
													<small for="sku">{{ $errors->first('sku') }}</small>
												</span>
											@endif
										</div>
									</div>

								</div>

								<!-- Force next columns to break to new line -->
								<div class="w-100 my-5"><hr></div>


								<div class="form-group row">

									<div class="col-md-6">
										<div class="form-group row">
											<label for="taxRate" class="col-md-12 col-form-label">@lang('laryl-products.form.label.taxRate')</label>
											
											<div class="col-md-12">
												<select name="taxRate" id="taxRate" class="form-control" value="{{ $product->taxRate }}">
													<option value="0">0 %</option>
													<option value="0.1">0.1 %</option>
													<option value="0.25">0.25 %</option>
													<option value="3">3.00 %</option>
													<option value="5">5.00 %</option>
													<option value="12">12.00 %</option>
													<option value="18">18.00 %</option>
													<option value="28">28.00 %</option>
												</select>
											</div>
		
											@if ($errors->has('taxRate'))
												<span class="col-md-12 form-error-message">
													<small for="taxRate">{{ $errors->first('taxRate') }}</small>
												</span>
											@endif
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group row">
											<label for="cessValue" class="col-md-12 col-form-label">@lang('laryl-products.form.label.cessValue')</label>
											
											<div class="col-md-12">
												<input id="cessValue" type="text" class="form-control numeric-p2d2" name="cessValue" value="{{ $product->cessValue }}">
											</div>
		
											@if ($errors->has('cessValue'))
												<span class="col-md-12 form-error-message">
													<small for="cessValue">{{ $errors->first('cessValue') }}</small>
												</span>
											@endif
										</div>
									</div>

								</div>

								<!-- Force next columns to break to new line -->
								<div class="w-100 my-5"><hr></div>

								<div class="form-group row">

									<div class="col-md-6">
										<div class="form-group row">
											<label for="saleValue" class="col-md-12 col-form-label">@lang('laryl-products.form.label.saleValue')</label>
											
											<div class="col-md-12">
												<input id="saleValue" type="text" class="form-control numeric-p8d2" name="saleValue" value="{{ $product->saleValue }}">
											</div>

											@if ($errors->has('saleValue'))
												<span class="col-md-12 form-error-message">
													<small for="saleValue">{{ $errors->first('saleValue') }}</small>
												</span>
											@endif
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group row">
											<label for="discountRate" class="col-md-12 col-form-label">@lang('laryl-products.form.label.discountRate')</label>
											
											<div class="col-md-12">
												<input id="discountRate" type="text" class="form-control numeric-p2d2" name="discountRate" value="{{ $product->discountRate }}">
											</div>

											@if ($errors->has('discountRate'))
												<span class="col-md-12 form-error-message">
													<small for="discountRate">{{ $errors->first('discountRate') }}</small>
												</span>
											@endif
										</div>
									</div>

								</div>

								<div class="form-group row">

									<div class="col-md-6">
										<div class="form-group row">
											<label for="unit" class="col-md-12 col-form-label">@lang('laryl-products.form.label.unit')</label>
											
											<div class="col-md-12">
													<select id="unit" name="unit" class="form-control">
														<option value="BOU" {{( $product->unit == "BOU" ) ? 'selected' : '' }}>BOU</option>
														<option value="BGS" {{( $product->unit == "BGS" ) ? 'selected' : '' }}>Bags</option>
														<option value="BAL" {{( $product->unit == "BAL" ) ? 'selected' : '' }}>Bale</option>
														<option value="BTL" {{( $product->unit == "BTL" ) ? 'selected' : '' }}>Bottles</option>
														<option value="BOX" {{( $product->unit == "BOX" ) ? 'selected' : '' }}>Boxes</option>
														<option value="BKL" {{( $product->unit == "BKL" ) ? 'selected' : '' }}>Buckles</option>
														<option value="BUN" {{( $product->unit == "BUN" ) ? 'selected' : '' }}>Bunches</option>
														<option value="BDL" {{( $product->unit == "BDL" ) ? 'selected' : '' }}>Bundles</option>
														<option value="CAN" {{( $product->unit == "CAN" ) ? 'selected' : '' }}>Cans</option>
														<option value="CARAT" {{( $product->unit == "CARAT" ) ? 'selected' : '' }}>Carat</option>
														<option value="CTN" {{( $product->unit == "CTN" ) ? 'selected' : '' }}>Cartons</option>
														<option value="CMS" {{( $product->unit == "CMS" ) ? 'selected' : '' }}>Centimeter</option>
														<option value="CCM" {{( $product->unit == "CCM" ) ? 'selected' : '' }}>Cubic Centimeter</option>
														<option value="CBM" {{( $product->unit == "CBM" ) ? 'selected' : '' }}>Cubic Meter</option>
														<option value="DOZ" {{( $product->unit == "DOZ" ) ? 'selected' : '' }}>Dozen</option>
														<option value="DRM" {{( $product->unit == "DRM" ) ? 'selected' : '' }}>Drums</option>
														<option value="GMS" {{( $product->unit == "GMS" ) ? 'selected' : '' }}>Grams</option>
														<option value="GGK" {{( $product->unit == "GGK" ) ? 'selected' : '' }}>Great Gross</option>
														<option value="GRS" {{( $product->unit == "GRS" ) ? 'selected' : '' }}>Gross</option>
														<option value="GYD" {{( $product->unit == "GYD" ) ? 'selected' : '' }}>Gross Yards</option>
														<option value="KGS" {{( $product->unit == "KGS" ) ? 'selected' : '' }}>Kilograms</option>
														<option value="KLR" {{( $product->unit == "KLR" ) ? 'selected' : '' }}>Kiloliter</option>
														<option value="KME" {{( $product->unit == "KME" ) ? 'selected' : '' }}>Kilometers</option>
														<option value="MTR" {{( $product->unit == "MTR" ) ? 'selected' : '' }}>Meter</option>
														<option value="MTS" {{( $product->unit == "MTS" ) ? 'selected' : '' }}>Metric Ton</option>
														<option value="MLT" {{( $product->unit == "MLT" ) ? 'selected' : '' }}>Milliliters</option>
														<option value="NOS" {{( $product->unit == "NOS" ) ? 'selected' : '' }}>Numbers</option>
														<option value="OTH" {{( $product->unit == "OTH" ) ? 'selected' : '' }}>Others</option>
														<option value="PAC" {{( $product->unit == "PAC" ) ? 'selected' : '' }}>Packs</option>
														<option value="PRS" {{( $product->unit == "PRS" ) ? 'selected' : '' }}>Pairs</option>
														<option value="PCS" {{( $product->unit == "PCS" ) ? 'selected' : '' }}>Pieces</option>
														<option value="QTL" {{( $product->unit == "QTL" ) ? 'selected' : '' }}>Quintal</option>
														<option value="ROL" {{( $product->unit == "ROL" ) ? 'selected' : '' }}>Rolls</option>
														<option value="SET" {{( $product->unit == "SET" ) ? 'selected' : '' }}>Sets</option>
														<option value="SQF" {{( $product->unit == "SQF" ) ? 'selected' : '' }}>Square Feet</option>
														<option value="SQM" {{( $product->unit == "SQM" ) ? 'selected' : '' }}>Square Meter</option>
														<option value="SQY" {{( $product->unit == "SQY" ) ? 'selected' : '' }}>Square Yards</option>
														<option value="TBS" {{( $product->unit == "TBS" ) ? 'selected' : '' }}>Tablets</option>
														<option value="TGM" {{( $product->unit == "TGM" ) ? 'selected' : '' }}>Ten Grams</option>
														<option value="THD" {{( $product->unit == "THD" ) ? 'selected' : '' }}>Thousands</option>
														<option value="TON" {{( $product->unit == "TON" ) ? 'selected' : '' }}>Tonnes</option>
														<option value="TUB" {{( $product->unit == "TUB" ) ? 'selected' : '' }}>Tubes</option>
														<option value="UGS" {{( $product->unit == "UGS" ) ? 'selected' : '' }}>US Gallons</option>
														<option value="UNT" {{( $product->unit == "UNT" ) ? 'selected' : '' }}>Units</option>
														<option value="YDS" {{( $product->unit == "YDS" ) ? 'selected' : '' }}>Yards</option>
													</select>
											</div>

											@if ($errors->has('unit'))
												<span class="col-md-12 form-error-message">
													<small for="unit">{{ $errors->first('unit') }}</small>
												</span>
											@endif
										</div>
									</div>

								</div>

								<div class="form-group row mb-0">
									<div class="col-auto ml-auto">
										<button type="submit" class="btn btn-success  ml-auto">
											@lang('laryl-products.buttons.save-product')
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

@endsection