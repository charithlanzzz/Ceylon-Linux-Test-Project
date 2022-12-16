<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use PDF;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Customer::all();
        return view('retrieve_all_customers')->with('customer_details', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_customer');
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
            'customer_name' => 'required',
            'customer_code' => 'required',
            'customer_address' => 'required',
            'customer_contact' => 'required',

        ]);


        if ($validator->fails()) {
            return response()->Json(['status' => 'error', 'msg' => 'validation failed']);

        }

        $task = new Customer();

        $task->customer_name = $formdata['customer_name'];
        $task->customer_code = $formdata['customer_code'];
        $task->customer_address = $formdata['customer_address'];
        $task->customer_contact = $formdata['customer_contact'];



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
        $customer = Customer::where('id', $id)->first();
        return view('update_customer',compact('customer'));
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
        $updatedata = Customer::find($request->id);
        $updatedata->customer_name = $request->customer_name;
        $updatedata->customer_code = $request->customer_code;
        $updatedata->customer_address = $request->customer_address;
        $updatedata->customer_contact = $request->customer_contact;

        $updatedata->save();

        $customerdatas = Customer::all();
        return view('retrieve_all_customers')->with('customer_details', $customerdatas);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $customer = Customer::find($id);
        $customer->delete();
        return response()->Json(['status' => 'success', 'msg' => 'Deleted successfully']);
    }


    public function getCustomerList(Request $request)
    {
        $customers = Customer::all();

        return DataTables::of($customers)
            ->addColumn('action', function ($customers) {
                return '<div >
               <a href="' . url('/customers/' . $customers->id . '/edit') . '" class="btn btn" style="background-color:#09560D!important;color:white;" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
               <button class="btn btn btn_delete " data-id="' . $customers->id . '" style="background-color:#CF0808!important;color:white;width:45px;margin-top: 10px;"><i class="fa fa-trash" aria-hidden="true"></i></button>


           </div>  ';
            })
            ->rawColumns(['action'])
            ->make();
    }


    public function customerPDF(){

        $customer_details = Customer::all();
        $pdf = PDF::loadView('customer_report',compact('customer_details'));
        return $pdf->download('Customer Details.pdf');
    }
}
