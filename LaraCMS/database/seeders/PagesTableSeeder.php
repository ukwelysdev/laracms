<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::find(1);

        Page::truncate();

        $admin->pages()->saveMany([
            new Page([
                'title'=>'About',
                'url'=>'/About',
                'content'=>'About Us'
            ]),
            new Page([
                'title'=>'Contact',
                'url'=>'/contact',
                'content'=>'beautiful contacts'
            ]),
            new Page([
                'title'=>'Another Page',
                'url'=>'/another.page',
                'content'=>'thinking about another page'
            ])

        ]);
    }
}
