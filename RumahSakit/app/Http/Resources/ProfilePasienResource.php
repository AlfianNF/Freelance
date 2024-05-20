<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\PemeriksaanResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfilePasienResource extends JsonResource
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
            'nik' => $this->nik,
            'name' => $this->name,
            'username' => $this->username,
            'jenis_kelamin' => $this->jenis_kelamin,
            'tgl_lahir' => $this->tgl_lahir,
            'no_hp' => $this->no_hp,
            'alamat' => $this->alamat,
            'riwayat_penyakit' => $this->whenLoaded('pemeriksaans', function () {
                return $this->pemeriksaans->map->riwayat_penyakit;
            }),
            'alergi_obat' => $this->whenLoaded('pemeriksaans', function () {
                return $this->pemeriksaans->map->alergi_obat;
            })
        ];
    }
}
