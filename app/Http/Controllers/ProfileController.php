<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Auth;
//Importing laravel-permission models
//Enables us to output flash messaging
use Session;

class ProfileController extends Controller
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
        $ticket = \App\Profile::all();

        return view('index', compact('ticket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('laporanisu');
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
                'user_id => required',
                'name => required',
                'photo_url => required'
             )
        );

        $profiles = new Profile;

        $profiles->user_id = $request->user_id;
        $profiles->name = $request->name;
        $profiles->photo_url = $request->photo_url;

        $profiles->save();

        return redirect()->route('profile.index')->with('Sukses', 'Data sudah dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = \App\Profile::find($id);
        return view ('show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = \App\Profile::find($id);
        return view('edit', compact('profile'));
    }

    /**
     * Update the specified resource in sticket
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $ticket = \App\Profile::find($id);
      $ticket->user_id = $request->get('user_id');
      $ticket->name = $request->get('name');
      $ticket->photo_url = $request->get('photo_url');
      $ticket->save();

      return redirect()->route('profile.index')->with('Sukses', 'Data sudah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = \App\Profile::findOrFail($id); 
        $profile->delete();

        return redirect()->route('profile.index')
            ->with('Sukses',
             'Data sudah dihapus');
    }
}
