<?php

namespace App\Http\Controllers\Backend;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\AceController\Controller;

use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Schema;
use Schema;

use Validator;
use Redirect;

use Importer;
use Exporter;
use App\Serialisers\ProductSerialiser;

class ProductsController extends Controller
{
    public function __construct(Request $request)
	{
        $request->route()->setParameter('page-heading', 'Products');		
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);

		return view('backend.products.products_list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.products.create_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
			'description'	    => 'required|string|max:255',
			'type'              => 'required|in:goods, service',
			'hsn'               => 'required|regex:/\d{8}/',
			'sku'		        => 'required|alpha_dash',
			'taxRate'	        => 'required',
			'cessValue'         => 'required',
			'saleValue'     	=> 'required',
			'unit'              => 'required',
			'discountRate'   => 'required',
			
		);

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			
			toast('Rectify errors and re-submit!','error','top-right')->autoclose(3500);

			return Redirect::to('products/create')
				->withErrors($validator)
				->withInput($request->input());

		} else {
            
            $product = Product::create($request->all());

			$product->save();

			// redirect
			toast('Product Created Successfully!','success','top-right')->autoclose(3500);
			return Redirect::to('products');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('backend.products.view_product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('backend.products.edit_product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
			'description'	    => 'required|string|max:255',
			'type'              => 'required|in:goods, service',
			'hsn'               => 'required|regex:/\d{8}/',
			'sku'		        => 'required|alpha_dash',
			'taxRate'	        => 'required',
			'cessValue'        => 'required',
			'saleValue'     	=> 'required',
			'unit'              => 'required',
			'discountRate'   => 'required',
			
		);

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			
			toast('Rectify errors and re-submit!','error','top-right')->autoclose(3500);

			return Redirect::to('products/' . $id . '/edit')
				->withErrors($validator)
				->withInput($request->input());

		} else {
            
            Product::whereId($id)->update($request->except('_token', '_method'));

			// redirect
			toast('Product Updated Successfully!','success','top-right')->autoclose(3500);
			return Redirect::to('products');
		}
    }

    /**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		return redirect()->route('Products.products.show', $id);
	}

	public function uploadexcel(Request $request)
	{
		$extension = $request->file('productsExcel')->extension();

		if($extension != 'xlsx'){
			toast('Wrong File Extension','error','top-right')->autoclose(3500);
			return back();
		}

		$filenameToStore = 'productsupload'.'_'.time().'.'.$extension;
		$path = $request->file('productsExcel')->storeAs('swiftbilling', $filenameToStore, 'public');

		$request->request->add(['filepath' => 'storage/'.$path]);


		$excel = Importer::make('Excel');
		$excel->load($request->filepath);
		$collection = $excel->getCollection();

		$noOfItems = count($collection);
		$noOfFields = count($collection[0]);

		$items = array();
		for($i = 0; $i<$noOfItems; $i++){
			for($j = 0; $j<$noOfFields; $j++){
				$items[$i][$collection[0][$j]] = $collection[$i][$j];
			}
		}

		unset($items[0]);
		$items = array_values($items);

		foreach($items as $item) {
			Product::create($item);
		}

		toast('File Uploaded','success','top-right')->autoclose(3500);
		return back();
	}

	public function downloadexcel()
	{
		$serialiser = new ProductSerialiser();
		$products = Product::all();

		$excel = Exporter::make('Excel');
		$excel->load($products);
		$excel->setSerialiser($serialiser);
		
		return $excel->stream('productstable.xlsx');
	}
}
