<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Notebook;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotebooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Notebook::factory()->count(2)->create();
    }

}
