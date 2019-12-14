<?php

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\EmployeeDepartment::class,4)->create();
        factory(App\EmployeeType::class,4)->create();
        factory(App\Employee::class,10)->create();
        factory(App\EmployeeSchedule::class,4)->create();
    }
}
