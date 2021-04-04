<?php

namespace App\Http\Controllers;

use App\Models\Master;
use Illuminate\Http\Request;
use Validator;

class MasterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ('name' == $request->sort) {
            $masters = Master::orderBy('name')->get();
         } elseif ('surname' == $request->sort) {
             $masters = Master::orderBy('surname')->get();
         } else {
             $masters = Master::all();
         }

       return view('master.index', ['masters' => $masters]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),
        [
        'master_name' => ['required', 'min:3', 'max:64','alpha'],
        'master_surname' => ['required', 'min:3', 'max:64', 'alpha'],
        ],
        [
        'master_surname.min' => 'per trumpa pavarde',
        'master_name.min' => 'per trumpas vardas'
        ]
        );
        if ($validator->fails()) {
        $request->flash();
        return redirect()->back()->withErrors($validator);
        }
        Master::create($request);
        return redirect()->route('master.index')->with('success_message', 'The Master has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function show(Master $master)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function edit(Master $master)
    {
        return view('master.edit', ['master' => $master]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Master $master)
    {

        $validator = Validator::make($request->all(),
        [
        'master_name' => ['required', 'min:3', 'max:64'],
        'master_surname' => ['required', 'min:3', 'max:64'],
        ],
        [
        'master_surname.min' => 'mano zinute'
        ]
        );
        if ($validator->fails()) {
        $request->flash();
        return redirect()->back()->withErrors($validator);
        }

        $master->name = $request->master_name;
        $master->surname = $request->master_surname;
        $master->save();
        return redirect()->route('master.index')->with('success_message', 'Master had been updated');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function destroy(Master $master)
    {
        if($master->masterOutfits->count()){
            return redirect()->route('master.index')->with('info_message', 'The Master is immortal');
        }
        $master->delete();
        return redirect()->route('master.index')->with('info_message', 'The master has been deleted');
 
    }
}
