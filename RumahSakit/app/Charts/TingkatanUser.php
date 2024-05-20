<?php

namespace App\Charts;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TingkatanUser
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $user = User::groupBy('tingkatan_user')->select(DB::raw('count(*) as total_users'), 'tingkatan_user')->get();

        $data = [];
        $label = [];

        foreach ($user as $item) {
        $data[] = $item->total_users;
        $label[] = $item->tingkatan_user;
        }

        // Membuat objek grafik dan mengatur propertinya
        return $this->chart->pieChart()
            ->setTitle('Jumlah Pengguna')
            ->setSubtitle('Berdasarkan Tingkatan User')
            ->addData($data)
            ->setLabels($label);
    }

}
