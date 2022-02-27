<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TweetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'body' => $this->faker->sentence()
        ];
    }

    /**
     * Set the tweets title
     * @param $title
     * @return Factory
     */
    public function title($title): Factory
    {
        return $this->state(function (array $attributes) use ($title) {
            return [
                'title' => $title,
            ];
        });
    }

    /**
     * Set the tweets body
     * @param $body
     * @return Factory
     */
    public function body($body): Factory
    {
        return $this->state(function (array $attributes) use ($body) {
            return [
                'body' => $body,
            ];
        });
    }

}
