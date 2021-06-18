<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstName' =>  $this->faker->name(),
            'lastName' => $this->faker->name(),
            'email' =>  $this->faker->safeEmail(),
            'company_id' => 1
        ];
    }
}
