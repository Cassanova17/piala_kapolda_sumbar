<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AthleteController extends Controller
{
    public function dashboard()
    {
        $athletes = Athlete::where('user_id', auth()->id())->get();

        $totalPembayaran = $athletes->sum('jumlah_pembayaran');
        $sudahBayar = $athletes->where('sudah_bayar', true)->sum('jumlah_pembayaran');
        $belumBayar = $totalPembayaran - $sudahBayar;

        return view('dashboard', compact(
            'athletes',
            'totalPembayaran',
            'sudahBayar',
            'belumBayar'));
    }

    public function index()
    {
        $athletes = Athlete::where('user_id', Auth::id())->get();
        return view('athletes.index', compact('athletes'));
    }

    public function create()
    {
        return view('athletes.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required|unique:athletes',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required|in:Putra,Putri',
            'akte' => 'nullable|file|mimes:pdf',
            'sertifikat_sabuk' => 'nullable|file|mimes:pdf',
            'jenis_pertandingan' => 'required|in:Kyourigi,Poomsae,Poomsae Freestyle',
            'kelompok_umur' => 'required|in:Pra Cadet A,Pra Cadet B,Pra Cadet C,Cadet,Junior,Senior',
            'tingkat_pertandingan' => 'required|in:Pemula,Semi Prestasi,Prestasi',
            'kelas_pertandingan' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();

        // Upload file akte
        if ($request->hasFile('akte')) {
            $akteFile = $request->file('akte');
            $akteFileName = time() . '_akte_' . $akteFile->getClientOriginalName();
            $akteFile->storeAs('public/akte', $akteFileName);
            $validatedData['akte'] = $akteFileName;
        }

        // Upload sertifikat sabuk
        if ($request->hasFile('sertifikat_sabuk')) {
            $file = $request->file('sertifikat_sabuk');
            $fileName = time() . '_sertifikat_' . $file->getClientOriginalName();
            $file->storeAs('public/sertifikat_sabuk', $fileName);
            $validatedData['sertifikat_sabuk'] = $fileName;
        }

        $validatedData['user_id'] = auth()->id();
        $validatedData['sudah_bayar'] = false;
        $validatedData['jumlah_pembayaran'] = $this->hitungBiayaPendaftaran(
            $validatedData['jenis_pertandingan'],
            $validatedData['tingkat_pertandingan'],
            $validatedData['kelompok_umur'],
            $validatedData['kelas_pertandingan']
        );

        Athlete::create($validatedData);

        return Redirect::to('/athletes')->with('success', 'Atlit Telah Berhasil Didaftarkan.');
    }

    public function edit(Athlete $athlete)
    {
        $view = Auth::user()->role == 'admin' ? 'admin.athletes.edit' : 'athletes.edit';
        return view($view, compact('athlete'));
    }

    public function update(Request $request, Athlete $athlete)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required|unique:athletes,nik,' . $athlete->id,
            'no_hp' => 'required',
            'jenis_kelamin' => 'required|in:Putra,Putri',
            'akte' => 'nullable|file|mimes:pdf',
            'sertifikat_sabuk' => 'nullable|file|mimes:pdf',
            'jenis_pertandingan' => 'required|in:Kyourigi,Poomsae,Poomsae Freestyle',
            'kelompok_umur' => 'required|in:Pra Cadet A,Pra Cadet B,Pra Cadet C,Cadet,Junior,Senior',
            'tingkat_pertandingan' => 'required|in:Pemula,Semi Prestasi,Prestasi',
            'kelas_pertandingan' => 'nullable',
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
            $validatedData['akte'] = $athlete->akte;
        }

        if ($request->hasFile('sertifikat_sabuk')) {
            $file = $request->file('sertifikat_sabuk');
            $fileName = time() . '_sertifikat_' . $file->getClientOriginalName();
            $file->storeAs('public/sertifikat_sabuk', $fileName);
            $validatedData['sertifikat_sabuk'] = $fileName;
        } else {
            $validatedData['sertifikat_sabuk'] = $athlete->sertifikat_sabuk;
        }

        // Pembayaran hanya boleh ditandai oleh admin
        $validatedData['sudah_bayar'] = $athlete->sudah_bayar;

        // Hitung ulang jumlah pembayaran jika kelas berubah
        $validatedData['jumlah_pembayaran'] = $this->hitungBiayaPendaftaran(
            $validatedData['jenis_pertandingan'],
            $validatedData['tingkat_pertandingan'],
            $validatedData['kelompok_umur'],
            $validatedData['kelas_pertandingan']
        );

        $athlete->update($validatedData);

        return redirect(Auth::user()->role == 'admin' ? '/admin/athletes' : '/athletes')
            ->with('success', 'Data Atlit Telah Berhasil Diperbarui.');
    }

    public function destroy(Athlete $athlete)
    {
        $athlete->delete();
        return redirect('/admin/athletes')->with('success', 'Data Atlit Telah Berhasil Dihapus');
    }

    /**
     * Menentukan biaya pendaftaran berdasarkan kategori.
     */
    private function hitungBiayaPendaftaran($jenis, $tingkat, $kelompok, $kelas)
    {
        if ($jenis === 'Kyourigi') {
            return 450000;
        }

        if (in_array($jenis, ['Poomsae', 'Poomsae Freestyle'])) {
            return match (strtolower($kelas)) {
                'individu' => 450000,
                'pair'     => 550000,
                'beregu'   => 650000,
                default    => 0,
            };
        }

        return 0;
    }

    /**
     * Menandai atlet sebagai sudah membayar (hanya admin).
     */
    public function markPaid(Athlete $athlete)
    {
        $athlete->sudah_bayar = true;

        if (!$athlete->jumlah_pembayaran || $athlete->jumlah_pembayaran == 0) {
            $athlete->jumlah_pembayaran = $this->hitungBiayaPendaftaran(
                $athlete->jenis_pertandingan,
                $athlete->tingkat_pertandingan,
                $athlete->kelompok_umur,
                $athlete->kelas_pertandingan
            );
        }

        $athlete->save();

        return redirect()->back()->with('success', 'Atlit berhasil ditandai sebagai sudah bayar.');
    }
}
