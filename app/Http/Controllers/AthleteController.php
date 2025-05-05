<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AthleteController extends Controller
{
    

    public function index()
    {
        $athletes = Athlete::where('user_id', Auth::id())->get();
        // if(Auth::user()->role == 'admin') {
        //     $athletes = Athlete::all();
        // }
        return view('athletes.index', compact('athletes'));
    }
    public function create()
        {
            return view('athletes.create');
        }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'            => 'required',
            'tempat_lahir'    => 'required',
            'tanggal_lahir'   => 'required|date',
            'nik'             => 'required|unique:athletes',
            'no_hp'           => 'required',
            'jenis_kelamin' => 'required|in:Putra,Putri',
            'akte' => 'nullable|file|mimes:pdf',
            'sertifikat_sabuk' => 'nullable|file|mimes:pdf',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();
        
        if ($request->hasFile('akte')) {
            $akteFile = $request->file('akte');
            $akteFileName = time() . '_akte_' . $akteFile->getClientOriginalName();
            $akteFile->storeAs('public/akte', $akteFileName);
            $validatedData['akte'] = $akteFileName;
        } else {
            $validatedData['akte'] = null;
        } 
        
        if ($request->hasFile('sertifikat_sabuk')) {
            $sertifikatSabukFile = $request->file('sertifikat_sabuk');
            $sertifikatSabukFileName = time() . '_sertifikat_' . $sertifikatSabukFile->getClientOriginalName();
            $sertifikatSabukFile->storeAs('public/sertifikat_sabuk', $sertifikatSabukFileName);
            $validatedData['sertifikat_sabuk'] = $sertifikatSabukFileName;
        } else {
            $validatedData['sertifikat_sabuk'] = null;
        }
        $validatedData['user_id'] = auth()->id();
        Athlete::create($validatedData);
        return Redirect::to('/athletes')->with('success', 'Atlit Telah Berhasil Didaftarkan.');
    }


    public function edit(Athlete $athlete)
    {
       if(Auth::user()->role == 'admin')
       {
            return view('admin.athletes.edit', compact('athlete'));
       } else {
            return view('athletes.edit', compact('athlete'));
       }
    }
    public function update(Request $request, Athlete $athlete)
    {
         $validator = Validator::make($request->all(), [
            'name'            => 'required',
            'tempat_lahir'    => 'required',
            'tanggal_lahir'   => 'required|date',
            'nik'             => 'required|unique:athletes,nik,'.$athlete->id,
            'no_hp'           => 'required',
            'jenis_kelamin' => 'required|in:Putra,Putri',
            'akte' => 'nullable|file|mimes:pdf',
            'sertifikat_sabuk' => 'nullable|file|mimes:pdf',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();
        
        if ($request->hasFile('akte')) {
            $akteFile = $request->file('akte');
            $akteFileName = time() . '_akte_' . $akteFile->getClientOriginalName();
            $akteFile->storeAs('public/akte', $akteFileName);
            $validatedData['akte'] = $akteFileName;
        } else if ($athlete->akte){
            $validatedData['akte'] = $athlete->akte;
        }

        if ($request->hasFile('sertifikat_sabuk')) {
            $sertifikatSabukFile = $request->file('sertifikat_sabuk');
            $sertifikatSabukFileName = time() . '_sertifikat_' . $sertifikatSabukFile->getClientOriginalName();
            $sertifikatSabukFile->storeAs('public/sertifikat_sabuk', $sertifikatSabukFileName);
            $validatedData['sertifikat_sabuk'] = $sertifikatSabukFileName;
        } else if($athlete->sertifikat_sabuk) {
            $validatedData['sertifikat_sabuk'] = $athlete->sertifikat_sabuk;
        }
        $athlete->update($validatedData);
        if(Auth::user()->role == 'admin'){
            return Redirect::to('/admin/athletes')->with('success', 'Data Atlit Telah Berhasil Diperbarui.');
        }
        else {
            return Redirect::to('/athletes')->with('success', 'Data Atlit Telah Berhasil Diperbarui.');
        }
    }

    public function destroy(Athlete $athlete)
    {
        $athlete->delete();
        return redirect('/admin/athletes')->with('success', 'Data Atlit Telah Berhasil Dihapus');
    }

}