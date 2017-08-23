<?php

use Illuminate\Database\Seeder;

class CitySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = array(
            array("name" => "Kathmandu"),
            array("name" => "Lalitpur"),
            array("name" => "Bhaktapur"),
            array("name" => "Pokhara"),
            array("name" => "Baglung"),
            array("name" => "Bandipur"),
            array("name" => "Banke"),
            array("name" => "Banepa"),
            array("name" => "Bara"),
            array("name" => "Biratnagar"),
            array("name" => "Birgunj"),
            array("name" => "Bhadrapur"),
            array("name" => "Bhairahawa"),
            array("name" => "Butwal"),
            array("name" => "Chitwan"),
            array("name" => "Dadeldhura"),
            array("name" => "Damak"),
            array("name" => "Damauli"),
            array("name" => "Dang"),
            array("name" => "Darchula"),
            array("name" => "Dhading"),
            array("name" => "Dhangadi"),
            array("name" => "Dhankuta"),
            array("name" => "Dharan"),
            array("name" => "Gaur"),
            array("name" => "Gorkha"),
            array("name" => "Gulmi"),
            array("name" => "Hetauda"),
            array("name" => "Ilam"),
            array("name" => "Inaruwa"),
            array("name" => "Itahari"),
            array("name" => "Jaleshwar"),
            array("name" => "Janakpur"),
            array("name" => "Kanchanpur"),
            array("name" => "Kapilvastu"),
            array("name" => "Kirtipur"),
            array("name" => "Mahendranagar"),
            array("name" => "Myagdi"),
            array("name" => "Nawalparasi"),
            array("name" => "Nepalgunj"),
            array("name" => "Nuwakot"),
            array("name" => "Rajbiraj"),
            array("name" => "Rupandehi"),
            array("name" => "Siraha"),
            array("name" => "Surkhet"),
            array("name" => "Syangja"),
            array("name" => "Tansen"),
            array("name" => "Triyuga"),
        );
        foreach ($cities as $list) {
            $parent = \App\City::create([
                'name' => $list['name'],
            ]);
        }
    }
}
