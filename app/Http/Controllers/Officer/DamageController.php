<?php

namespace App\Http\Controllers\Officer;


use App\Http\Controllers\Controller;
use App\Damage;
use App\Mail\ProvidePassword;
use App\Mail\WarningMail;
use App\Repositories\DamageRepositories;
use App\Repositories\DamageRepositoriesInterface;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Center;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
class DamageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $damageRepositories;

    public function __construct(DamageRepositoriesInterface $damageRepositories)
    {
        $this->damageRepositories = $damageRepositories;
    }

    public function index()
    {
        $damages = $this->damageRepositories->all();
        return view('officer.index')->with('damages',$damages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centers = Center::all();
        return view('officer.create')->with('centers',$centers);

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
            'damage_date' =>'date|required',
            'center_damage' => 'required',
            'type_priority' => 'required',
            'status' => 'required',
            'damage_description' => 'required',
        ]);

        $damage = $this->damageRepositories->store($request);
        $id = $damage->id;
        $damageArray[] = array();
        if($damage->type_of_priority == 'critical'){
            $damageArray[] = $damage;
            $user = User::where('role','admin')->first()->get();
            Mail::to($user)->send(new WarningMail($user));
        }

        self::sendMail($damageArray);


        return redirect()->back();
    }

    public static function sendMail($damageArray)
    {

      for ($i=0;$i++;$i<count($damageArray))
      {
          $time = Carbon::now();
          $timeFuture = $time->addDays(1);
          while ($damageArray[$i] == 'critical')
              {
                  if($timeFuture == Carbon::now()){
                      $time = $time->addDays(1);
                      $user = User::where('role', 'admin')->first()->get();
                      Mail::to($user)->send(new WarningMail($user));
                  }

              }
      }

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Damage  $damage
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Damage  $damage
     * @return \Illuminate\Http\Response
     */
    public function edit(Damage $damage)
    {
        $centers = Center::all();
        return view('officer.edit')->with(['damage' => $damage,'centers' => $centers ]);
    }


    public function update(Request $request, Damage $damage)
    {
        $request->validate([
            'damage_date' =>'date|required',
            'center_damage' => 'required',
            'type_priority' => 'required',
            'damage_description' => 'required',
        ]);
        $this->damageRepositories->update($request,$damage);
        return redirect()->route('officer.damages.index');
    }


   
}
