<?php

use Illuminate\Database\Seeder;

class AssimilationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('assimilation')->insert([
        	[
        	 'name' => 'Dynamic Worship Class',
        	 'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);

          DB::table('assimilation')->insert([
        	[
        	 'name' => 'Assimilation and Connection',
        	  'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);

          DB::table('assimilation')->insert([
        	[
        	 'name' => 'Immediate Follow up',
        	  'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);

          DB::table('assimilation')->insert([
        	[
        	 'name' => 'Probation Period',
        	  'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);

           DB::table('assimilation')->insert([
        	[
        	 'name' => 'Quad/Growth/Discipleship',
        	 'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);

            DB::table('assimilation')->insert([
        	[
        	 'name' => 'Membership/Baptism Class',
        	 'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);

        	DB::table('assimilation')->insert([
        	[
        	 'name' => 'Elders Interview',
        	  'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);

        	DB::table('assimilation')->insert([
        	[
        	 'name' => 'Baptism Rites',
        	 'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);


        	DB::table('assimilation')->insert([
        	[
        	 'name' => 'Presentation to Congregation',
        	 'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);

        	DB::table('assimilation')->insert([
        	[
        	 'name' => 'Ministry Class',
        	  'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);

        	DB::table('assimilation')->insert([
        	[
        	 'name' => 'Co-Minister',
        	  'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);
    }
}
