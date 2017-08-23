<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $user1 = \App\User::create(
            [
                'username' => 'hsameer001',
                'firstname'=> 'Sameer',
                'lastname'=> 'Humagain',
                'email' => 'im@hsameer.com.np',
                'password' => Hash::make('sameer57'),
                'active' => 1,
                'gravatar' => Gravatar::get('im@hsameer.com.np'),
            ]);
        $user1->assignRole(2);
        \App\Profile::create(

            [
                'user_id' => $user1->id,
                'phone' => '+977-9851070534',
                'street' => 'Nirmal Lama Marg',
                'area' => 'Mehpi',
                'city' => 1,
                'country' => 'Nepal',
                'show_phone' => 0,
                'show_email' => 1,
                'verified_phone' => 1,
            ]
        );

        $user2 = \App\User::create(
            [
                'username' => 'hsameer002',
                'firstname'=> 'Sameer',
                'lastname'=> 'Humagain',
                'email' => 'mail@hsameer.com.np',
                'password' => Hash::make('sameer57'),
                'active' => 1,
                'gravatar' => Gravatar::get('mail@hsameer.com.np'),
            ]
        );
        $user2->assignRole(3);
        \App\Profile::create(
            [
                'user_id' => $user2->id,
                'phone' => '+977-9851070747',
                'street' => 'Nirmal Lama Marg',
                'area' => 'Mehpi',
                'city' => 1,
                'country' => 'Nepal',
                'show_phone' => 1,
                'show_email' => 1,
                'verified_phone' => 1,
            ]
        );

        $user3 = \App\User::create(
            [
                'username' => 'lamputer',
                'firstname'=> 'Sameer',
                'lastname'=> 'Humagain',
                'email' => 'humagainsameer@gmail.com',
                'password' => Hash::make('sameer57'),
                'active' => 1,
                'gravatar' => Gravatar::get('humagainsameer@gmail.com'),
            ]
        );
        $user3->assignRole(1);
        \App\Profile::create(
            [
                'user_id' => $user3->id,
                'phone' => '+977-9851070747',
                'street' => 'Nirmal Lama Marg',
                'area' => 'Mehpi',
                'city' => 1,
                'country' => 'Nepal',
                'show_phone' => 1,
                'show_email' => 1,
                'verified_phone' => 1,
            ]
        );
    }
}
