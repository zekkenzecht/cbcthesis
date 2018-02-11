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
        	 'created_at' => 'Now()',
        	 'updated_at' => 'Now()',
		    ]

        	]);

          DB::table('assimilation')->insert([
        	[
        	 'name' => 'Assimilation and Connection',
        	 'created_at' => 'Now()',
        	 'updated_at' => 'Now()',
		    ]

        	]);

          DB::table('assimilation')->insert([
        	[
        	 'name' => 'Immediate Follow up',
        	 'created_at' => 'Now()',
        	 'updated_at' => 'Now()',
		    ]

        	]);

          DB::table('assimilation')->insert([
        	[
        	 'name' => 'Probation Period',
        	 'created_at' => 'Now()',
        	 'updated_at' => 'Now()',
		    ]

        	]);

           DB::table('assimilation')->insert([
        	[
        	 'name' => 'Quad/Growth/Discipleship',
        	 'created_at' => 'Now()',
        	 'updated_at' => 'Now()',
		    ]

        	]);

            DB::table('assimilation')->insert([
        	[
        	 'name' => 'Membership/Baptism Class',
        	 'created_at' => 'Now()',
        	 'updated_at' => 'Now()',
		    ]

        	]);

        	DB::table('assimilation')->insert([
        	[
        	 'name' => 'Elders Interview',
        	 'created_at' => 'Now()',
        	 'updated_at' => 'Now()',
		    ]

        	]);

        	DB::table('assimilation')->insert([
        	[
        	 'name' => 'Baptism Rites',
        	 'created_at' => 'Now()',
        	 'updated_at' => 'Now()',
		    ]

        	]);


        	DB::table('assimilation')->insert([
        	[
        	 'name' => 'Presentation to Congregation',
        	 'created_at' => 'Now()',
        	 'updated_at' => 'Now()',
		    ]

        	]);

        	DB::table('assimilation')->insert([
        	[
        	 'name' => 'Ministry Class',
        	 'created_at' => 'Now()',
        	 'updated_at' => 'Now()',
		    ]

        	]);

        	DB::table('assimilation')->insert([
        	[
        	 'name' => 'Co-Minister',
        	 'created_at' => 'Now()',
        	 'updated_at' => 'Now()',
		    ]

        	]);
    }
}
