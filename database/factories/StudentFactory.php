<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Define lists of barangays, municipalities, and provinces in the Philippines
        $barangays = [
            'Barangay Poblacion', 'Barangay San Isidro', 'Barangay Bagong Silang', 'Barangay Mabuhay', 'Barangay San Roque'
        ];

        $municipalities = [
            'San Francisco', 'Surigao City', 'Butuan City', 'Davao City', 'Cebu City', 'General Santos City'
        ];

        $provinces = [
            'Surigao del Norte', 'Agusan del Norte', 'Davao del Sur', 'Cebu', 'Misamis Oriental', 'Zamboanga del Sur'
        ];

        return [
            'firstname'    => $this->faker->firstName,
            'middlename'   => $this->faker->firstName,
            'lastname'     => $this->faker->lastName,
            'extension'    => $this->faker->optional()->suffix,  // Optional field
            'purok'        => $this->faker->numberBetween(1, 10),  // Random purok number between 1 and 10
            'brgy'         => $this->faker->randomElement($barangays),  // Random barangay from the list
            'municipality' => $this->faker->randomElement($municipalities),  // Random municipality from the list
            'province'     => $this->faker->randomElement($provinces),  // Random province from the list
        ];
    }
}
