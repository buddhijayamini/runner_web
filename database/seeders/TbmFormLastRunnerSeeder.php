<?php

namespace Database\Seeders;

use App\Models\TbmFormLastRunner;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TbmFormLastRunnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TbmFormLastRunner::truncate();
        $timestamp = Carbon::now();

            $forms =  [
                [
                    'name' => 'ABC',
                    'created_at' => $timestamp->format('Y-m-d H:i:s'),
                    'updated_at' => $timestamp->format('Y-m-d H:i:s'),
                    'runner_id' => 1,
                ],
                [
                    'name' => 'DDD',
                    'created_at' => $timestamp->format('Y-m-d H:i:s'),
                    'updated_at' => $timestamp->format('Y-m-d H:i:s'),
                    'runner_id' => 1,
                ],
                [
                    'name' => 'CCC',
                    'created_at' => $timestamp->format('Y-m-d H:i:s'),
                    'updated_at' => $timestamp->format('Y-m-d H:i:s'),
                    'runner_id' => 2,
                ]
                ];
                DB::table('tbm_form_last_runners')->insert($forms);

                 $this->command->info('Form Last Runner table seeded.');


    }
}
