<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_user = Role::where('name', 'User')->first();
      $role_author = Role::where('name', 'Author')->first();
      $role_admin = Role::where('name', 'Admin')->first();

      $user = new User();
      $user->name = 'Victor';
      $user->email = 'visitor@example.com';
      $user->password = bcrypt('visitor');
      $user->verified = ('1');
      $user->save();
      $user->roles()->attach($role_user);

      $admin = new User();
      $admin->name = 'Alex';
      $admin->email = 'admin@example.com';
      $admin->password = bcrypt('admin');
      $admin->verified = ('1');
      $admin->save();
      $admin->roles()->attach($role_admin);

      $author = new User();
      $author->name = 'Andy';
      $author->email = 'author@example.com';
      $author->password = bcrypt('author');
      $author->verified = ('1');
      $author->save();
      $author->roles()->attach($role_author);

    }
}
