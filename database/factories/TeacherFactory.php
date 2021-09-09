<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teacher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'roll_no' =>$this->faker->postcode(),
            'teacher_firstname' => $this->faker->firstName(),
            'teacher_middlename' => $this->faker->lastName(),
            'teacher_lastname' => $this->faker->lastName(),
            'teacher_gender' => $this->faker->randomElement($array = array('Male', 'Female')),
            'username' => $this->faker->userName(),
            'password' => Hash::make('bnhs'),
        ];
    }
}

//tigrecord mo adi?
// haha uda akong screen recorder dae ko na installan pa
//tawan kitang bandicam protable wait 
//ma lags pag nag trasnfer ning file ahah
//  natural naman yan 

