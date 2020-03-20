<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Center;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $centers = DB::table('centers')->get();
        return view('admin.center.index')->with('centers',$centers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.center.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $request->validate([
             'center_opening_date' =>'date',
            'center_name' => 'required',
            'center_address' => 'required',
            'center_phone' => 'numeric',
        ]);
        $center = new Center;
        $center->name = $request->center_name;
        $center->address = $request->center_address;
        if(isset($request->center_phone))
        {
            $center->phone = $request->center_phone;
        }
        if(isset($request->center_opening_date))
        {
           // $center->opening_date = Carbon::now()->format('Y-m-d H:i:s');
            $center->opening_date = $request->center_opening_date;
        }
        $center->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function show(Center $center)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function edit(Center $center)
    {
        return view('admin.center.edit')->with(['center' => $center]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Center $center)
    {
        $request->validate([
            'center_opening_date' =>'date',
            'center_name' => 'required',
            'center_address' => 'required',
            'center_phone' => 'numeric',
        ]);
        $center->name = $request->center_name;
        $center->address = $request->center_address;
        if(isset($request->center_phone))
        {
            $center->phone = $request->center_phone;
        }
        if(isset($request->center_opening_date))
        {
            $center->opening_date = $request->center_opening_date;
        }

        $center->update();

        return redirect()->route('admin.centers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function destroy(Center $center)
    {
        $center->delete();
        return redirect()->route('admin.centers.index');
    }

    public function delete(Center $center)
    {
        return view('admin.center.delete')->with('center',$center);
    }
}
