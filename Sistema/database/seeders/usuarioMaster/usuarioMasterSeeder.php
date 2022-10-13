<?php

namespace Database\Seeders\usuarioMaster;

use App\Models\User;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class usuarioMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        try
        {
            $usuario = User::create([
                'User' => 'MrKoBP',
                'email' => 'pazbryan32@gmail.com',
                'password' => Hash::make('123456789'),
                'Roles_Id' => 1,
                'Estado' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            DB::commit();

        }catch(Exception $e)
        {
            DB::rollBack();
            $this->command->warn($e->getMessage());
        }

    }
}
