@extends('layouts.backend')

@section('content')

<section>
	<div class="container-fluid" id="app">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header d-flex align-items-center row no-gutters">
						<div class="col-6">
							<h3 class="h4">@lang('laryl-invoices.heading.edit', ['invoice'=> $invoice->serialPrefix.$invoice->serialNumber])</h3>
						</div>
						<div class="col-6 text-right">
							<a href="{{ route('Invoices.invoices.index')  }}" class="bttn-plain">
								@lang('laryl-invoices.buttons.back-to-invoices')
							</a>
						</div>
						<div class="col-12">
							<h6 class="t-cap">{{ $invoice->profile['businessName'] }}, <span id="placeoforigin">{{ $invoice->profile['placeOfOrigin'] }}</span></h6>
						</div>
					</div>
					<div class="card-body">
						<div class="container">

							<div class="row">
								<div class="col-md-12 mx-auto">

							<form id="editInvoiceForm" method="POST" action="{{ route('Invoices.invoices.update', $invoice->id) }}">

								@method('PUT')
								@csrf
						
								<div class="form-group row">
									<div class="col-md-3">
										<div class="row">
											<label for="serialNumber" class="col-md-12 col-form-label">@lang('laryl-invoices.form.label.invoiceSerial')</label>

											<div class="col-4 mr-auto pr-0">
												<input type="text" id="serialPrefix" class="form-control t-cap" name="serialPrefix" value={{ $invoice->serialPrefix }} readonly>
											</div>
					
											<div class="col-8 ml-auto">
												<input id="serialNumber" type="text" class="form-control t-cap" name="serialNumber" value="{{ $invoice->serialNumber }}" readonly>
											</div>
		
											@if ($errors->has('serialNumber'))
												<span class="col-md-12 form-error-message">
													<small for="serialNumber">{{ $errors->first('serialNumber') }}</small>
												</span>
											@endif
										</div>
									</div>
									<div class="col-sm-6 col-md-3">
										<div class="row">
											<label for="issueDate" class="col-md-12 col-form-label">@lang('laryl-invoices.form.label.issueDate')</label>
					
											<div class="col-md-12">
												<div id="date" data-name="issueDate" class="bfh-datepicker" data-input="form-control" data-min="01-01-2000" data-max="today"  data-format="y-m-d" data-date="today">
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-md-3">
										<div class="row">
											<label for="dueDate" class="col-md-12 col-form-label">@lang('laryl-invoices.form.label.dueDate')</label>
					
											<div class="col-md-12">
												<div id="duedate" data-name="dueDate" class="bfh-datepicker" data-min="01-01-2000" data-format="y-m-d" data-date="today">
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-md-3">
										<div class="row">
											<label for="placeOfSupply" class="col-md-12 col-form-label">@lang('laryl-invoices.form.label.placeOfSupply')</label>
					
											<div class="col-md-12">
												<select id="placeOfSupply" name="placeOfSupply" class="form-control bfh-states" data-country="India" data-state="{{ old('placeOfSupply', $invoice->placeOfSupply) }}"></select>
											</div>
		
											@if ($errors->has('placeOfSupply'))
												<span class="col-md-12 form-error-message">
													<small for="placeOfSupply">{{ $errors->first('placeOfSupply') }}</small>
												</span>
											@endif
										</div>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-12">
												<div class="row">
													<label for="customerName" class="col-auto col-form-label">@lang('laryl-invoices.form.label.customerName')</label>
			
													<div class="col-md-12">
														<input id="customerName" type="text" class="form-control t-cap" name="customer[name]" value="{{ old('customer.name', $invoice->customer['name']) }}" autofocus>
													</div>
				
													@if ($errors->has('customer.name'))
														<span class="col-md-12 form-error-message">
															<small for="customer.name">{{ $errors->first('customer.name') }}</small>
														</span>
													@endif
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="row">
													<label for="customerGstin" class="col-md-12 col-form-label">@lang('laryl-invoices.form.label.customerGstin')</label>
		
													<div class="col-md-12">
														<input id="customerGstin" type="text" class="form-control t-up" name="customer[gstin]" value="{{ old('customer.gstin', $invoice->customer['gstin']) }}" maxlength="15" >
													</div>
												</div>												
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="row">
													<label for="customerMobile" class="col-md-12 col-form-label">@lang('laryl-invoices.form.label.customerMobile')</label>
		
													<div class="col-md-12">
														<input id="customerMobile" type="text" class="form-control t-up bfh-phone" data-country="India" name="customer[mobile]" value="{{ old('customer.mobile', $invoice->customer['mobile']) }}" >
													</div>
				
													@if ($errors->has('customer.mobile'))
														<span class="col-md-12 form-error-message">
															<small for="customer.mobile">{{ $errors->first('customer.mobile') }}</small>
														</span>
													@endif
												</div>												
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="row">
											<div class="col-sm-6 col-md-6">
												<div class="row">
													<label for="billingAddress" class="col-auto col-form-label">@lang('laryl-invoices.form.label.billingAddress')</label>

													<span id="billingaddress_edit" class="col-auto align-self-center ml-auto"><a data-remodal-target="editBillingAddress" href="javascript:;">Edit</a></span>
			
													<div class="col-md-12">
														<textarea id="billingAddress" rows=4 class="form-control autosize t-cap" name="customer[billingAddress]" readonly> {{ $invoice->customer['billingAddress'] }} </textarea>
													</div>
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="row">
													<label for="shippingAddress" class="col-auto col-form-label">@lang('laryl-invoices.form.label.shippingAddress')</label>

													<span id="editShippingAddress" class="d-none col-auto align-self-center ml-auto"><a data-remodal-target="editShippingAddress" href="javascript:;">Edit</a></span>
			
													<div class="col-md-12">
														<textarea id="shippingAddress" rows=4 class="form-control autosize t-cap" name="customer[shippingAddress]" readonly>{{ $invoice->customer['shippingAddress'] }}</textarea>
													</div>
												</div>
											</div>
											<div class="col-auto ml-auto mt-3 form-group">
												<div class="pure-checkbox">
													<input name="customer[sameAsBilling]" type="text" value="off" hidden>
													<input class="newinv_form_event" id="sameAsBilling" name="customer[sameAsBilling]" type="checkbox" {{( $invoice->customer['sameAsBilling'] === "on" ) ? 'checked' : '' }}>
													<label for="sameAsBilling">Same as Billing Address</label>
												</div>										
											</div>
										</div>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-12">
										<div class="invoice-products-table">
											<div class="table-body-scrollable">
												<div class="table-responsive invoice-products-list-table">
													<table id="table" class="table text-center">
														<thead>
															<tr>
																<th rowspan=2>#</th>
																<th rowspan=2>Product Description</th>
																<th rowspan=2>HSN / SAC</th>
																<th rowspan=2>Qty</th>
																<th rowspan=2>Unit</th>
																<th rowspan=2>Rate<br>/ Unit</th>
																<th rowspan=1>Discount</th>
																<th rowspan=1 colspan=2>Taxable</th>
																<th rowspan=1 colspan=3>Values</th>
																<th rowspan=1 colspan=2>CESS</th>
															</tr>
															<tr>
																<th rowspan=1>
																	<div class="row no-gutters">
																		<div class="col-6">
																			<label for="discountType">%</label>
																		</div>
																		<div class="col-6">
																			<label for="discountType">Rs.</label>
																		</div>
																	</div>
																	<div class="row no-gutters">
																		<div class="col-6">
																			<input type="radio" value="discountrate" id="discount_percent" name="discountType" {{ ( $invoice->discountType === "discountrate" ) ? 'checked' : '' }}>
																		</div>
																		<div class="col-6">
																			<input type="radio" value="discountvalue" id="discount_value" name="discountType" {{ ( $invoice->discountType === "discountvalue" ) ? 'checked' : '' }}>
																		</div>
																	</div>
																</th>
																<th rowspan=1>Value</th>
																<th rowspan=1>Rate</th>
																<th rowspan=1>IGST</th>
																<th rowspan=1>CGST</th>
																<th rowspan=1>SGST</th>
																<th rowspan=1>%</th>
																<th rowspan=1>Rs.</th>
															</tr>
														</thead>
														<tbody>

															@foreach ($invoice->product as $invoiceProduct)

															<tr class="product-details-row-scrollable" row-index="{{$invoiceProduct['invoiceSerial']}}"> 
																<td class="product-detail-cell" id="invoiceSerial">
																	<input type="text" class="table-cell-input text-center" id="invoiceSerial" name="invoiceProducts[{{$invoiceProduct['invoiceSerial']}}][invoiceSerial]"
																		value="{{$invoiceProduct['invoiceSerial']}}" readonly>
																</td>
																<td class="product-detail-cell" id="description">
																	<input type="text" class="table-cell-input" id="description" name="invoiceProducts[{{$invoiceProduct['invoiceSerial']}}][description]" value="{{$invoiceProduct['description']}}">
																	<a href="javascript:;" id="search_product">
																		<i class="fa fa-search"></i>
																	</a>
																</td>
																<td class="product-detail-cell" id="hsn">
																	<input type="text" class="table-cell-input" id="hsn" name="invoiceProducts[{{$invoiceProduct['invoiceSerial']}}][hsn]" value="{{$invoiceProduct['hsn']}}"> </td>
																<td class="product-detail-cell" id="quantity">
																	<input type="text" class="table-cell-input" id="quantity" name="invoiceProducts[{{$invoiceProduct['invoiceSerial']}}][quantity]" value="{{$invoiceProduct['quantity']}}"> </td>
																<td class="product-detail-cell" id="unit">
																	<select id="unit" name="invoiceProducts[{{$invoiceProduct['invoiceSerial']}}][unit]" class="table-cell-input">
																		<option value=""></option>
																		<option value="BOU" {{ ( $invoiceProduct['unit'] === "BOU" ) ? 'selected' : '' }}>BOU</option>
																		<option value="BGS" {{ ( $invoiceProduct['unit'] === "BGS" ) ? 'selected' : '' }}>Bags</option>
																		<option value="BAL" {{ ( $invoiceProduct['unit'] === "BAL" ) ? 'selected' : '' }}>Bale</option>
																		<option value="BTL" {{ ( $invoiceProduct['unit'] === "BTL" ) ? 'selected' : '' }}>Bottles</option>
																		<option value="BOX" {{ ( $invoiceProduct['unit'] === "BOX" ) ? 'selected' : '' }}>Boxes</option>
																		<option value="BKL" {{ ( $invoiceProduct['unit'] === "BKL" ) ? 'selected' : '' }}>Buckles</option>
																		<option value="BUN" {{ ( $invoiceProduct['unit'] === "BUN" ) ? 'selected' : '' }}>Bunches</option>
																		<option value="BDL" {{ ( $invoiceProduct['unit'] === "BDL" ) ? 'selected' : '' }}>Bundles</option>
																		<option value="CAN" {{ ( $invoiceProduct['unit'] === "CAN" ) ? 'selected' : '' }}>Cans</option>
																		<option value="CARAT" {{ ( $invoiceProduct['unit'] === "CARAT" ) ? 'selected' : '' }}>Carat</option>
																		<option value="CTN" {{ ( $invoiceProduct['unit'] === "CTN" ) ? 'selected' : '' }}>Cartons</option>
																		<option value="CMS" {{ ( $invoiceProduct['unit'] === "CMS" ) ? 'selected' : '' }}>Centimeter</option>
																		<option value="CCM" {{ ( $invoiceProduct['unit'] === "CCM" ) ? 'selected' : '' }}>Cubic Centimeter</option>
																		<option value="CBM" {{ ( $invoiceProduct['unit'] === "CBM" ) ? 'selected' : '' }}>Cubic Meter</option>
																		<option value="DOZ" {{ ( $invoiceProduct['unit'] === "DOZ" ) ? 'selected' : '' }}>Dozen</option>
																		<option value="DRM" {{ ( $invoiceProduct['unit'] === "DRM" ) ? 'selected' : '' }}>Drums</option>
																		<option value="GMS" {{ ( $invoiceProduct['unit'] === "GMS" ) ? 'selected' : '' }}>Grams</option>
																		<option value="GGK" {{ ( $invoiceProduct['unit'] === "GGK" ) ? 'selected' : '' }}>Great Gross</option>
																		<option value="GRS" {{ ( $invoiceProduct['unit'] === "GRS" ) ? 'selected' : '' }}>Gross</option>
																		<option value="GYD" {{ ( $invoiceProduct['unit'] === "GYD" ) ? 'selected' : '' }}>Gross Yards</option>
																		<option value="KGS" {{ ( $invoiceProduct['unit'] === "KGS" ) ? 'selected' : '' }}>Kilograms</option>
																		<option value="KLR" {{ ( $invoiceProduct['unit'] === "KLR" ) ? 'selected' : '' }}>Kiloliter</option>
																		<option value="KME" {{ ( $invoiceProduct['unit'] === "KME" ) ? 'selected' : '' }}>Kilometers</option>
																		<option value="MTR" {{ ( $invoiceProduct['unit'] === "MTR" ) ? 'selected' : '' }}>Meter</option>
																		<option value="MTS" {{ ( $invoiceProduct['unit'] === "MTS" ) ? 'selected' : '' }}>Metric Ton</option>
																		<option value="MLT" {{ ( $invoiceProduct['unit'] === "MLT" ) ? 'selected' : '' }}>Milliliters</option>
																		<option value="NOS" {{ ( $invoiceProduct['unit'] === "NOS" ) ? 'selected' : '' }}>Numbers</option>
																		<option value="OTH" {{ ( $invoiceProduct['unit'] === "OTH" ) ? 'selected' : '' }}>Others</option>
																		<option value="PAC" {{ ( $invoiceProduct['unit'] === "PAC" ) ? 'selected' : '' }}>Packs</option>
																		<option value="PRS" {{ ( $invoiceProduct['unit'] === "PRS" ) ? 'selected' : '' }}>Pairs</option>
																		<option value="PCS" {{ ( $invoiceProduct['unit'] === "PCS" ) ? 'selected' : '' }}>Pieces</option>
																		<option value="QTL" {{ ( $invoiceProduct['unit'] === "QTL" ) ? 'selected' : '' }}>Quintal</option>
																		<option value="ROL" {{ ( $invoiceProduct['unit'] === "ROL" ) ? 'selected' : '' }}>Rolls</option>
																		<option value="SET" {{ ( $invoiceProduct['unit'] === "SET" ) ? 'selected' : '' }}>Sets</option>
																		<option value="SQF" {{ ( $invoiceProduct['unit'] === "SQF" ) ? 'selected' : '' }}>Square Feet</option>
																		<option value="SQM" {{ ( $invoiceProduct['unit'] === "SQM" ) ? 'selected' : '' }}>Square Meter</option>
																		<option value="SQY" {{ ( $invoiceProduct['unit'] === "SQY" ) ? 'selected' : '' }}>Square Yards</option>
																		<option value="TBS" {{ ( $invoiceProduct['unit'] === "TBS" ) ? 'selected' : '' }}>Tablets</option>
																		<option value="TGM" {{ ( $invoiceProduct['unit'] === "TGM" ) ? 'selected' : '' }}>Ten Grams</option>
																		<option value="THD" {{ ( $invoiceProduct['unit'] === "THD" ) ? 'selected' : '' }}>Thousands</option>
																		<option value="TON" {{ ( $invoiceProduct['unit'] === "TON" ) ? 'selected' : '' }}>Tonnes</option>
																		<option value="TUB" {{ ( $invoiceProduct['unit'] === "TUB" ) ? 'selected' : '' }}>Tubes</option>
																		<option value="UGS" {{ ( $invoiceProduct['unit'] === "UGS" ) ? 'selected' : '' }}>US Gallons</option>
																		<option value="UNT" {{ ( $invoiceProduct['unit'] === "UNT" ) ? 'selected' : '' }}>Units</option>
																		<option value="YDS" {{ ( $invoiceProduct['unit'] === "YDS" ) ? 'selected' : '' }}>Yards</option>
																	</select>
																</td>
																<td class="product-detail-cell" id="saleValue">
																	<input type="text" class="table-cell-input" id="saleValue" name="invoiceProducts[{{$invoiceProduct['invoiceSerial']}}][saleValue]" value="{{$invoiceProduct['saleValue']}}"> </td>
																<td class="product-detail-cell" id="discountRate">
																	<input type="text" class="table-cell-input" id="discountRate" name="invoiceProducts[{{$invoiceProduct['invoiceSerial']}}][discountRate]" value="{{$invoiceProduct['discountRate']}}"> </td>
																<td class="product-detail-cell d-none" id="discountValue">
																	<input type="text" class="table-cell-input" id="discountValue" name="invoiceProducts[{{$invoiceProduct['invoiceSerial']}}][discountValue]" value="{{$invoiceProduct['discountValue']}}"> </td>
																<td class="product-detail-cell readonly-cell" id="taxableValue">
																	<input type="text" class="table-cell-input" id="taxableValue" name="invoiceProducts[{{$invoiceProduct['invoiceSerial']}}][taxableValue]" value="{{$invoiceProduct['taxableValue']}}"
																		readonly> </td>
																<td class="product-detail-cell" id="taxRate">
																	<select name="invoiceProducts[{{$invoiceProduct['invoiceSerial']}}][taxRate]" id="taxRate" class="table-cell-input">
																		<option value="0.00" {{ ( $invoiceProduct['taxRate'] === "0.00" ) ? 'selected' : '' }}>0 %</option>
																		<option value="0.10" {{ ( $invoiceProduct['taxRate'] === "0.10" ) ? 'selected' : '' }}>0.10 %</option>
																		<option value="0.25" {{ ( $invoiceProduct['taxRate'] === "0.25" ) ? 'selected' : '' }}>0.25 %</option>
																		<option value="3.00" {{ ( $invoiceProduct['taxRate'] === "3.00" ) ? 'selected' : '' }}>3.00 %</option>
																		<option value="5.00" {{ ( $invoiceProduct['taxRate'] === "5.00" ) ? 'selected' : '' }}>5.00 %</option>
																		<option value="12.00" {{ ( $invoiceProduct['taxRate'] === "12.00" ) ? 'selected' : '' }}>12.00 %</option>
																		<option value="18.00" {{ ( $invoiceProduct['taxRate'] === "18.00" ) ? 'selected' : '' }}>18.00 %</option>
																		<option value="28.00" {{ ( $invoiceProduct['taxRate'] === "28.00" ) ? 'selected' : '' }}>28.00 %</option>
																	</select>
																</td>
																<td class="product-detail-cell readonly-cell" id="igstValue">
																	<input type="text" class="table-cell-input" id="igstValue" name="invoiceProducts[{{$invoiceProduct['invoiceSerial']}}][igstValue]" value="{{$invoiceProduct['igstValue']}}" readonly>
																	<input type="text" class="table-cell-input " id="igstRate" name="invoiceProducts[{{$invoiceProduct['invoiceSerial']}}][igstRate]" value="{{$invoiceProduct['igstRate']}}" readonly> </td>
																<td class="product-detail-cell readonly-cell" id="cgstValue">
																	<input type="text" class="table-cell-input" id="cgstValue" name="invoiceProducts[{{$invoiceProduct['invoiceSerial']}}][cgstValue]" value="{{$invoiceProduct['cgstValue']}}" readonly>
																	<input type="text" class="table-cell-input " id="cgstRate" name="invoiceProducts[{{$invoiceProduct['invoiceSerial']}}][cgstRate]" value="{{$invoiceProduct['cgstRate']}}" readonly> </td>
																<td class="product-detail-cell readonly-cell" id="sgstValue">
																	<input type="text" class="table-cell-input" id="sgstValue" name="invoiceProducts[{{$invoiceProduct['invoiceSerial']}}][sgstValue]" value="{{$invoiceProduct['sgstValue']}}" readonly>
																	<input type="text" class="table-cell-input " id="sgstRate" name="invoiceProducts[{{$invoiceProduct['invoiceSerial']}}][sgstRate]" value="{{$invoiceProduct['sgstRate']}}" readonly> </td>
																<td class="product-detail-cell readonly-cell" id="cessRate">
																	<input type="text" class="table-cell-input" id="cessRate" name="invoiceProducts[{{$invoiceProduct['invoiceSerial']}}][cessRate]" value="{{$invoiceProduct['cessRate']}}" readonly> </td>
																<td class="product-detail-cell readonly-cell" id="cessValue">
																	<input type="text" class="table-cell-input" id="cessValue" name="invoiceProducts[{{$invoiceProduct['invoiceSerial']}}][cessValue]" value="{{$invoiceProduct['cessValue']}}" readonly> </td>
																</tr>

															@endforeach

															<tr class="invoice-totals-row-scrollable">
																<td colspan="5" class=""><a href="javascript:;" id="add-empty-row-button">+ Add another line</a></td>
																<td colspan="2" class="">Total Inv. Val</td>
																<td class="invoice-total-cell readonly-cell" id="taxableValue">
																	<input type="text" 	class="table-cell-total" id="taxableValue" name="totalTaxablevalue" value="{{$invoice->totalTaxableValue}}" readonly>
																</td>
																<td colspan="1" class=""></td>
																<td class="invoice-total-cell readonly-cell" id="igstValue">
																	<input type="text" 	class="table-cell-total" id="igstValue" name="totalIgstvalue" value="{{$invoice->totalIgstValue}}" readonly>
																</td>
																<td class="invoice-total-cell readonly-cell" id="totalCgstValue">
																	<input type="text" 	class="table-cell-total" id="cgstValue" name="totalCgstvalue" value="{{$invoice->totalCgstValue}}" readonly>
																</td>
																<td class="invoice-total-cell readonly-cell" id="sgstValue">
																	<input type="text" 	class="table-cell-total" id="sgstValue" name="totalSgstvalue" value="{{$invoice->totalSgstValue}}" readonly>
																</td>
																<td colspan="1" class="invoice-total-cell readonly-cell"></td>
																<td class="invoice-total-cell readonly-cell" id="cessValue">
																	<input type="text" 	class="table-cell-total" id="cessValue" name="totalCessvalue" value="{{$invoice->totalCessValue}}" readonly>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>

											<div class="table-body-fixed table-shadow">
												<div class="table-fixed">
													<table id="table" class="table">
														<thead>
															<tr>
																<th rowspan=2 data-field="total_amount">
																	<div class="th-inner text-right">Total<br>Amount</div>
																</th>
															</tr>
														</thead>
														<tbody>

															@foreach($invoice->product as $invoiceProduct)

																<tr class="product-details-row-fixed" row-index="{{$invoiceProduct['invoiceSerial']}}">
																	<td class="product-detail-cell readonly-cell" id="grossvalue" rowspan="1">
																		<input type="text" class="table-cell-input" id="grossvalue" name="invoiceProducts[{{$invoiceProduct['invoiceSerial']}}][grossvalue]" value="{{$invoiceProduct['grossValue']}}" readonly>
																	</td>
																	<td class="delete-row-cell" colspan="1" rowspan="1">
																		<a href="javascript:;" class="delete-row-link">
																			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
																				<g fill="none" fill-rule="evenodd">
																					<path fill="#FFF" d="M5.308 5.348l5.384 5.304"></path>
																					<path stroke="#FF4949" stroke-linecap="round" d="M5.308 5.348l5.384 5.304"></path>
																					<path fill="#FFF" d="M10.692 5.348l-5.384 5.304"></path>
																					<path stroke="#FF4949" stroke-linecap="round" d="M10.692 5.348l-5.384 5.304M15 8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"></path>
																				</g>
																			</svg>
																		</a>
																	</td>
																</tr>

															@endforeach

															<tr class="invoice-totals-row-fixed">
																<td class="invoice-total-cell readonly-cell" id="netValue">
																	<input type="text" 	class="table-cell-total" id="netValue" name="netValue" value="{{$invoice->netValue}}" readonly>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-12 text-right" style="max-width: calc(100% - 160px);">
										<div class="pure-checkbox">
											<input name="roundOffState" type="text" value="off" hidden>
											<input class="" id="roundOffState" name="roundOffState" type="checkbox" {{ ( $invoice->roundOffState === "on" ) ? 'checked' : '' }}>
											<label for="roundOffState">Round Off : </label>
										</div>
									</div>
									<div class="col-auto m-0 p-0">
										<input class="roundOffValue" type="text" id="roundOffValue" name="roundOffValue" value="{{$invoice->roundOffValue}}" readonly>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-12 text-right" style="max-width: calc(100% - 160px);">
										<label for="grandValue">Net Total : </label>
									</div>
									<div class="col-auto m-0 p-0">
										<input class="grandValue" type="text" id="grandValue" name="grandValue" value="{{$invoice->grandValue}}" readonly>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-12 text-right my-auto" style="max-width: calc(100% - 160px);">
										<label for="amountRecieved">Amount Recieved : </label>
									</div>
									<div class="col-auto m-0 p-0" style="max-width: 108px;">
										<input class="form-control numeric-p8d2" type="text" id="amountRecieved" name="amountRecieved" value={{$invoice->grandValue}} readonly>
									</div>
								</div>

								
								<div class="form-group row mt-5 mb-0">
									<div class="col-12 col-md-4 mb-3 mb-md-0">
										<div class="row">
											<label for="invoiceStatus" class="col-md-12 col-form-label">@lang('laryl-invoices.form.label.invoiceStatus')</label>
					
											<div class="col-md-12">
												<select id="invoiceStatus" name="invoiceStatus" class="form-control">
													<option value="quote"{{ ( $invoice->invoiceStatus === "quote" ) ? 'selected' : '' }}>Quote</option>
													<option value="unpaid"{{ ( $invoice->invoiceStatus === "unpaid" ) ? 'selected' : '' }}>Unpaid</option>
													<option value="partial"{{ ( $invoice->invoiceStatus === "partial" ) ? 'selected' : '' }}>Partial</option>
													<option value="paid"{{ ( $invoice->invoiceStatus === "paid" ) ? 'selected' : '' }}>Paid</option>
												</select>
											</div>
		
											@if ($errors->has('invoiceStatus'))
												<span class="col-md-12 form-error-message">
													<small for="invoiceStatus">{{ $errors->first('invoiceStatus') }}</small>
												</span>
											@endif
										</div>
									</div>
									<div class="col-auto ml-auto my-auto">
										<button type="submit" class="btn btn-success  ml-auto">
											@lang('laryl-invoices.buttons.save-invoice')
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

<div class="remodal" data-remodal-id="editBillingAddress" aria-labelledby="modalTitle" aria-describedby="modalDesc" data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
	<button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
	<div>
		<h2 id="modalTitle">Edit Billing Address</h2>
		<form id="edit_billingaddress_form">
			<div class="row">
				<div class="col-12 form-group mx-auto">
					<textarea name="editBillingAddress" id="editBillingAddress" type="text" class="form-control" style="height: 180px;"> {{ $invoice->customer['billingAddress'] }}</textarea>
					<small for="editBillingAddress" class="validate-text" style="display: none;">Error Text.</small>
				</div>
				<div class="form-group col-auto ml-auto">
					<button type="reset" data-remodal-action="cancel" class="btn btn-danger ml-auto">Close</button>
					<button type="submit" class="btn btn-success">OK</button>
				</div>
			</div>
		</form>			
	</div>
</div>

<div class="remodal" data-remodal-id="editShippingAddress" aria-labelledby="modalTitle" aria-describedby="modalDesc" data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
	<button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
	<div>
		<h2 id="modalTitle">Edit Shipping Address</h2>
		<form id="edit_shippingaddress_form">
			<div class="row">
				<div class="col-12 form-group mx-auto">
					<textarea name="editShippingAddress" id="editShippingAddress" type="text" class="form-control" style="height: 180px;"> {{ $invoice->customer['shippingAddress'] }} </textarea>
					<small for="editShippingAddress" class="validate-text" style="display: none;">Error Text.</small>
				</div>
				<div class="form-group col-auto ml-auto">
					<button type="reset" data-remodal-action="cancel" class="btn btn-danger ml-auto">Close</button>
					<button type="submit" class="btn btn-success">OK</button>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="remodal" data-remodal-id="selectProductModal" aria-labelledby="modalTitle" aria-describedby="modalDesc" data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
	<button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
	<div>
		<h2 id="modalTitle">Search Product</h2>
		<form id="selectProduct_form">
			<div class="form-group row align-items-center">
				<label class="col-sm-3 col-form-label">Product Description</label>
				<div class="col-sm-9">
					<input name="ProductDescription" id="searchProductDescription" type="text" placeholder="Product's Description" class="form-control" autofocus>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-auto ml-auto" style="text-align: left;">
					<button type="reset" data-remodal-action="cancel" class="btn btn-danger ml-auto">Close</button>
				</div>
			</div>	
		</form>			
	</div>
</div>

<script>
	window.invoice_product_serial = 1;
	window.workingRowIndex = 0;

	window.tableScrollable = $(".table-body-scrollable");
	window.tableFixed = $('.table-fixed');

	$(function() {
		
		// add_empty_productrow();
		setRowHeight();
		renumber_productrow();

		$('select#invoiceStatus').change();

		@foreach($invoice->product as $invoiceProduct)
			new_product_added( {{$invoiceProduct['invoiceSerial']}} );
		@endforeach
		
		autosize($('textarea.autosize'));

		//Declaring select customer remodal as JS obj. Used when closing the modal after customer selection
		var remodal_options = {
			hashTracking: false, closeOnOutsideClick: false,
		};

		window.selectProductModal = $('[data-remodal-id=selectProductModal]').remodal(remodal_options);

	});

</script>

<script src="{{ asset('js/new-invoice.js') }}"></script>

<script>
	$('#editInvoiceForm').on('submit', function(e){

		$('.input-error').removeClass('input-error');

		$.ajaxSetup({
			header:$('meta[name="_token"]').attr('content')
		});

		e.preventDefault();

		var formdata = $(this).serializeArray();
		var posturl = $(this).attr('action');

		console.log(formdata);
		console.log(posturl);

		$.ajax({
			type	:"POST",
			url		: posturl,
			data	: formdata,
			dataType: 'json',
			success: function(response){

				swal_message("Invoice Saved.", "success");
				
			},
			error: function(response){

				var responseText = JSON.parse(response['responseText']);
				var responseErrors = responseText['errors'];

				$.each( responseErrors, function( key, value ) {
					var splitKey = key.split(".");
					console.log(splitKey);
					if((splitKey.length) > 1) {
						$('[name="'+splitKey[0]+'['+splitKey[1]+']'+'"]').addClass('input-error');
					} else {
						$('[name="'+splitKey[0]+'"]').addClass('input-error');
					}
				});

				swal_message("Error in Submission. Re-Submit", "error");

			}
		})
	});

	function swal_message(message_set, type_set, toast_set="true") {
		swal({
				title: message_set,
				type: type_set,
				toast:	toast_set,
				showConfirmButton:false,
				showCloseButton: true,
				timer: 3000,
				grow: false,
				position: 'top-right',
			});
	}
</script>


@endsection