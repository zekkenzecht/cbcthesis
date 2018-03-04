<?php

use Illuminate\Database\Seeder;

class ContentDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('content')->insert([
        	[
        	 'name' => 'Slider 1',
        	 'type' => 'homeslider',
        	 'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
		      ]

        	]);
          DB::table('content')->insert([
        	[
        	 'name' => 'Slider 2',
        	 'type' => 'homeslider',
        	 'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
		      ]

        	]);
           DB::table('content')->insert([
        	[
        	 'name' => 'Slider 3',
        	 'type' => 'homeslider',
        	 'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
		      ]

        	]);
            DB::table('content')->insert([
        	[
        	 'name' => 'Slider 4',
        	 'type' => 'homeslider',
        	 'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
		      ]

        	]);
    }
}
