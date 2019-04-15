<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IssuePriority;
use Auth;
//Importing laravel-permission models
//Enables us to output flash messaging
use Session;

class IssuePriorityController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isEditor']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Tampil data
        $ticket = \App\IssuePriority::all();

        return view('index4', compact('ticket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('laporanisu4');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            array(
                'name => required',
                'description => required'
             )
        );

        $issuepriorities = new IssuePriority;

        $issuepriorities->name = $request->name;
        $issuepriorities->description = $request->description;

        $issuepriorities->save();

        return redirect()->route('issuepriority.index')->with('Sukses', 'Data sudah dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = \App\IssuePriority::find($id);
        return view ('show4', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $issuepriority = \App\IssuePriority::find($id);
        return view('edit4', compact('issuepriority'));
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
      $ticket = \App\IssuePriority::find($id);
      $ticket->name = $request->get('name');
      $ticket->description = $request->get('description');
      $ticket->save();

      return redirect()->route('issuepriority.index')->with('Sukses', 'Data sudah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $issuepriority = \App\IssuePriority::findOrFail($id); 
        $issuepriority->delete();

        return redirect()->route('issuepriority.index')
            ->with('Sukses',
             'Data sudah dihapus');
    }
}
