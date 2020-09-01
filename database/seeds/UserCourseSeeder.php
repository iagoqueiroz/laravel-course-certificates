<?php

use App\Course;
use App\User;
use Illuminate\Database\Seeder;

class UserCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = collect(['Started', 'In Progress', 'Finished']);

        $user = factory(User::class)->create([
            'name'     => 'Alamo Test',
            'email'    => 'alamo@test.com',
            'password' => bcrypt('secret'),
        ]);

        $courses = [
            'Laravel Course', 'MySQL Course', 'ReactJS Course',
            'Node.js Course', 'PHP 7 Course', 'VueJS Course',
            'OOP Course', 'Docker Course', 'Bootstrap Course'
        ];

        foreach($courses as $course) {
            $createdCourse = factory(Course::class)->create([
                'name' => $course
            ]);

            $createdCourse->users()->attach($user, ['progress' => $status->random()]);
        }
    }
}
