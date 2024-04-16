<?php

namespace App\Http\Controllers;

use App\Http\Resources\FinanceReportResource;
use App\Models\Persuratan;
use App\Models\Pengajuan;
use App\Models\Penduduk;
use App\Models\Status;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class DocumentRequestController extends Controller
{
    public function index(): Response{

        $data = $this->list();
        // Check if data is empty before decoding
        if (empty($data->getContent())) {
            $data = [];
        } else {
            $data = json_decode($data->getContent(), true);
        }

        $breadcrumb = [
            'list' => ['Home', 'Permohonan Surat'],
            'url' => ['home', 'persuratan.index'],
        ];
        return response()->view('pages.persuratan.index', [
            'breadcrumb' => $breadcrumb,
            'data' => $data['data'] ?? [], 
        ]);
    }

    public function list(): JsonResponse
    {
        try {
            $pengajuan = Pengajuan::all();
            $pengajuan->load(
                ['status','penduduk','acceptedBy']
            );
            $persuratan = Persuratan::all();
            // $persuratan = Persuratan::with('pengajuan')->find($id);
            // $pengajuan = Pengajuan::with('penduduk','status')->all();
            

            $data = Persuratan::all()->map(function ($persuratan) {
                return [
                    'persuratan_id' => $persuratan->persuratan_id,
                    'nik' => $persuratan->pengajuan->penduduk->nik,
                    'nama' => $persuratan->pengajuan->penduduk->nama,
                    'status' => $persuratan->pengajuan->status->nama,
                    'keperluan' => $persuratan->pengajuan->keperluan,
                    'accepted_at' => Carbon::parse($persuratan->pengajuan->accepted_at)->format('d-m-Y'),
                    'created_at' => Carbon::parse($persuratan->created_at)->format('d-m-Y'),
                    'updated_at' => Carbon::parse($persuratan->updated_at)->format('d-m-Y'),
                ];
            });
            
            return response()->json([
                'data' => $data,
            ]);
            
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Terjadi kesalahan.'], 500);
        }
    }

    public function show(String $id): Response|JsonResponse
    {
            
            $persuratan = Persuratan::with('pengajuan')->find($id);
            
            $breadcrumb = [
                'list' => ['Home', 'Permohonan Surat', 'Detail Permohonan Surat'],
                'url' => ['home', 'persuratan.index', ['persuratan.show', $id]],
            ];



            return response()->view('pages.persuratan.show', [
                'breadcrumb' => $breadcrumb,
                'persuratan' => $persuratan,    
            ]);

    }

}
