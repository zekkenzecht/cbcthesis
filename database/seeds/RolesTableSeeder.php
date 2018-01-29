<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
        	[
        	 'name' => 'super-admin',
        	 'guard_name' => 'web',
		    ]

        ]);
         DB::table('roles')->insert([
        	[
        	 'name' => 'communications',
        	 'guard_name' => 'web',
		    ]

        ]);
          DB::table('roles')->insert([
        	[
        	 'name' => 'pastor-secretaries',
        	 'guard_name' => 'web',
		    ]

        ]);
           DB::table('roles')->insert([
        	[
        	 'name' => 'ministry-head-and-secretaries',
        	 'guard_name' => 'web',
		    ]

        ]);
            DB::table('roles')->insert([
        	[
        	 'name' => 'members',
        	 'guard_name' => 'web',
		    ]

        ]);
    }
}
