<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $curso = new User();
        $curso->name = 'hernandezs';
        $curso->email = 'sandrohernandez414@gmail.com';
        $curso->email_verified_at('2021-07-11 18:56:47');
        $curso->password = 'eyJpdiI6IlpDalllM0lLaTBTWk1rNzAzN012dVE9PSIsInZhbHVlIjoiWGVmZXFrYnMzTUgxYWdhQXVQNGFGdz09IiwibWFjIjoiOGY2MTFlYzIwYzQ4OThhMzVmYTA4M2E2Y2NkMTg4ZTBiZmY2MWQ0MzMyMjIwMGY1YjBjMmQyMTlhZTRlOWM0MCJ9';
        $curso->save();              
    }
}
