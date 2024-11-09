<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
             // User::factory(10)->create();

             User::factory()->create([
                'name' => 'mahasiswa',
                'email' => 'mahasiswa@unsur.ac.id',
            ])->assignRole('mahasiswa')->givePermissionTo('view_book');
            
            User::factory()->create([
                'name' => 'pusatakawan',
                'email' => 'pusatakawan@unsur.ac.id',
            ])->assignRole('pustakawan')->givePermissionTo('edit_book');
    }
}
