<?php

use Illuminate\Database\Seeder;

class PostsOpenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts__opens')->insert(array(
            array(
              'posts'=>'Web Designer'
            ),
            array(
                'posts' => 'Web and Application Developer - PHP Laravel'
            ),
            array(
                'posts' => 'WordPress Developer'
            ),
            array(
                'posts' => 'Social Media Manager/Analyst'
            ),
            array(
                'posts' => 'Graphic Designer'
            ),
            array(
                'posts' => 'Management Intern'
            )
            ));

    }
}
