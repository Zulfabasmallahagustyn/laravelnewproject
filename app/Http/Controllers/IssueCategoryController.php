<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IssueCategory;
use Auth;
//Importing laravel-permission models
//Enables us to output flash messaging
use Session;

class IssueCategoryController extends Controller
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
        $ticket = \App\IssueCategory::all();

        return view('index2', compact('ticket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('laporanisu2');
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

        $issuecategories = new IssueCategory;

        $issuecategories->name = $request->name;
        $issuecategories->description = $request->description;

        $issuecategories->save();

        return redirect()->route('issuecategory.index')->with('Sukses', 'Data sudah dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = \App\IssueCategory::find($id);
        return view ('show2', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $issuecategory = \App\IssueCategory::find($id);
        return view('edit2', compact('issuecategory'));    
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
      $ticket = \App\IssueCategory::find($id);
      $ticket->name = $request->get('name');
      $ticket->description = $request->get('description');
      $ticket->save();

      return redirect()->route('issuecategory.index')->with('Sukses', 'Data sudah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $issuecategory = \App\IssueCategory::findOrFail($id); 
        $issuecategory->delete();

        return redirect()->route('issuecategory.index')
            ->with('Sukses',
             'Data sudah dihapus');
    }
}
