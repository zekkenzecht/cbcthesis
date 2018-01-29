<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
        	[
        	 'name' => 'Kenneth Jay Julianda',
        	 'avatar' => 'dist/users/defaultavatar.png',
        	 'email' => 'juliandakennethjay14@gmail.com',
        	 'address' => 'Blk 35 Lot 9 Brgy.Pinagsama E.P Housing Phase 1 Taguig City',
        	 'contact' => '09195608546',
        	 'gender' => 'Male',
        	 'birthdate' => '1997-05-02',
        	 'password' => bcrypt('kennethjulianda'),
		    ]

        ]);
           DB::table('model_has_roles')->insert([
        	[
        	 'role_id' => '1',
        	 'model_id' => '1',
        	 'model_type' => 'App\User',
		    ]

        ]);
    }
}
