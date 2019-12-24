<?php

use Illuminate\Database\Seeder;

class ApplyProcessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('apply__processes')->insert(array(
            array(
              'apply_by' => 'Direct Application (Regular Process)',
            ),
            array(
                'apply_by' => 'Taking Internship Challenge'
            )
            ));
    }
}
