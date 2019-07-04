<?php
use App\User;
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
        User::create([
        	'name' => 'Daengweb',
        	'email' => 'admin@daengweb.id',
        	'password' => bcrypt(12345),
        	'status' => true
        ]);
    }
}
