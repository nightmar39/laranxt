<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\models\Resume;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('resumes')->insert([
            'name' => 'Anthony Rozario',
            'email' => 'Anthonyzilla94@gmail.com',
            'about' => 'Just an engineer with my head in the cloud',
            'id' => 1

        ]);

        DB::table('skills')->insert([
            'name' => 'Docker',
            'resumes_id' => 1 ,
        ]);

        DB::table('skills')->insert([
            'name' => 'Kubernetes',
            'resumes_id' => 1 ,
        ]);
        
        DB::table('skills')->insert([
            'name' => 'AWS',
            'resumes_id' => 1 ,
        ]);

        DB::table('experience')->insert([
            'company_name' => 'NFT.com',
            'job_title' => 'Site Reliability Engineer',
            'start_date' => '2023-03-01',
            'end_date' => '2023-05-01',
            'description' => 'make site reliable',
            'resumes_id' => 1 ,
        ]);

    }
}

