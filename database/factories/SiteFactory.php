<?php

namespace Database\Factories;

use App\Models\Site;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiteFactory extends Factory
{
    protected $model = Site::class;

    public function definition(): array
    {
        return [
            // 'name' => $this->faker->company,
            'url' => $this->faker->unique()->url,
        ];
    }
}
