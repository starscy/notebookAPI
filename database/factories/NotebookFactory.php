<?php
declare(strict_types=1);

namespace Database\Factories;

use App\Models\Notebook;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotebookFactory extends Factory
{
    protected $model = Notebook::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->name(),
            'company' => $this->faker->company(),
            'phone' => $this->faker->unique()->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'birthday' => $this->faker->date('Y-m-d H:i:s', 'y-m-d-h-i-s'),
            'photo' => $this->faker->url(),
        ];
    }
}
