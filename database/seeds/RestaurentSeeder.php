<?php

use App\Restaurent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Restaurent::create([

                'name' => 'Chung cu an loc',
                'address' => 'Đường số 7, Phường 17, Gò Vấp, Thành phố Hồ Chí Minh, Việt Nam',
                'city' => 'HoChiMinh city',
                'hours'  => '24/24',
                'latitude' => 10.847104672344182,
                'longitude' => 106.67669896914082

        ]);

        Restaurent::create(
            [
                'name' => 'Coop food',
                'address' => '109 Đường Số 5, Phường 17, Gò Vấp, Thành phố Hồ Chí Minh, Việt Nam',
                'city' => 'HoChiMinh city',
                'hours'  => '6:00-21:00',
                'latitude' => 10.84659888908552,
                'longitude' => 106.67589430646582,
            ]

        );

        Restaurent::create(
            [
                'name' => 'Ngân Hàng TMCP Á Châu - ACB',
                'address' => '343 Nguyễn Oanh, Phường 6, Gò Vấp, Thành phố Hồ Chí Minh, Việt Nam',
                'city' => 'HoChiMinh city',
                'hours'  => '7:30-11:30',
                'latitude' => 10.843711693272226,
                'longitude' => 106.67701010537515
            ]
        );
    }
}
