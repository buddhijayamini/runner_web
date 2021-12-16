<?php

namespace Database\Seeders;

use App\Models\TbmFormData;
use App\Models\TbmRunner;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TbmFormDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       // $runner = TbmRunner::get();

        // // Create entries for each runners.
        // foreach ($runner as $user) {
        //     $forms = array();
          // $timestamp = Carbon::now();
        //     for ($d = 0; $d <= 5; $d++) {
        //         $forms[] = array(
        //             'age' => 20,
        //             'sex' => 'Female',
        //             'color' => 'Purple',
        //             'created_at' => $timestamp->format('Y-m-d H:i:s'),
        //             'updated_at' => $timestamp->format('Y-m-d H:i:s'),
        //             'runner_id' => $user->id,
        //         );
        //         $timestamp = $timestamp->subDay();
        //     }

        //     // Bulk insert generated form data for each runner.
        //    // DB::table('tbm_form_data')->insert($forms);
        //     TbmFormData::create($forms);


    //     $faker = Faker::create();
    //   //  $runner = TbmRunner::all()->lists('id');
    //   $runner =  DB::table('tbm_runners')
    //   ->orderBy('id', 'asc')
    //   ->get('id');

    //     $timestamp = Carbon::now();
    //     $data1 = array(
    //         array('age' => 20, 'sex' => 'Female','color' => 'Red'),
    //         array('age' => 23, 'sex' => 'Male','color' => 'Green'),
    //         array('age' => 25, 'sex' => 'Female','color' => 'Blue'),
    //         array('age' => 26, 'sex' => 'Male','color' => 'Black'),
    //      );

    //     foreach($data1 as $data) {
    //          TbmFormData::create([
    //             'age' => $data['age'],
    //             'sex' => $data['sex'],
    //             'color' => $data['color'],
    //             'created_at' => $timestamp->format('Y-m-d H:i:s'),
    //             'updated_at' => $timestamp->format('Y-m-d H:i:s'),
    //             'runner_id' => $faker->randomElement(1),
    //         ]);
    //     }


           TbmFormData::truncate();
           $timestamp = Carbon::now();
           
            $forms =  [
                [
                    'age' => 20,
                    'sex' => 'Female',
                    'color' => 'Purple',
                    'created_at' => $timestamp->format('Y-m-d H:i:s'),
                    'updated_at' => $timestamp->format('Y-m-d H:i:s'),
                    'runner_id' => 1,
                ],
                [
                    'age' => 25,
                    'sex' => 'male',
                    'color' => 'Black',
                    'created_at' => $timestamp->format('Y-m-d H:i:s'),
                    'updated_at' => $timestamp->format('Y-m-d H:i:s'),
                    'runner_id' => 1,
                ],
                [
                    'age' => 23,
                    'sex' => 'Female',
                    'color' => 'Red',
                    'created_at' => $timestamp->format('Y-m-d H:i:s'),
                    'updated_at' => $timestamp->format('Y-m-d H:i:s'),
                    'runner_id' => 2,
                ]
                ];
                DB::table('tbm_form_data')->insert($forms);
               // TbmFormData::create($forms);
                 $this->command->info('Form Data table seeded.');

        }


    }

