<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuario = UserProfile::orderBy('id_user', 'asc')->paginate(10);;
        return view('usuarios.index', compact('usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'names' => 'required|string|max:45',
            'first_lastname' => 'required|string|max:45',
            'second_lastname' => 'required|string|max:45',
            'email' => 'required|email|unique:userprofile,email',
            'phone' => 'required|regex:/^[0-9]{9,15}$/',
        ]);

        try {
            UserProfile::create([
                'names' => $request->names,
                'first_lastname' => $request->first_lastname,
                'second_lastname' => $request->second_lastname,
                'email' => $request->email,
                'phone' => $request->phone
            ]);
            session()->flash('success', 'Usuario creado exitosamente.');
            return redirect()->route('usuarios.index');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $usuario = UserProfile::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $usuario = UserProfile::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $usuario = UserProfile::findOrFail($id);
        $request->validate([
            'names' => 'required|string|max:45',
            'first_lastname' => 'required|string|max:45',
            'second_lastname' => 'required|string|max:45',
            'email' => 'required|email|unique:userprofile,email,' . $usuario->id_user . ',id_user',
            'phone' => 'required|regex:/^[0-9]{9,15}$/',
        ]);

        try {
            $usuario->update([
                'names' => $request->names,
                'first_lastname' => $request->first_lastname,
                'second_lastname' => $request->second_lastname,
                'email' => $request->email,
                'phone' => $request->phone
            ]);
            session()->flash('success', 'Usuario actualizado exitosamente.');
            return redirect()->route('usuarios.index');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $usuario = UserProfile::findOrFail($id);
            $usuario->delete();
            session()->flash('success', 'Usuario eliminado exitosamente.');
            return redirect()->route('usuarios.index');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error.']);
        }
    }
}
