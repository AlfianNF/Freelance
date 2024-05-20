<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HasilPemeriksaanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = $this->pemeriksaan->user; // Eager load the User relation

        $tgl_lahir = Carbon::parse($user->tgl_lahir);
        $umur = $tgl_lahir->diffInYears(Carbon::now()); // Calculate age using Carbon

        return [
            'nik' => $user->nik,
            'nama' => $user->name,
            'tgl_lahir' => $user->tgl_lahir,
            'alamat' => $user->alamat,
            'umur' => $umur,
            'no_rm' => $this->pemeriksaan->no_rm,
            'nama_rincian_pemeriksaan' => $this->rincian_pemeriksaan->nama_jenis_pemeriksaan,
            'hasil_pemeriksaan' => $this->hasil_pemeriksaan,
            'satuan_pemeriksaan' => $this->satuan_pemeriksaan,
            'keluhan_pasien' => $this->keluhan_pasien,
            'nilai_rujukan' => $this->nilai_rujukan,
        ];
    }
}
