<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\Curriculum;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{



    private function create_user_with_role($type, $name, $email){
        $role = Role::create([
            'name' =>$type
        ]);
        $user = User::create([
        'name' => $name,
        'email' => $email,
        'password' => bcrypt('password') ,
        ]);

        if($type == 'Super Admin'){

        $role->givePermissionTo(Permission::all());
        }
        elseif($type == 'Leads'){
            $role->givePermissionTo('lead-management');
        }

        $user->assignRole($role);

        return $user;
    }











    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $defaultPermissions =['lead-management', 'create-admin', 'user-management'];
        foreach($defaultPermissions as $permission){
            Permission::create(['name'=>$permission]);
        }


    $this->create_user_with_role(type: 'Super Admin' , name: 'Super Admin' , email: 'super-admin@lms.com');
    $this->create_user_with_role(type: 'Communication' , name: 'Communication Team' , email: 'Communication@lms.com');
    $teacher = $this->create_user_with_role(type: 'Teacher' , name: 'Teacher' , email: 'teacher@lms.com');
    $this->create_user_with_role(type: 'Leads' , name: 'Leads' , email: 'leads@lms.com');









// // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $user = User::create([
        // 'name' => 'Super Admin',
        // 'email' => 'super@admin.com',
        // 'password' => bcrypt('password') ,
        // ]);




        // $role = Role::create([
        //     'name' => 'Super Admin',
        // ]);





        // $user = User::create([
        //     'name' => 'Communication Role',
        //     'email' => 'Communication@lms.com',
        //     'password' => bcrypt('password') ,
        //     ]);


        // $communicationRole = Role::create([
        //     'name' => 'Communication',
        // ]);
        // $user->assignRole($communicationRole);

        // $permission = Permission::create([
        //     'name' => 'create-admin'
        // ]);

        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        // $user->assignRole($role);








        //create lead

        Lead::factory()->count(100)->create();


        // //create course

        // $course = Course::create([
        //     'name' => 'Laravel',
        //     'description' => 'Laravel is a web application framework with expressive, elegant syntax. A web framework provides a structure and starting point for creating your application, allowing you to focus on creating something amazing while we sweat the details.',
        //     'image' => 'https://laravel.com/img/logomark.min.svg',
        //     'user_id' => $teacher->id,
        //     'price' => 500,
        // ]);
        $course = Course::create([
            'name' => 'Laravel',
            'slug' => 'laravel',
            'description' => 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.',
            'image' => 'https://laravel.com/img/logomark.min.svg',
            'user_id' => $teacher->id,
            'price' => 500
        ]);


        //Curriculum::factory()->count(10)->create();


    }


}
