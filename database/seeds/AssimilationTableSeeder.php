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
          DB::table('assimilations')->insert([
        	[
        	 'name' => 'Dynamic Worship Class',
        	 'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
		      ]

        	]);

           DB::table('assimilations')->insert([
          [
           'name' => 'Sunday Counselling',
           'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
          ]

          ]);

            DB::table('assimilations')->insert([
          [
           'name' => 'Immediate follow up and visitation',
           'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
          ]

          ]);


            DB::table('assimilations')->insert([
          [
           'name' => 'EBS/Evangelistic class',
           'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
          ]

          ]);

            DB::table('assimilations')->insert([
          [
           'name' => 'Full 8 Weeks Sunday Service Attendance',
           'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
          ]

          ]);

            DB::table('assimilations')->insert([
          [
           'name' => 'Presentation as Harvest',
           'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
          ]

          ]);

            DB::table('assimilations')->insert([
          [
           'name' => 'Incorporate to care group',
           'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
          ]

          ]);

            DB::table('assimilations')->insert([
          [
           'name' => 'New Believers Class',
           'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
          ]

          ]);

            DB::table('assimilations')->insert([
          [
           'name' => 'Baptism/Membership Class',
           'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
          ]

          ]);

            DB::table('assimilations')->insert([
          [
           'name' => 'Baptism/Membership Interview',
           'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
          ]

          ]);


            DB::table('assimilations')->insert([
          [
           'name' => 'Baptism Rites',
           'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
          ]

          ]);

            DB::table('assimilations')->insert([
          [
           'name' => 'Presentation to congregation',
           'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
          ]

          ]);

            DB::table('assimilations')->insert([
          [
           'name' => 'Growth Class',
           'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
          ]

          ]);

            DB::table('assimilations')->insert([
          [
           'name' => 'Doctrine of grace class',
           'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
          ]

          ]);

            DB::table('assimilations')->insert([
          [
           'name' => 'Co-Minister',
           'created_at' =>  date('Y/m/d h:s'),
           'updated_at' =>  date('Y/m/d h:s'),
          ]

          ]);



        
    }
}
