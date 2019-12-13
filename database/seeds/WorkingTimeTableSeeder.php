<?php

use Illuminate\Database\Seeder;

class WorkingTimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('working_time')->insert(array(
            array(
              'days' => 'Sunday',
              'opening_time' => '10:00 am',
              'closing_time' => '5:00 pm'
            ),
            array(
                'days' => 'Monday',
                'opening_time' => '10:00 am',
                'closing_time' => '5:00 pm'
            ),
            array(
                'days' => 'Tuesday',
                'opening_time' => '10:00 am',
                'closing_time' => '5:00 pm'
            ),
            array(
                'days' => 'Wednesday',
                'opening_time' => '10:00 am',
                'closing_time' => '5:00 pm'
            ),
            array(
                'days' => 'Thrusday',
                'opening_time' => '10:00 am',
                'closing_time' => '5:00 pm'
            ),
            array(
                'days' => 'Friday',
                'opening_time' => '10:00 am',
                'closing_time' => '5:00 pm'
            ),
          ));
    }
}
