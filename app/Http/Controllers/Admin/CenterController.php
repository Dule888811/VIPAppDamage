<?php

namespace App\Http\Controllers\Admin;
use App\Damage;
use App\Http\Controllers\Controller;
use App\Center;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\CenterRepositories;
use App\Repositories\CenterRepositoriesInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CenterController extends Controller
{
    private $centerRepositories;
    public function __construct(CenterRepositoriesInterface $centerRepositories)
    {
        $this->centerRepositories = $centerRepositories;
    }

    public function index()
    {

        $centers = $this->centerRepositories->all();
        return view('admin.center.index')->with('centers',$centers);
    }


    public function create()
    {
        return view('admin.center.create');
    }


    public function store(Request $request)
    {

         $request->validate([
            'center_name' => 'required',
            'center_address' => 'required',
        ]);

        $centers = $this->centerRepositories->store($request);

        return redirect()->back();
    }


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
            'center_name' => 'required',
            'center_address' => 'required',
        ]);
      $this->centerRepositories->update($request,$center);
        return redirect()->route('admin.centers.index');
    }

    public function destroy(Center $center)
    {
        $center->delete();
        return redirect()->route('admin.centers.index');
    }

    public function delete(Center $center)
    {
        return view('admin.center.delete')->with('center',$center);
    }

    public function damage(Center $center)
    {
        $damages = DB::table('damages')->where('center_id','=',$center->id)->get();
        return view('admin.center.damage')->with('damages',$damages);

    }


}
