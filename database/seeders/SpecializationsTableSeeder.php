<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Specialization;

class SpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->delete();
        $specializations = [
            ['en'=> 'Arabic', 'ar'=> 'عربي'],
            ['en'=> 'Sciences', 'ar'=> 'علوم'],
            ['en'=> 'Computer', 'ar'=> 'حاسب الي'],
            ['en'=> 'Quran', 'ar'=> 'قران '],
            ['en'=> 'Islamic Science', 'ar'=> 'إسلامية'],
            ['en'=> 'Math', 'ar'=> 'رياضيات'],
            ['en'=> 'Chemistry', 'ar'=> 'كيمياء'],
            ['en'=> 'physics', 'ar'=> 'فيزياء'],
            ['en'=> 'Biology', 'ar'=> 'احياء'],
            ['en'=> 'History', 'ar'=> 'تاريخ'],
            ['en'=> 'Patriotism', 'ar'=> 'وطنية'],
            ['en'=> 'Geography', 'ar'=> 'جغرافيا'],
        ];
        foreach ($specializations as $S) {
            Specialization::create(['Name' => $S]);
        }
    }
}
