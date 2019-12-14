<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\EmployeeDepartment;
use App\EmployeeType;
use App\Employee;

$factory->define(App\EmployeeType::class, function(Faker $faker){
        return [
            'employee_type_name' => $faker->name,
            'employee_type_id' => Str::random(15),
        ];
    });
    
$factory->define(App\EmployeeDepartment::class, function(Faker $faker){
    return [
        'department_name' => $faker->name,
        'department_id' => Str::random(15),
    ];
});

$factory->define(App\Employee::class, function(Faker $faker){
    $department = EmployeeDepartment::inRandomOrder()->first();
    $e_type = EmployeeType::inRandomOrder()->first();
    return [
        'name' => $faker->name,
        'employee_id' => Str::random(15),
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'dob' => $faker->date($format = 'm-d-y'),
        'employee_type_id' => $e_type->employee_type_id,
        'department_id' => $department->department_id,
    ];
});

$factory->define(App\EmployeeSchedule::class, function(Faker $faker){
    $employee = Employee::inRandomOrder()->first();
    return [
        'day' => $faker->dayOfWeek,
        'starting_time' => $faker->time,
        'ending_time' => $faker->time,
        'schedule_id' => Str::random(10),
        'employee_id' => $employee->employee_id,
    ];
});
