<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = [
           [
               'name' => 'Автор не известен',
               'email' => 'unknown@vlaravel.loc',
               'password' => bcrypt(Str::random(16)),

           ],
           [
               'name' => 'Автор',
               'email' => 'author@vlaravel.loc',
               'password' => bcrypt(123123),

           ]
       ];
       DB::table('users')->insert($data);
    }
}
