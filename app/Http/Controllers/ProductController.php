<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use PDF;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::all();
        return view('product.retrieve_all_products')->with('product_details', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        parse_str($request['formdata'], $formdata);

        $validator = Validator::make($formdata, [
            'product_name' => 'required',
            'product_code' => 'required',
            'price' => 'required',
            'expire_date' => 'required',

        ]);


        if ($validator->fails()) {
            return response()->Json(['status' => 'error', 'msg' => 'validation failed']);

        }

        $task = new Product();

        $task->product_name = $formdata['product_name'];
        $task->product_code = $formdata['product_code'];
        $task->price = $formdata['price'];
        $task->expire_date = $formdata['expire_date'];



        $task->save();
        return response()->Json(['status' => 'success', 'msg' => 'Added successfully', 'id'=>$task->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        return view('product.update_product',compact('product'));
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
        $updatedata = Product::find($request->id);
        $updatedata->product_name = $request->product_name;
        $updatedata->product_code = $request->product_code;
        $updatedata->price = $request->price;
        $updatedata->expire_date = $request->expire_date;

        $updatedata->save();

        $productdatas = Product::all();
        return view('product.retrieve_all_products')->with('product_details', $productdatas);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->Json(['status' => 'success', 'msg' => 'Deleted successfully']);

    }

    public function getProductList(Request $request)
    {
        $products = Product::all();

        return DataTables::of($products)
            ->addColumn('action', function ($products) {
                return '<div >
               <a href="' . url('/products/' . $products->id . '/edit') . '" class="btn btn" style="background-color:#09560D!important;color:white;margin-top:10px;" ><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
               <button class="btn btn btn_delete " data-id="' . $products->id . '" style="background-color:#CF0808!important;color:white;width:45px;margin-top: 10px;"><i class="fa fa-trash" aria-hidden="true"></i></button>


           </div>  ';
            })
            ->rawColumns(['action'])
            ->make();
    }


    public function productPDF(){

        $product_details = Product::all();
        $pdf = PDF::loadView('product.product_report',compact('product_details'));
        return $pdf->download('Product Details.pdf');
    }

}
