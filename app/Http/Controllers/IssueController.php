<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Issue;
use Auth;
//Importing laravel-permission models
//Enables us to output flash messaging
use Session;

class IssueController extends Controller
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
        $ticket = \App\Issue::all();

        return view('index3', compact('ticket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ticket = \App\Issue::get();

        return view('laporanisu3', compact('ticket'));
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
                'issue_category_id => required',
                'issue_priority_id => required',
                'name => required',
                'email => required',
                'description => required'
             )
        );

        $issues = new Issue;

        $issues->issue_category_id = $request->issue_category_id;
        $issues->issue_priority_id = $request->issue_priority_id;
        $issues->name = $request->name;
        $issues->email = $request->email;
        $issues->description = $request->description;

        $issues->save();

        return redirect()->route('issue.index')->with('Sukses', 'Data sudah dibuat');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = \App\Issue::find($id);
        return view ('show3', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $issue = \App\Issue::find($id);
        return view('edit3', compact('issue'));
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
      $ticket = \App\Issue::find($id);
      $ticket->issue_category_id = $request->get('issue_category_id');
      $ticket->issue_priority_id = $request->get('issue_priority_id');
      $ticket->name = $request->get('name');
       $ticket->email = $request->get('email');
      $ticket->description = $request->get('description');
      $ticket->save();

      return redirect()->route('issue.index')->with('Sukses', 'Data sudah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $issue = \App\Issue::findOrFail($id); 
        $issue->delete();

        return redirect()->route('issue.index')
            ->with('Sukses',
             'Data sudah dihapus');
    }
}
