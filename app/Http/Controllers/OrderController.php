<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use PDF;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('order.retrieve_all_orders');
    }

    public function addOrderList(Request $request)
    {
        return DataTables::of(Order::all())
            ->addColumn('order_number', function ($order) {
                return $order->order_no ?? "";
            })
            ->addColumn('customer_name', function ($order) {
                return $order->customer->customer_name ?? "";
            })
            ->addColumn('order_date', function ($order) {
                return $order->order_date->format('Y-m-d H:i A') ?? "";
            })
            ->addColumn('net_amount', function ($order) {
                return $order->net_amount ?? "";
            })
           ->addColumn('action', function ($orders) {
                return '<div >
               <a href="' . url('/orders/' . $orders->id . '/edit') . '" class="btn btn-primary" style="!important;color:white;margin-top:10px;" ><i class="fa fa-eye" aria-hidden="true"></i></a>



           </div>  ';
            })
            ->rawColumns(['action'])
            ->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('order.create_order', compact('products', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order();
        $order->customer_id = $request->customer_id;
        $order->order_no = 'ODR'.$order->id;
        $order->order_date = now();
        $order->net_amount = 0;
        $order->save();

        $net_amount = 0;
        foreach ($request->products as $key => $product)
        {
            $itm = Product::find($product);
            $amount = $itm->price*$request->qtys[$key];

            $order_itm = new OrderItem();
            $order_itm->order_id = $order->id;
            $order_itm->product_id = $product;
            $order_itm->quantity = $request->qtys[$key];
            $order_itm->amount = $amount;
            $order_itm->save();

            $net_amount = $net_amount + $amount;
        }
        $order->net_amount = $net_amount;
        $order->order_no = 'ODR'.$order->id;
        $order->save();

        return redirect('/orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::where('id', $id)->first();
        return view('order.update_order',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function addOrderItem(Request $request)
    {
        $product_id = $request->product;
        $product = Product::find($product_id);
        $view =  view('order.add_order_item', compact('product'))->render();
        return response()->json(['row' => $view]);
    }


    public function orderPDF(Request $request){

        $order_details = Order::all();
        $pdf = PDF::loadView('order.order_report',compact('order_details'));
        return $pdf->download('Order Details.pdf');
    }
}
