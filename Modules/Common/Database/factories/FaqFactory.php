<?php

namespace Modules\Common\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Modules\Common\Models\Category;
use Modules\Common\Models\Faq;

class FaqFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Common\Models\Faq::class;

    protected function withFaker()
    {
        return \Faker\Factory::create('en');
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = Category::where('group', 'faqs')->get('id')->pluck('id')->toArray();
        $category = $categories[array_rand($categories)];
        $question = $this->faker->words(rand(4, 8), true);
        $answer = $this->faker->paragraphs(rand(10, 30), true);
        $sort_order = $this->faker->numberBetween(1, 10);
        $createdAt = $this->faker->dateTimeBetween('-1 years', 'now', 'Asia/Jakarta');

        return [
            'id' => Faq::generateId(),
            'category_id' => $category,
            'question' => $question,
            'slug' => slug($question),
            'answer' => $answer,
            'sort_order' => $sort_order,
            'is_featured' => rand(0, 1),
            'is_active' => rand(0, 1),
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
