<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RincianJenisPemeriksaanResource extends JsonResource
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
            'nama_jenis_pemeriksaan' => $this->nama_jenis_pemeriksaan,
            'resep_obat' => $this->whenLoaded('resep_obat', function () {
                return $this->resep_obat;
            }),
        ];
    }
}
