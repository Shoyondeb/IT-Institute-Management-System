<?php
// database/seeders/CategoriesTableSeeder.php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Programming & Development' => [
                'Python Programming',
                'Java Programming',
                'C & C++ Programming',
                'Web Development (HTML, CSS, JavaScript)',
                'MERN Stack Development'
            ],
            'Data & AI' => [
                'Data Science',
                'Machine Learning',
                'Deep Learning',
                'Artificial Intelligence',
                'Computer Vision'
            ],
            'Networking & Security' => [
                'Computer Networking',
                'Cyber Security',
                'Ethical Hacking',
                'Network Security'
            ],
            'Software & Systems' => [
                'Software Engineering',
                'Software Testing & QA',
                'Database Management System (DBMS)',
                'Operating Systems'
            ],
            'Cloud Computing' => [
                'Cloud Computing'
            ]
        ];

        foreach ($categories as $parentName => $subcategories) {
            $parent = Category::create(['name' => $parentName]);

            foreach ($subcategories as $subcategory) {
                Category::create([
                    'name' => $subcategory,
                    'parent_id' => $parent->id
                ]);
            }
        }
    }
}
