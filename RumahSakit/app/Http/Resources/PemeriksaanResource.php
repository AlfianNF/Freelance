<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PemeriksaanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'id_user' => $this->id_user,
            'no_rm' => $this->no_rm,
            'tgl_pemeriksaan' => $this->tgl_pemeriksaan,
            'status_pemeriksaan' => $this->status_pemeriksaan,
            'keluhan_pasien' => $this->keluhan_pasien,
            'pemeriksaan_fisik' => $this->pemeriksaan_fisik,
            'catatan_dokter' => $this->catatan_dokter,
            'riwayat_penyakit' => $this->riwayat_penyakit,
            'alergi_obat' => $this->alergi_obat,
        ];
    }
}
