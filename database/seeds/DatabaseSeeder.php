<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('ministries')->insert([
        	[
        	 'ministry' => 'CTSA',
        	 'created_at' =>  date('Y/m/d h:s'),
           		'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);

          DB::table('ministries')->insert([
        	[
        	 'ministry' => 'MISSIONS',
        	 'created_at' =>  date('Y/m/d h:s'),
           		'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);


          DB::table('ministries')->insert([
        	[
        	 'ministry' => 'COMMUNICATION MEDIA DEPARTMENT',
        	 'created_at' =>  date('Y/m/d h:s'),
           		'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);


          DB::table('ministries')->insert([
        	[
        	 'ministry' => 'CBC INTEGRATED SCHOOL',
        	 'created_at' =>  date('Y/m/d h:s'),
           		'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);


          DB::table('ministries')->insert([
        	[
        	 'ministry' => 'CHILDREN MINISTRY',
        	 'created_at' =>  date('Y/m/d h:s'),
           		'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);

            DB::table('ministries')->insert([
        	[
        	 'ministry' => 'MUSIC MINISTRY',
        	 'created_at' =>  date('Y/m/d h:s'),
           		'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);

        	  DB::table('ministries')->insert([
        	[
        	 'ministry' => 'USHERING MINISTRY',
        	 'created_at' =>  date('Y/m/d h:s'),
           		'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);



        	    DB::table('ministries')->insert([
        	[
        	 'ministry' => 'SINGLES PROFESSIONAL MINISTRY',
        	 'created_at' =>  date('Y/m/d h:s'),
           		'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);




        	    DB::table('ministries')->insert([
        	[
        	 'ministry' => 'SPORTS AND RECREATION MINISTRY',
        	 'created_at' =>  date('Y/m/d h:s'),
           		'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);

        	    DB::table('ministries')->insert([
        	[
        	 'ministry' => 'GOLDEN FOLKS MINISTRY',
        	 'created_at' =>  date('Y/m/d h:s'),
           		'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);




        	    DB::table('ministries')->insert([
        	[
        	 'ministry' => 'QUAD MINISTRY',
        	 'created_at' =>  date('Y/m/d h:s'),
           		'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);



        	    DB::table('ministries')->insert([
        	[
        	 'ministry' => 'PASTORAL CARE',
        	 'created_at' =>  date('Y/m/d h:s'),
           		'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);

        	    DB::table('ministries')->insert([
        	[
        	 'ministry' => 'ASSIMILATION',
        	 'created_at' =>  date('Y/m/d h:s'),
           		'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);

        	     DB::table('ministries')->insert([
        	[
        	 'ministry' => 'PRAYER MINISTRY',
        	 'created_at' =>  date('Y/m/d h:s'),
           		'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);

        	  DB::table('ministries')->insert([
        	[
        	 'ministry' => 'YOUTH MINISTRY',
        	 'created_at' =>  date('Y/m/d h:s'),
           		'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);

        	   DB::table('ministries')->insert([
        	[
        	 'ministry' => 'EVANGELISTIC BIBLE STUDIES',
        	 'created_at' =>  date('Y/m/d h:s'),
           		'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);

        	   DB::table('ministries')->insert([
        	[
        	 'ministry' => 'EVANGELISTIC MINISTRY',
        	 'created_at' =>  date('Y/m/d h:s'),
           		'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);


        	   DB::table('ministries')->insert([
        	[
        	 'ministry' => 'MEMBERSHIP MINISTRY',
        	 'created_at' =>  date('Y/m/d h:s'),
           		'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);

        	  DB::table('ministries')->insert([
        	[
        	 'ministry' => 'DISCIPLESHIP CLASSES',
        	 'created_at' =>  date('Y/m/d h:s'),
           		'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);

        	  DB::table('ministries')->insert([
        	[
        	 'ministry' => 'FACILITY MANAGEMENT',
        	 'created_at' =>  date('Y/m/d h:s'),
           		'updated_at' =>  date('Y/m/d h:s'),
		    ]

        	]);


    }
}
