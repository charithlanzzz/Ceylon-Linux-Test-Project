<?php

namespace App\Http\Controllers;

use App\Models\FreeIssue;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use PDF;

class FreeIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FreeIssue::all();
        return view('freeissue.retrieve_all_freeissue')->with('freeissue_details', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('freeissue.create_freeissue');
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
            'free_issue_label' => 'required',
            'type' => 'required',
            'purchase_product' => 'required',
            'free_product' => 'required',
            'purchase_quantity' => 'required',
            'free_quantity' => 'required',
            'lower_limit' => 'required',
            'upper_limit' => 'required',

        ]);


        if ($validator->fails()) {
            return response()->Json(['status' => 'error', 'msg' => 'validation failed']);

        }

        $task = new FreeIssue();

        $task->free_issue_label = $formdata['free_issue_label'];
        $task->type = $formdata['type'];
        $task->purchase_product = $formdata['purchase_product'];
        $task->free_product = $formdata['free_product'];
        $task->purchase_quantity = $formdata['purchase_quantity'];
        $task->free_quantity = $formdata['free_quantity'];
        $task->lower_limit = $formdata['lower_limit'];
        $task->upper_limit = $formdata['upper_limit'];



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
        $freeissue = FreeIssue::where('id', $id)->first();
        return view('freeissue.update_freeissue',compact('freeissue'));
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
        $updatedata = FreeIssue::find($request->id);
        $updatedata->free_issue_label = $request->free_issue_label;
        $updatedata->type = $request->type;
        $updatedata->purchase_product = $request->purchase_product;
        $updatedata->free_product = $request->free_product;
        $updatedata->purchase_quantity = $request->purchase_quantity;
        $updatedata->free_quantity = $request->free_quantity;
        $updatedata->lower_limit = $request->lower_limit;
        $updatedata->upper_limit = $request->upper_limit;

        $updatedata->save();

        $freeissuedatas = Freeissue::all();
        return view('freeissue.retrieve_all_freeissue')->with('freeissue_details', $freeissuedatas);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $freeissue = FreeIssue::find($id);
        $freeissue->delete();
        return response()->Json(['status' => 'success', 'msg' => 'Deleted successfully']);
    }


    public function getFreeIssueList(Request $request)
    {
        $freeissues = FreeIssue::all();

        return DataTables::of($freeissues)
            ->addColumn('action', function ($freeissues) {
                return '<div >
               <a href="' . url('/freeissues/' . $freeissues->id . '/edit') . '" class="btn btn" style="background-color:#09560D!important;color:white;margin-top:10px;" ><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
               <button class="btn btn btn_delete " data-id="' . $freeissues->id . '" style="background-color:#CF0808!important;color:white;width:45px;margin-top: 10px;"><i class="fa fa-trash" aria-hidden="true"></i></button>


           </div>  ';
            })
            ->rawColumns(['action'])
            ->make();
    }


    public function freeissuePDF(){

        $freeissue_details = FreeIssue::all();
        $pdf = PDF::loadView('freeissue.freeissue_report',compact('freeissue_details'));
        return $pdf->download('Free Issue Details.pdf');
    }
}
