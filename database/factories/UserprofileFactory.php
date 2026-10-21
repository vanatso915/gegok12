<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Standard;
use App\Models\Userprofile;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserprofileFactory extends Factory
{
    protected $model = Userprofile::class;

    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        
        $avatar = $gender === 'male' ? 'uploads/male.png' : 'uploads/female.png';

        // Pair cities with their corresponding IDs properly
        $locations = [
            ['city' => 'Bangalore', 'city_id' => '12', 'state_id' => '12'],
            ['city' => 'Chennai', 'city_id' => '24', 'state_id' => '24'],
            ['city' => 'Hyderabad', 'city_id' => '25', 'state_id' => '25'],
            ['city' => 'Mumbai', 'city_id' => '15', 'state_id' => '15'],
            ['city' => 'Thiruvananthapuram', 'city_id' => '13', 'state_id' => '13'],
        ];
        
        $location = $this->faker->randomElement($locations);

        return [
            'firstname'           => $this->faker->firstName,
            'lastname'            => $this->faker->lastName,
            'alternate_no'        => $this->faker->unique()->numerify('#########'),
            'gender'              => $gender,
            'date_of_birth'       => $this->faker->dateTimeBetween('-18 years', '-5 years'),
            'blood_group'         => $this->faker->randomElement(['a+', 'b+', 'o+', 'ab+', 'a-', 'b-', 'o-', 'ab-']),
            'birth_place'         => $location['city'],
            'native_place'        => $location['city'],
            'mother_tongue'       => $this->faker->randomElement(['Tamil', 'Malayalam', 'Telugu', 'Kannada', 'Hindi']),
            'caste'               => $this->faker->randomElement(['BC', 'BCM', 'FC', 'MBC', 'OBC', 'Others', 'SC', 'SCA', 'ST']),
            'address'             => $this->faker->address,
            'city_id'             => $location['city_id'],
            'state_id'            => $location['state_id'],
            'country_id'          => 7,
            'pincode'             => $this->faker->unique()->numerify('######'),
            'registration_number' => $this->faker->unique()->numerify('######'),
            'EMIS_number'         => $this->faker->unique()->numerify('######'),
            'joining_date'        => $this->faker->dateTimeBetween('-4 years', '-2 years'),
            'avatar'              => $avatar,
        ];
    }
}
