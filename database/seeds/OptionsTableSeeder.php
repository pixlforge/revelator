<?php

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $programs = \App\Program::all();

        /**
         * Age
         */
        $optionAgeOne = factory(\App\Option::class)->create([
            'name' => 'Age 18 - 29',
            'pos' => 1,
            'question_id' => 1
        ]);
        $programs[0]->options()->save($optionAgeOne, ['value' => 0]);
        $programs[1]->options()->save($optionAgeOne, ['value' => 1]);
        $programs[2]->options()->save($optionAgeOne, ['value' => 1]);
        $programs[3]->options()->save($optionAgeOne, ['value' => 1]);
        $programs[4]->options()->save($optionAgeOne, ['value' => 1]);
        $programs[5]->options()->save($optionAgeOne, ['value' => 0]);
        $programs[6]->options()->save($optionAgeOne, ['value' => 1]);
        $programs[7]->options()->save($optionAgeOne, ['value' => 1]);
        $programs[8]->options()->save($optionAgeOne, ['value' => 1]);

        $optionAgeTwo = factory(\App\Option::class)->create([
            'name' => 'Age 30 - 50',
            'pos' => 2,
            'question_id' => 1
        ]);
        $programs[0]->options()->save($optionAgeTwo, ['value' => 3]);
        $programs[1]->options()->save($optionAgeTwo, ['value' => 1]);
        $programs[2]->options()->save($optionAgeTwo, ['value' => 1]);
        $programs[3]->options()->save($optionAgeTwo, ['value' => 1]);
        $programs[4]->options()->save($optionAgeTwo, ['value' => 1]);
        $programs[5]->options()->save($optionAgeTwo, ['value' => 0]);
        $programs[6]->options()->save($optionAgeTwo, ['value' => 1]);
        $programs[7]->options()->save($optionAgeTwo, ['value' => 1]);
        $programs[8]->options()->save($optionAgeTwo, ['value' => 1]);

        $optionAgeThree = factory(\App\Option::class)->create([
            'name' => 'Age 51 - 65',
            'pos' => 3,
            'question_id' => 1
        ]);
        $programs[0]->options()->save($optionAgeThree, ['value' => 3]);
        $programs[1]->options()->save($optionAgeThree, ['value' => 1]);
        $programs[2]->options()->save($optionAgeThree, ['value' => 1]);
        $programs[3]->options()->save($optionAgeThree, ['value' => 2]);
        $programs[4]->options()->save($optionAgeThree, ['value' => 1]);
        $programs[5]->options()->save($optionAgeThree, ['value' => 2]);
        $programs[6]->options()->save($optionAgeThree, ['value' => 1]);
        $programs[7]->options()->save($optionAgeThree, ['value' => 1]);
        $programs[8]->options()->save($optionAgeThree, ['value' => 1]);

        $optionAgeFour = factory(\App\Option::class)->create([
            'name' => 'Age 66+',
            'pos' => 4,
            'question_id' => 1
        ]);
        $programs[0]->options()->save($optionAgeFour, ['value' => 3]);
        $programs[1]->options()->save($optionAgeFour, ['value' => 0]);
        $programs[2]->options()->save($optionAgeFour, ['value' => 1]);
        $programs[3]->options()->save($optionAgeFour, ['value' => 2]);
        $programs[4]->options()->save($optionAgeFour, ['value' => 1]);
        $programs[5]->options()->save($optionAgeFour, ['value' => 3]);
        $programs[6]->options()->save($optionAgeFour, ['value' => 1]);
        $programs[7]->options()->save($optionAgeFour, ['value' => 1]);
        $programs[8]->options()->save($optionAgeFour, ['value' => 1]);

        /**
         * Gender
         */
        $optionGenderOne = factory(\App\Option::class)->create([
            'name' => 'Female',
            'pos' => 1,
            'question_id' => 2
        ]);
        $programs[0]->options()->save($optionGenderOne, ['value' => 1]);
        $programs[1]->options()->save($optionGenderOne, ['value' => 2]);
        $programs[2]->options()->save($optionGenderOne, ['value' => 1]);
        $programs[3]->options()->save($optionGenderOne, ['value' => 1]);
        $programs[4]->options()->save($optionGenderOne, ['value' => 2]);
        $programs[5]->options()->save($optionGenderOne, ['value' => 1]);
        $programs[6]->options()->save($optionGenderOne, ['value' => 2]);
        $programs[7]->options()->save($optionGenderOne, ['value' => 1]);
        $programs[8]->options()->save($optionGenderOne, ['value' => 0]);

        $optionGenderTwo = factory(\App\Option::class)->create([
            'name' => 'Male',
            'pos' => 2,
            'question_id' => 2
        ]);
        $programs[0]->options()->save($optionGenderTwo, ['value' => 1]);
        $programs[1]->options()->save($optionGenderTwo, ['value' => 1]);
        $programs[2]->options()->save($optionGenderTwo, ['value' => 1]);
        $programs[3]->options()->save($optionGenderTwo, ['value' => 1]);
        $programs[4]->options()->save($optionGenderTwo, ['value' => 1]);
        $programs[5]->options()->save($optionGenderTwo, ['value' => 1]);
        $programs[6]->options()->save($optionGenderTwo, ['value' => 1]);
        $programs[7]->options()->save($optionGenderTwo, ['value' => 1]);
        $programs[8]->options()->save($optionGenderTwo, ['value' => 0]);

        $optionGenderThree = factory(\App\Option::class)->create([
            'name' => 'Non disclosed',
            'pos' => 3,
            'question_id' => 2
        ]);
        $programs[0]->options()->save($optionGenderThree, ['value' => 1]);
        $programs[1]->options()->save($optionGenderThree, ['value' => 1]);
        $programs[2]->options()->save($optionGenderThree, ['value' => 1]);
        $programs[3]->options()->save($optionGenderThree, ['value' => 3]);
        $programs[4]->options()->save($optionGenderThree, ['value' => 1]);
        $programs[5]->options()->save($optionGenderThree, ['value' => 1]);
        $programs[6]->options()->save($optionGenderThree, ['value' => 1]);
        $programs[7]->options()->save($optionGenderThree, ['value' => 1]);
        $programs[8]->options()->save($optionGenderThree, ['value' => 0]);

        /**
         * Sleep
         */
        $optionSleepOne = factory(\App\Option::class)->create([
            'name' => 'I never have sleep issues',
            'pos' => 1,
            'question_id' => 4
        ]);
        $programs[0]->options()->save($optionSleepOne, ['value' => 0]);
        $programs[1]->options()->save($optionSleepOne, ['value' => 0]);
        $programs[2]->options()->save($optionSleepOne, ['value' => 0]);
        $programs[3]->options()->save($optionSleepOne, ['value' => 0]);
        $programs[4]->options()->save($optionSleepOne, ['value' => 0]);
        $programs[5]->options()->save($optionSleepOne, ['value' => 0]);
        $programs[6]->options()->save($optionSleepOne, ['value' => 0]);
        $programs[7]->options()->save($optionSleepOne, ['value' => 0]);
        $programs[8]->options()->save($optionSleepOne, ['value' => 0]);

        $optionSleepTwo = factory(\App\Option::class)->create([
            'name' => 'I have sleep issues a few times par year',
            'pos' => 2,
            'question_id' => 4
        ]);
        $programs[0]->options()->save($optionSleepTwo, ['value' => 0]);
        $programs[1]->options()->save($optionSleepTwo, ['value' => 0]);
        $programs[2]->options()->save($optionSleepTwo, ['value' => 1]);
        $programs[3]->options()->save($optionSleepTwo, ['value' => 0]);
        $programs[4]->options()->save($optionSleepTwo, ['value' => 0]);
        $programs[5]->options()->save($optionSleepTwo, ['value' => 0]);
        $programs[6]->options()->save($optionSleepTwo, ['value' => 0]);
        $programs[7]->options()->save($optionSleepTwo, ['value' => 1]);
        $programs[8]->options()->save($optionSleepTwo, ['value' => 0]);

        $optionSleepThree = factory(\App\Option::class)->create([
            'name' => 'I have weekly sleep issues',
            'pos' => 3,
            'question_id' => 4
        ]);
        $programs[0]->options()->save($optionSleepThree, ['value' => 0]);
        $programs[1]->options()->save($optionSleepThree, ['value' => 0]);
        $programs[2]->options()->save($optionSleepThree, ['value' => 2]);
        $programs[3]->options()->save($optionSleepThree, ['value' => 0]);
        $programs[4]->options()->save($optionSleepThree, ['value' => 0]);
        $programs[5]->options()->save($optionSleepThree, ['value' => 0]);
        $programs[6]->options()->save($optionSleepThree, ['value' => 0]);
        $programs[7]->options()->save($optionSleepThree, ['value' => 1]);
        $programs[8]->options()->save($optionSleepThree, ['value' => 0]);

        $optionSleepFour = factory(\App\Option::class)->create([
            'name' => 'I have diagnosed insomnia',
            'pos' => 4,
            'question_id' => 4
        ]);
        $programs[0]->options()->save($optionSleepFour, ['value' => 0]);
        $programs[1]->options()->save($optionSleepFour, ['value' => 0]);
        $programs[2]->options()->save($optionSleepFour, ['value' => 3]);
        $programs[3]->options()->save($optionSleepFour, ['value' => 0]);
        $programs[4]->options()->save($optionSleepFour, ['value' => 0]);
        $programs[5]->options()->save($optionSleepFour, ['value' => 0]);
        $programs[6]->options()->save($optionSleepFour, ['value' => 0]);
        $programs[7]->options()->save($optionSleepFour, ['value' => 2]);
        $programs[8]->options()->save($optionSleepFour, ['value' => 0]);

        /**
         * Stress
         */
        $optionStressOne = factory(\App\Option::class)->create([
            'name' => 'I am rarely stressed',
            'pos' => 1,
            'question_id' => 5
        ]);
        $programs[0]->options()->save($optionStressOne, ['value' => 0]);
        $programs[1]->options()->save($optionStressOne, ['value' => 0]);
        $programs[2]->options()->save($optionStressOne, ['value' => 0]);
        $programs[3]->options()->save($optionStressOne, ['value' => 0]);
        $programs[4]->options()->save($optionStressOne, ['value' => 0]);
        $programs[5]->options()->save($optionStressOne, ['value' => 0]);
        $programs[6]->options()->save($optionStressOne, ['value' => 0]);
        $programs[7]->options()->save($optionStressOne, ['value' => 0]);
        $programs[8]->options()->save($optionStressOne, ['value' => 0]);

        $optionStressTwo = factory(\App\Option::class)->create([
            'name' => 'I have occasional stress (few times a year)',
            'pos' => 2,
            'question_id' => 5
        ]);
        $programs[0]->options()->save($optionStressTwo, ['value' => 1]);
        $programs[1]->options()->save($optionStressTwo, ['value' => 0]);
        $programs[2]->options()->save($optionStressTwo, ['value' => 1]);
        $programs[3]->options()->save($optionStressTwo, ['value' => 0]);
        $programs[4]->options()->save($optionStressTwo, ['value' => 0]);
        $programs[5]->options()->save($optionStressTwo, ['value' => 0]);
        $programs[6]->options()->save($optionStressTwo, ['value' => 0]);
        $programs[7]->options()->save($optionStressTwo, ['value' => 1]);
        $programs[8]->options()->save($optionStressTwo, ['value' => 0]);

        $optionStressThree = factory(\App\Option::class)->create([
            'name' => 'I am often stressed (weekly)',
            'pos' => 3,
            'question_id' => 5
        ]);
        $programs[0]->options()->save($optionStressThree, ['value' => 1]);
        $programs[1]->options()->save($optionStressThree, ['value' => 0]);
        $programs[2]->options()->save($optionStressThree, ['value' => 2]);
        $programs[3]->options()->save($optionStressThree, ['value' => 0]);
        $programs[4]->options()->save($optionStressThree, ['value' => 0]);
        $programs[5]->options()->save($optionStressThree, ['value' => 0]);
        $programs[6]->options()->save($optionStressThree, ['value' => 0]);
        $programs[7]->options()->save($optionStressThree, ['value' => 2]);
        $programs[8]->options()->save($optionStressThree, ['value' => 0]);

        $optionStressFour = factory(\App\Option::class)->create([
            'name' => 'I have diagnosed anxiety or stress issues',
            'pos' => 4,
            'question_id' => 5
        ]);
        $programs[0]->options()->save($optionStressFour, ['value' => 0]);
        $programs[1]->options()->save($optionStressFour, ['value' => 0]);
        $programs[2]->options()->save($optionStressFour, ['value' => 0]);
        $programs[3]->options()->save($optionStressFour, ['value' => 1]);
        $programs[4]->options()->save($optionStressFour, ['value' => 0]);
        $programs[5]->options()->save($optionStressFour, ['value' => 0]);
        $programs[6]->options()->save($optionStressFour, ['value' => 0]);
        $programs[7]->options()->save($optionStressFour, ['value' => 3]);
        $programs[8]->options()->save($optionStressFour, ['value' => 0]);

        /**
         * Health
         */
        $optionHealthOne = factory(\App\Option::class)->create([
            'name' => 'I am frequently ill (3+ times per year)',
            'pos' => 1,
            'question_id' => 6
        ]);
        $programs[0]->options()->save($optionHealthOne, ['value' => 3]);
        $programs[1]->options()->save($optionHealthOne, ['value' => 3]);
        $programs[2]->options()->save($optionHealthOne, ['value' => 0]);
        $programs[3]->options()->save($optionHealthOne, ['value' => 1]);
        $programs[4]->options()->save($optionHealthOne, ['value' => 0]);
        $programs[5]->options()->save($optionHealthOne, ['value' => 0]);
        $programs[6]->options()->save($optionHealthOne, ['value' => 0]);
        $programs[7]->options()->save($optionHealthOne, ['value' => 1]);
        $programs[8]->options()->save($optionHealthOne, ['value' => 0]);

        $optionHealthTwo = factory(\App\Option::class)->create([
            'name' => 'I have a chronic disease',
            'pos' => 2,
            'question_id' => 6
        ]);
        $programs[0]->options()->save($optionHealthTwo, ['value' => 2]);
        $programs[1]->options()->save($optionHealthTwo, ['value' => 1]);
        $programs[2]->options()->save($optionHealthTwo, ['value' => 0]);
        $programs[3]->options()->save($optionHealthTwo, ['value' => 1]);
        $programs[4]->options()->save($optionHealthTwo, ['value' => 0]);
        $programs[5]->options()->save($optionHealthTwo, ['value' => 0]);
        $programs[6]->options()->save($optionHealthTwo, ['value' => 0]);
        $programs[7]->options()->save($optionHealthTwo, ['value' => 0]);
        $programs[8]->options()->save($optionHealthTwo, ['value' => 0]);

        $optionHealthThree = factory(\App\Option::class)->create([
            'name' => 'I have nutrition or weight issues',
            'pos' => 3,
            'question_id' => 6
        ]);
        $programs[0]->options()->save($optionHealthThree, ['value' => 0]);
        $programs[1]->options()->save($optionHealthThree, ['value' => 0]);
        $programs[2]->options()->save($optionHealthThree, ['value' => 0]);
        $programs[3]->options()->save($optionHealthThree, ['value' => 0]);
        $programs[4]->options()->save($optionHealthThree, ['value' => 0]);
        $programs[5]->options()->save($optionHealthThree, ['value' => 0]);
        $programs[6]->options()->save($optionHealthThree, ['value' => 3]);
        $programs[7]->options()->save($optionHealthThree, ['value' => 0]);
        $programs[8]->options()->save($optionHealthThree, ['value' => 0]);

        $optionHealthFour = factory(\App\Option::class)->create([
            'name' => 'I have an injury (muscle, joint or bone)',
            'pos' => 4,
            'question_id' => 6
        ]);
        $programs[0]->options()->save($optionHealthFour, ['value' => 0]);
        $programs[1]->options()->save($optionHealthFour, ['value' => 0]);
        $programs[2]->options()->save($optionHealthFour, ['value' => 0]);
        $programs[3]->options()->save($optionHealthFour, ['value' => 0]);
        $programs[4]->options()->save($optionHealthFour, ['value' => 0]);
        $programs[5]->options()->save($optionHealthFour, ['value' => 3]);
        $programs[6]->options()->save($optionHealthFour, ['value' => 0]);
        $programs[7]->options()->save($optionHealthFour, ['value' => 0]);
        $programs[8]->options()->save($optionHealthFour, ['value' => 0]);

        $optionHealthFive = factory(\App\Option::class)->create([
            'name' => 'I have a heart condition',
            'pos' => 5,
            'question_id' => 6
        ]);
        $programs[0]->options()->save($optionHealthFive, ['value' => 0]);
        $programs[1]->options()->save($optionHealthFive, ['value' => 0]);
        $programs[2]->options()->save($optionHealthFive, ['value' => 0]);
        $programs[3]->options()->save($optionHealthFive, ['value' => 2]);
        $programs[4]->options()->save($optionHealthFive, ['value' => 0]);
        $programs[5]->options()->save($optionHealthFive, ['value' => 0]);
        $programs[6]->options()->save($optionHealthFive, ['value' => 0]);
        $programs[7]->options()->save($optionHealthFive, ['value' => 0]);
        $programs[8]->options()->save($optionHealthFive, ['value' => 0]);

        $optionHealthSix = factory(\App\Option::class)->create([
            'name' => 'I dont\' know',
            'pos' => 6,
            'question_id' => 6
        ]);
        $programs[0]->options()->save($optionHealthSix, ['value' => 0]);
        $programs[1]->options()->save($optionHealthSix, ['value' => 0]);
        $programs[2]->options()->save($optionHealthSix, ['value' => 0]);
        $programs[3]->options()->save($optionHealthSix, ['value' => 3]);
        $programs[4]->options()->save($optionHealthSix, ['value' => 0]);
        $programs[5]->options()->save($optionHealthSix, ['value' => 0]);
        $programs[6]->options()->save($optionHealthSix, ['value' => 0]);
        $programs[7]->options()->save($optionHealthSix, ['value' => 0]);
        $programs[8]->options()->save($optionHealthSix, ['value' => 0]);

        /**
         * Nutrition
         */
        $optionNutritionOne = factory(\App\Option::class)->create([
            'name' => 'I rarely eat healthy (less than 2 days per week)',
            'pos' => 1,
            'question_id' => 7
        ]);
        $programs[0]->options()->save($optionNutritionOne, ['value' => 0]);
        $programs[1]->options()->save($optionNutritionOne, ['value' => 3]);
        $programs[2]->options()->save($optionNutritionOne, ['value' => 0]);
        $programs[3]->options()->save($optionNutritionOne, ['value' => 0]);
        $programs[4]->options()->save($optionNutritionOne, ['value' => 1]);
        $programs[5]->options()->save($optionNutritionOne, ['value' => 0]);
        $programs[6]->options()->save($optionNutritionOne, ['value' => 2]);
        $programs[7]->options()->save($optionNutritionOne, ['value' => 0]);
        $programs[8]->options()->save($optionNutritionOne, ['value' => 0]);

        $optionNutritionTwo = factory(\App\Option::class)->create([
            'name' => 'I sometimes eat healthy (2-3 days per week)',
            'pos' => 2,
            'question_id' => 7
        ]);
        $programs[0]->options()->save($optionNutritionTwo, ['value' => 0]);
        $programs[1]->options()->save($optionNutritionTwo, ['value' => 2]);
        $programs[2]->options()->save($optionNutritionTwo, ['value' => 0]);
        $programs[3]->options()->save($optionNutritionTwo, ['value' => 0]);
        $programs[4]->options()->save($optionNutritionTwo, ['value' => 0]);
        $programs[5]->options()->save($optionNutritionTwo, ['value' => 0]);
        $programs[6]->options()->save($optionNutritionTwo, ['value' => 1]);
        $programs[7]->options()->save($optionNutritionTwo, ['value' => 0]);
        $programs[8]->options()->save($optionNutritionTwo, ['value' => 0]);

        $optionNutritionThree = factory(\App\Option::class)->create([
            'name' => 'I frequently eat healthy (5-6 days per week)',
            'pos' => 3,
            'question_id' => 7
        ]);
        $programs[0]->options()->save($optionNutritionThree, ['value' => 0]);
        $programs[1]->options()->save($optionNutritionThree, ['value' => 1]);
        $programs[2]->options()->save($optionNutritionThree, ['value' => 0]);
        $programs[3]->options()->save($optionNutritionThree, ['value' => 0]);
        $programs[4]->options()->save($optionNutritionThree, ['value' => 0]);
        $programs[5]->options()->save($optionNutritionThree, ['value' => 0]);
        $programs[6]->options()->save($optionNutritionThree, ['value' => 0]);
        $programs[7]->options()->save($optionNutritionThree, ['value' => 0]);
        $programs[8]->options()->save($optionNutritionThree, ['value' => 0]);

        $optionNutritionFour = factory(\App\Option::class)->create([
            'name' => 'I don\'t know',
            'pos' => 4,
            'question_id' => 7
        ]);
        $programs[0]->options()->save($optionNutritionFour, ['value' => 0]);
        $programs[1]->options()->save($optionNutritionFour, ['value' => 2]);
        $programs[2]->options()->save($optionNutritionFour, ['value' => 0]);
        $programs[3]->options()->save($optionNutritionFour, ['value' => 1]);
        $programs[4]->options()->save($optionNutritionFour, ['value' => 0]);
        $programs[5]->options()->save($optionNutritionFour, ['value' => 0]);
        $programs[6]->options()->save($optionNutritionFour, ['value' => 0]);
        $programs[7]->options()->save($optionNutritionFour, ['value' => 0]);
        $programs[8]->options()->save($optionNutritionFour, ['value' => 0]);

        $optionNutritionFive = factory(\App\Option::class)->create([
            'name' => 'I am interested in losing weight',
            'pos' => 5,
            'question_id' => 7
        ]);
        $programs[0]->options()->save($optionNutritionFive, ['value' => 0]);
        $programs[1]->options()->save($optionNutritionFive, ['value' => 0]);
        $programs[2]->options()->save($optionNutritionFive, ['value' => 0]);
        $programs[3]->options()->save($optionNutritionFive, ['value' => 0]);
        $programs[4]->options()->save($optionNutritionFive, ['value' => 0]);
        $programs[5]->options()->save($optionNutritionFive, ['value' => 0]);
        $programs[6]->options()->save($optionNutritionFive, ['value' => 3]);
        $programs[7]->options()->save($optionNutritionFive, ['value' => 0]);
        $programs[8]->options()->save($optionNutritionFive, ['value' => 0]);

        /**
         * Exercise
         */
        $optionExerciseOne = factory(\App\Option::class)->create([
            'name' => 'I never exercise',
            'pos' => 1,
            'question_id' => 8
        ]);
        $programs[0]->options()->save($optionExerciseOne, ['value' => 1]);
        $programs[1]->options()->save($optionExerciseOne, ['value' => 0]);
        $programs[2]->options()->save($optionExerciseOne, ['value' => 0]);
        $programs[3]->options()->save($optionExerciseOne, ['value' => 0]);
        $programs[4]->options()->save($optionExerciseOne, ['value' => 0]);
        $programs[5]->options()->save($optionExerciseOne, ['value' => 3]);
        $programs[6]->options()->save($optionExerciseOne, ['value' => 1]);
        $programs[7]->options()->save($optionExerciseOne, ['value' => 0]);
        $programs[8]->options()->save($optionExerciseOne, ['value' => 0]);

        $optionExerciseTwo = factory(\App\Option::class)->create([
            'name' => 'I rarely exercise (1 time of less per week)',
            'pos' => 2,
            'question_id' => 8
        ]);
        $programs[0]->options()->save($optionExerciseTwo, ['value' => 1]);
        $programs[1]->options()->save($optionExerciseTwo, ['value' => 0]);
        $programs[2]->options()->save($optionExerciseTwo, ['value' => 0]);
        $programs[3]->options()->save($optionExerciseTwo, ['value' => 0]);
        $programs[4]->options()->save($optionExerciseTwo, ['value' => 0]);
        $programs[5]->options()->save($optionExerciseTwo, ['value' => 2]);
        $programs[6]->options()->save($optionExerciseTwo, ['value' => 1]);
        $programs[7]->options()->save($optionExerciseTwo, ['value' => 0]);
        $programs[8]->options()->save($optionExerciseTwo, ['value' => 0]);

        $optionExerciseThree = factory(\App\Option::class)->create([
            'name' => 'I exercise 2-3 times per week',
            'pos' => 3,
            'question_id' => 8
        ]);
        $programs[0]->options()->save($optionExerciseThree, ['value' => 0]);
        $programs[1]->options()->save($optionExerciseThree, ['value' => 1]);
        $programs[2]->options()->save($optionExerciseThree, ['value' => 0]);
        $programs[3]->options()->save($optionExerciseThree, ['value' => 0]);
        $programs[4]->options()->save($optionExerciseThree, ['value' => 0]);
        $programs[5]->options()->save($optionExerciseThree, ['value' => 0]);
        $programs[6]->options()->save($optionExerciseThree, ['value' => 0]);
        $programs[7]->options()->save($optionExerciseThree, ['value' => 0]);
        $programs[8]->options()->save($optionExerciseThree, ['value' => 0]);

        $optionExerciseFour = factory(\App\Option::class)->create([
            'name' => 'I exercise more than 3 times per week',
            'pos' => 4,
            'question_id' => 8
        ]);
        $programs[0]->options()->save($optionExerciseFour, ['value' => 0]);
        $programs[1]->options()->save($optionExerciseFour, ['value' => 1]);
        $programs[2]->options()->save($optionExerciseFour, ['value' => 0]);
        $programs[3]->options()->save($optionExerciseFour, ['value' => 0]);
        $programs[4]->options()->save($optionExerciseFour, ['value' => 0]);
        $programs[5]->options()->save($optionExerciseFour, ['value' => 0]);
        $programs[6]->options()->save($optionExerciseFour, ['value' => 0]);
        $programs[7]->options()->save($optionExerciseFour, ['value' => 0]);
        $programs[8]->options()->save($optionExerciseFour, ['value' => 0]);

        /**
         * Beauty
         */
        $optionBeautyOne = factory(\App\Option::class)->create([
            'name' => 'Wrinkles and lines',
            'pos' => 1,
            'question_id' => 9
        ]);
        $programs[0]->options()->save($optionBeautyOne, ['value' => 0]);
        $programs[1]->options()->save($optionBeautyOne, ['value' => 0]);
        $programs[2]->options()->save($optionBeautyOne, ['value' => 0]);
        $programs[3]->options()->save($optionBeautyOne, ['value' => 0]);
        $programs[4]->options()->save($optionBeautyOne, ['value' => 0]);
        $programs[5]->options()->save($optionBeautyOne, ['value' => 0]);
        $programs[6]->options()->save($optionBeautyOne, ['value' => 0]);
        $programs[7]->options()->save($optionBeautyOne, ['value' => 0]);
        $programs[8]->options()->save($optionBeautyOne, ['value' => 0]);

        $optionBeautyTwo = factory(\App\Option::class)->create([
            'name' => 'Loss of firmness, lifting',
            'pos' => 2,
            'question_id' => 9
        ]);
        $programs[0]->options()->save($optionBeautyTwo, ['value' => 0]);
        $programs[1]->options()->save($optionBeautyTwo, ['value' => 0]);
        $programs[2]->options()->save($optionBeautyTwo, ['value' => 0]);
        $programs[3]->options()->save($optionBeautyTwo, ['value' => 0]);
        $programs[4]->options()->save($optionBeautyTwo, ['value' => 0]);
        $programs[5]->options()->save($optionBeautyTwo, ['value' => 0]);
        $programs[6]->options()->save($optionBeautyTwo, ['value' => 0]);
        $programs[7]->options()->save($optionBeautyTwo, ['value' => 0]);
        $programs[8]->options()->save($optionBeautyTwo, ['value' => 0]);

        $optionBeautyThree = factory(\App\Option::class)->create([
            'name' => 'Sensitivity and redness',
            'pos' => 3,
            'question_id' => 9
        ]);
        $programs[0]->options()->save($optionBeautyThree, ['value' => 0]);
        $programs[1]->options()->save($optionBeautyThree, ['value' => 0]);
        $programs[2]->options()->save($optionBeautyThree, ['value' => 0]);
        $programs[3]->options()->save($optionBeautyThree, ['value' => 0]);
        $programs[4]->options()->save($optionBeautyThree, ['value' => 0]);
        $programs[5]->options()->save($optionBeautyThree, ['value' => 0]);
        $programs[6]->options()->save($optionBeautyThree, ['value' => 0]);
        $programs[7]->options()->save($optionBeautyThree, ['value' => 0]);
        $programs[8]->options()->save($optionBeautyThree, ['value' => 0]);

        $optionBeautyFour = factory(\App\Option::class)->create([
            'name' => 'Oily skin acne and pores',
            'pos' => 4,
            'question_id' => 9
        ]);
        $programs[0]->options()->save($optionBeautyFour, ['value' => 0]);
        $programs[1]->options()->save($optionBeautyFour, ['value' => 0]);
        $programs[2]->options()->save($optionBeautyFour, ['value' => 0]);
        $programs[3]->options()->save($optionBeautyFour, ['value' => 0]);
        $programs[4]->options()->save($optionBeautyFour, ['value' => 0]);
        $programs[5]->options()->save($optionBeautyFour, ['value' => 0]);
        $programs[6]->options()->save($optionBeautyFour, ['value' => 0]);
        $programs[7]->options()->save($optionBeautyFour, ['value' => 0]);
        $programs[8]->options()->save($optionBeautyFour, ['value' => 0]);

        $optionBeautyFive = factory(\App\Option::class)->create([
            'name' => 'Dryness',
            'pos' => 5,
            'question_id' => 9
        ]);
        $programs[0]->options()->save($optionBeautyFive, ['value' => 0]);
        $programs[1]->options()->save($optionBeautyFive, ['value' => 0]);
        $programs[2]->options()->save($optionBeautyFive, ['value' => 0]);
        $programs[3]->options()->save($optionBeautyFive, ['value' => 0]);
        $programs[4]->options()->save($optionBeautyFive, ['value' => 0]);
        $programs[5]->options()->save($optionBeautyFive, ['value' => 0]);
        $programs[6]->options()->save($optionBeautyFive, ['value' => 0]);
        $programs[7]->options()->save($optionBeautyFive, ['value' => 0]);
        $programs[8]->options()->save($optionBeautyFive, ['value' => 0]);

        $optionBeautySix = factory(\App\Option::class)->create([
            'name' => 'Dark spots',
            'pos' => 6,
            'question_id' => 9
        ]);
        $programs[0]->options()->save($optionBeautySix, ['value' => 0]);
        $programs[1]->options()->save($optionBeautySix, ['value' => 0]);
        $programs[2]->options()->save($optionBeautySix, ['value' => 0]);
        $programs[3]->options()->save($optionBeautySix, ['value' => 0]);
        $programs[4]->options()->save($optionBeautySix, ['value' => 0]);
        $programs[5]->options()->save($optionBeautySix, ['value' => 0]);
        $programs[6]->options()->save($optionBeautySix, ['value' => 0]);
        $programs[7]->options()->save($optionBeautySix, ['value' => 0]);
        $programs[8]->options()->save($optionBeautySix, ['value' => 0]);

        $optionBeautySeven = factory(\App\Option::class)->create([
            'name' => 'Particular area shape (nose, chin, etc.)',
            'pos' => 7,
            'question_id' => 9
        ]);
        $programs[0]->options()->save($optionBeautySeven, ['value' => 0]);
        $programs[1]->options()->save($optionBeautySeven, ['value' => 0]);
        $programs[2]->options()->save($optionBeautySeven, ['value' => 0]);
        $programs[3]->options()->save($optionBeautySeven, ['value' => 0]);
        $programs[4]->options()->save($optionBeautySeven, ['value' => 0]);
        $programs[5]->options()->save($optionBeautySeven, ['value' => 0]);
        $programs[6]->options()->save($optionBeautySeven, ['value' => 0]);
        $programs[7]->options()->save($optionBeautySeven, ['value' => 0]);
        $programs[8]->options()->save($optionBeautySeven, ['value' => 0]);

        /**
         * Country
         */
        $country = factory(\App\Option::class)->create(['name' => 'Switzerland', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'United States of America', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'China', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Russia', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'France', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Germany', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Italy', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Austria', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Afghanistan', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);
        $country = factory(\App\Option::class)->create(['name' => 'Albania', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);
        $country = factory(\App\Option::class)->create(['name' => 'Algeria', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);
        $country = factory(\App\Option::class)->create(['name' => 'Andorra', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);
        $country = factory(\App\Option::class)->create(['name' => 'Angola', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);
        $country = factory(\App\Option::class)->create(['name' => 'Antigua and Barbuda', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);
        $country = factory(\App\Option::class)->create(['name' => 'Argentina', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Armenia', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Australia', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Azerbaijan', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Bahamas', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Bahrain', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Bangladesh', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Barbados', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Belarus', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Belgium', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Belize', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Benin', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Bhutan', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Bolivia', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Bosnia and Herzegovina', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Botswana', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Brazil', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Brunei', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Bulgaria', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Burkina Faso', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Burundi', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Cambodia', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Cameroon', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Canada', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Cape Verde', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Central African Republic', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Chad', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Chile', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Colombia', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Comoros', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Congo', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Cook Islands', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Costa Rica', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Croatia', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Cuba', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Cyprus', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Czech Republic', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Denmark', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Djibouti', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Dominica', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Dominican Republic', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'East Timor', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Ecuador', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Egypt', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'El Salvador', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Equatorial Guinea', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Eritrea', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Estonia', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Ethiopia', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Fiji', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Finland', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Gabon', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Gambia', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Georgia', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Ghana', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Greece', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Grenada', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Guatemala', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Guinea', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Guinea-Bissau', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Guyana', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Haiti', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Honduras', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Hungary', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Iceland', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'India', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Indonesia', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Iran', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Iraq', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Ireland', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Israel', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Ivory Coast', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Jamaica', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Japan', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Jordan', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Kazakhstan', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Kenya', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Kiribati', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'North Korea', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'South Korea', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Kosovo', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Kuwait', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Kyrgyzstan', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Laos', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Latvia', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Lebanon', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Lesotho', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Liberia', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Libya', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Liechtenstein', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Lithuania', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Luxembourg', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Macedonia', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Madagascar', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Malawi', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Maldives', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Mali', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Malta', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Marshall Islands', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Mauritania', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Mauritius', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Mexico', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Micronesia', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Moldova', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Monaco', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Mongolia', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Montenegro', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Morocco', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Mozambique', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Myanmar', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Namibia', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Nauru', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Nepal', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Netherlands', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'New Zealand', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Nicaragua', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Niger', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Nigeria', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Niue', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Norway', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Oman', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Pakistan', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Palau', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Palestine', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Panama', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Papua New Guinea', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Paraguay', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Peru', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Philippines', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Poland', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Portugal', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Qatar', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Romania', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Rwanda', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Saint Kitts and Nevis', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Saint Lucia', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Saint Vincent and the Grenadines', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Samoa', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'San Marino', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'São Tomé and Príncipe', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Saudi Arabia', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Senegal', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Serbia', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Seychelles', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Sierra Leone', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Singapore', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Slovakia', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Slovenia', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Solomon Islands', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Somalia', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'South Africa', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'South Sudan', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Spain', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Sri Lanka', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Sudan', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Suriname', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Swaziland', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Sweden', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Syria', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Tajikistan', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Tanzania', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Thailand', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Togo', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Tonga', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Trinidad and Tobago', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Tunisia', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Turkey', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Turkmenistan', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Tuvalu', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Uganda', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Ukraine', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'United Arab Emirates', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'United Kingdom', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Urugay', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Uzbekistan', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Vanuatu', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Vatican City', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Venezuela', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Vietnam', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Yemen', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Zambia', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);

        $country = factory(\App\Option::class)->create(['name' => 'Zimbabwe', 'question_id' => 3]);
        $programs[0]->options()->save($country, ['value' => 0]);
        $programs[1]->options()->save($country, ['value' => 0]);
        $programs[2]->options()->save($country, ['value' => 0]);
        $programs[3]->options()->save($country, ['value' => 0]);
        $programs[4]->options()->save($country, ['value' => 0]);
        $programs[5]->options()->save($country, ['value' => 0]);
        $programs[6]->options()->save($country, ['value' => 0]);
        $programs[7]->options()->save($country, ['value' => 0]);
        $programs[8]->options()->save($country, ['value' => 0]);
    }
}
