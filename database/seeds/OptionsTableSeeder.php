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
         * Country
         */

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
         * Sickness
         */
        $optionSicknessOne = factory(\App\Option::class)->create([
            'name' => 'I am rarely ill during the year',
            'pos' => 1,
            'question_id' => 6
        ]);
        $programs[0]->options()->save($optionSicknessOne, ['value' => 0]);
        $programs[1]->options()->save($optionSicknessOne, ['value' => 0]);
        $programs[2]->options()->save($optionSicknessOne, ['value' => 0]);
        $programs[3]->options()->save($optionSicknessOne, ['value' => 0]);
        $programs[4]->options()->save($optionSicknessOne, ['value' => 0]);
        $programs[5]->options()->save($optionSicknessOne, ['value' => 0]);
        $programs[6]->options()->save($optionSicknessOne, ['value' => 0]);
        $programs[7]->options()->save($optionSicknessOne, ['value' => 0]);
        $programs[8]->options()->save($optionSicknessOne, ['value' => 0]);

        $optionSicknessTwo = factory(\App\Option::class)->create([
            'name' => 'I am ill 1 - 2 times per year',
            'pos' => 2,
            'question_id' => 6
        ]);
        $programs[0]->options()->save($optionSicknessTwo, ['value' => 1]);
        $programs[1]->options()->save($optionSicknessTwo, ['value' => 1]);
        $programs[2]->options()->save($optionSicknessTwo, ['value' => 0]);
        $programs[3]->options()->save($optionSicknessTwo, ['value' => 0]);
        $programs[4]->options()->save($optionSicknessTwo, ['value' => 0]);
        $programs[5]->options()->save($optionSicknessTwo, ['value' => 0]);
        $programs[6]->options()->save($optionSicknessTwo, ['value' => 0]);
        $programs[7]->options()->save($optionSicknessTwo, ['value' => 1]);
        $programs[8]->options()->save($optionSicknessTwo, ['value' => 0]);

        $optionSicknessThree = factory(\App\Option::class)->create([
            'name' => 'I am ill 3 or more times per year',
            'pos' => 3,
            'question_id' => 6
        ]);
        $programs[0]->options()->save($optionSicknessThree, ['value' => 3]);
        $programs[1]->options()->save($optionSicknessThree, ['value' => 3]);
        $programs[2]->options()->save($optionSicknessThree, ['value' => 0]);
        $programs[3]->options()->save($optionSicknessThree, ['value' => 1]);
        $programs[4]->options()->save($optionSicknessThree, ['value' => 0]);
        $programs[5]->options()->save($optionSicknessThree, ['value' => 0]);
        $programs[6]->options()->save($optionSicknessThree, ['value' => 0]);
        $programs[7]->options()->save($optionSicknessThree, ['value' => 1]);
        $programs[8]->options()->save($optionSicknessThree, ['value' => 0]);

        $optionSicknessFour = factory(\App\Option::class)->create([
            'name' => 'I have a chronic disease',
            'pos' => 4,
            'question_id' => 6
        ]);
        $programs[0]->options()->save($optionSicknessFour, ['value' => 2]);
        $programs[1]->options()->save($optionSicknessFour, ['value' => 1]);
        $programs[2]->options()->save($optionSicknessFour, ['value' => 0]);
        $programs[3]->options()->save($optionSicknessFour, ['value' => 1]);
        $programs[4]->options()->save($optionSicknessFour, ['value' => 0]);
        $programs[5]->options()->save($optionSicknessFour, ['value' => 0]);
        $programs[6]->options()->save($optionSicknessFour, ['value' => 0]);
        $programs[7]->options()->save($optionSicknessFour, ['value' => 0]);
        $programs[8]->options()->save($optionSicknessFour, ['value' => 0]);

        $optionSicknessFive = factory(\App\Option::class)->create([
            'name' => 'I do not know',
            'pos' => 5,
            'question_id' => 6
        ]);
        $programs[0]->options()->save($optionSicknessFive, ['value' => 0]);
        $programs[1]->options()->save($optionSicknessFive, ['value' => 0]);
        $programs[2]->options()->save($optionSicknessFive, ['value' => 0]);
        $programs[3]->options()->save($optionSicknessFive, ['value' => 3]);
        $programs[4]->options()->save($optionSicknessFive, ['value' => 0]);
        $programs[5]->options()->save($optionSicknessFive, ['value' => 0]);
        $programs[6]->options()->save($optionSicknessFive, ['value' => 0]);
        $programs[7]->options()->save($optionSicknessFive, ['value' => 0]);
        $programs[8]->options()->save($optionSicknessFive, ['value' => 0]);

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
            'name' => 'I am not sure whether my diet is healthy',
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
         * Nutrition Followup
         */
        $optionNutritionFollowup = factory(\App\Option::class)->create([
            'name' => 'I rarely eat healthy (less than 2 days per week)',
            'pos' => 1,
            'question_id' => 8
        ]);
        $programs[0]->options()->save($optionNutritionFollowup, ['value' => 0]);
        $programs[1]->options()->save($optionNutritionFollowup, ['value' => 3]);
        $programs[2]->options()->save($optionNutritionFollowup, ['value' => 0]);
        $programs[3]->options()->save($optionNutritionFollowup, ['value' => 0]);
        $programs[4]->options()->save($optionNutritionFollowup, ['value' => 0]);
        $programs[5]->options()->save($optionNutritionFollowup, ['value' => 0]);
        $programs[6]->options()->save($optionNutritionFollowup, ['value' => 1]);
        $programs[7]->options()->save($optionNutritionFollowup, ['value' => 0]);
        $programs[8]->options()->save($optionNutritionFollowup, ['value' => 0]);

        /**
         * Exercise
         */
        $optionExerciseOne = factory(\App\Option::class)->create([
            'name' => 'I never exercise',
            'pos' => 1,
            'question_id' => 9
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
            'question_id' => 9
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
            'question_id' => 9
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
            'question_id' => 9
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
         * Exercise Followup
         */
        $optionExerciseFollowup = factory(\App\Option::class)->create([
            'name' => 'I am interested in improving my physical condition',
            'pos' => 1,
            'question_id' => 10
        ]);
        $programs[0]->options()->save($optionExerciseFollowup, ['value' => 0]);
        $programs[1]->options()->save($optionExerciseFollowup, ['value' => 0]);
        $programs[2]->options()->save($optionExerciseFollowup, ['value' => 0]);
        $programs[3]->options()->save($optionExerciseFollowup, ['value' => 0]);
        $programs[4]->options()->save($optionExerciseFollowup, ['value' => 0]);
        $programs[5]->options()->save($optionExerciseFollowup, ['value' => 1]);
        $programs[6]->options()->save($optionExerciseFollowup, ['value' => 0]);
        $programs[7]->options()->save($optionExerciseFollowup, ['value' => 0]);
        $programs[8]->options()->save($optionExerciseFollowup, ['value' => 0]);

        /**
         * Health
         */
        $optionHealthOne = factory(\App\Option::class)->create([
            'name' => 'I have a heart condition',
            'pos' => 1,
            'question_id' => 11
        ]);
        $programs[0]->options()->save($optionHealthOne, ['value' => 0]);
        $programs[1]->options()->save($optionHealthOne, ['value' => 0]);
        $programs[2]->options()->save($optionHealthOne, ['value' => 0]);
        $programs[3]->options()->save($optionHealthOne, ['value' => 2]);
        $programs[4]->options()->save($optionHealthOne, ['value' => 0]);
        $programs[5]->options()->save($optionHealthOne, ['value' => 0]);
        $programs[6]->options()->save($optionHealthOne, ['value' => 0]);
        $programs[7]->options()->save($optionHealthOne, ['value' => 0]);
        $programs[8]->options()->save($optionHealthOne, ['value' => 0]);

        $optionHealthTwo = factory(\App\Option::class)->create([
            'name' => 'I have nutrition or weight issues',
            'pos' => 2,
            'question_id' => 11
        ]);
        $programs[0]->options()->save($optionHealthTwo, ['value' => 0]);
        $programs[1]->options()->save($optionHealthTwo, ['value' => 0]);
        $programs[2]->options()->save($optionHealthTwo, ['value' => 0]);
        $programs[3]->options()->save($optionHealthTwo, ['value' => 0]);
        $programs[4]->options()->save($optionHealthTwo, ['value' => 0]);
        $programs[5]->options()->save($optionHealthTwo, ['value' => 0]);
        $programs[6]->options()->save($optionHealthTwo, ['value' => 3]);
        $programs[7]->options()->save($optionHealthTwo, ['value' => 0]);
        $programs[8]->options()->save($optionHealthTwo, ['value' => 0]);

        $optionHealthThree = factory(\App\Option::class)->create([
            'name' => 'I have an injury (muscle, joint or bone)',
            'pos' => 3,
            'question_id' => 11
        ]);
        $programs[0]->options()->save($optionHealthThree, ['value' => 0]);
        $programs[1]->options()->save($optionHealthThree, ['value' => 0]);
        $programs[2]->options()->save($optionHealthThree, ['value' => 0]);
        $programs[3]->options()->save($optionHealthThree, ['value' => 0]);
        $programs[4]->options()->save($optionHealthThree, ['value' => 0]);
        $programs[5]->options()->save($optionHealthThree, ['value' => 3]);
        $programs[6]->options()->save($optionHealthThree, ['value' => 0]);
        $programs[7]->options()->save($optionHealthThree, ['value' => 0]);
        $programs[8]->options()->save($optionHealthThree, ['value' => 0]);

        $optionHealthFour = factory(\App\Option::class)->create([
            'name' => 'I have a chronic disease',
            'pos' => 4,
            'question_id' => 11
        ]);
        $programs[0]->options()->save($optionHealthFour, ['value' => 0]);
        $programs[1]->options()->save($optionHealthFour, ['value' => 0]);
        $programs[2]->options()->save($optionHealthFour, ['value' => 0]);
        $programs[3]->options()->save($optionHealthFour, ['value' => 1]);
        $programs[4]->options()->save($optionHealthFour, ['value' => 0]);
        $programs[5]->options()->save($optionHealthFour, ['value' => 0]);
        $programs[6]->options()->save($optionHealthFour, ['value' => 0]);
        $programs[7]->options()->save($optionHealthFour, ['value' => 0]);
        $programs[8]->options()->save($optionHealthFour, ['value' => 0]);

        $optionHealthFive = factory(\App\Option::class)->create([
            'name' => 'I am a smoker and I would like to quit',
            'pos' => 5,
            'question_id' => 11
        ]);
        $programs[0]->options()->save($optionHealthFive, ['value' => 0]);
        $programs[1]->options()->save($optionHealthFive, ['value' => 0]);
        $programs[2]->options()->save($optionHealthFive, ['value' => 0]);
        $programs[3]->options()->save($optionHealthFive, ['value' => 0]);
        $programs[4]->options()->save($optionHealthFive, ['value' => 0]);
        $programs[5]->options()->save($optionHealthFive, ['value' => 0]);
        $programs[6]->options()->save($optionHealthFive, ['value' => 0]);
        $programs[7]->options()->save($optionHealthFive, ['value' => 0]);
        $programs[8]->options()->save($optionHealthFive, ['value' => 0]);

        $optionHealthSix = factory(\App\Option::class)->create([
            'name' => 'Other: please tell us more',
            'pos' => 6,
            'question_id' => 11
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

        $optionHealthSeven = factory(\App\Option::class)->create([
            'name' => 'Non disclosed',
            'pos' => 7,
            'question_id' => 11
        ]);
        $programs[0]->options()->save($optionHealthSeven, ['value' => 0]);
        $programs[1]->options()->save($optionHealthSeven, ['value' => 0]);
        $programs[2]->options()->save($optionHealthSeven, ['value' => 0]);
        $programs[3]->options()->save($optionHealthSeven, ['value' => 2]);
        $programs[4]->options()->save($optionHealthSeven, ['value' => 0]);
        $programs[5]->options()->save($optionHealthSeven, ['value' => 0]);
        $programs[6]->options()->save($optionHealthSeven, ['value' => 0]);
        $programs[7]->options()->save($optionHealthSeven, ['value' => 0]);
        $programs[8]->options()->save($optionHealthSeven, ['value' => 0]);

        /**
         * Beauty
         */
        $optionBeautyOne = factory(\App\Option::class)->create([
            'name' => 'Wrinkles and lines',
            'pos' => 1,
            'question_id' => 12
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
            'question_id' => 12
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
            'question_id' => 12
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
            'question_id' => 12
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
            'question_id' => 12
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
            'name' => 'Dryness',
            'pos' => 6,
            'question_id' => 12
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
            'name' => 'Dark spots',
            'pos' => 7,
            'question_id' => 12
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

        $optionBeautyEight = factory(\App\Option::class)->create([
            'name' => 'Particular area shape (nose, chin, etc.)',
            'pos' => 8,
            'question_id' => 12
        ]);
        $programs[0]->options()->save($optionBeautyEight, ['value' => 0]);
        $programs[1]->options()->save($optionBeautyEight, ['value' => 0]);
        $programs[2]->options()->save($optionBeautyEight, ['value' => 0]);
        $programs[3]->options()->save($optionBeautyEight, ['value' => 0]);
        $programs[4]->options()->save($optionBeautyEight, ['value' => 0]);
        $programs[5]->options()->save($optionBeautyEight, ['value' => 0]);
        $programs[6]->options()->save($optionBeautyEight, ['value' => 0]);
        $programs[7]->options()->save($optionBeautyEight, ['value' => 0]);
        $programs[8]->options()->save($optionBeautyEight, ['value' => 0]);

        /**
         * Freetime
         */
        $optionFreetimeOne = factory(\App\Option::class)->create([
            'name' => 'I am interested in enjoying the spa and treatments',
            'pos' => 1,
            'question_id' => 13
        ]);
        $programs[0]->options()->save($optionFreetimeOne, ['value' => 0]);
        $programs[1]->options()->save($optionFreetimeOne, ['value' => 0]);
        $programs[2]->options()->save($optionFreetimeOne, ['value' => 0]);
        $programs[3]->options()->save($optionFreetimeOne, ['value' => 0]);
        $programs[4]->options()->save($optionFreetimeOne, ['value' => 0]);
        $programs[5]->options()->save($optionFreetimeOne, ['value' => 0]);
        $programs[6]->options()->save($optionFreetimeOne, ['value' => 0]);
        $programs[7]->options()->save($optionFreetimeOne, ['value' => 0]);
        $programs[8]->options()->save($optionFreetimeOne, ['value' => 0]);

        $optionFreetimeTwo = factory(\App\Option::class)->create([
            'name' => 'I am interested in visiting cultural sites and shopping',
            'pos' => 2,
            'question_id' => 13
        ]);
        $programs[0]->options()->save($optionFreetimeTwo, ['value' => 0]);
        $programs[1]->options()->save($optionFreetimeTwo, ['value' => 0]);
        $programs[2]->options()->save($optionFreetimeTwo, ['value' => 0]);
        $programs[3]->options()->save($optionFreetimeTwo, ['value' => 0]);
        $programs[4]->options()->save($optionFreetimeTwo, ['value' => 0]);
        $programs[5]->options()->save($optionFreetimeTwo, ['value' => 0]);
        $programs[6]->options()->save($optionFreetimeTwo, ['value' => 0]);
        $programs[7]->options()->save($optionFreetimeTwo, ['value' => 0]);
        $programs[8]->options()->save($optionFreetimeTwo, ['value' => 0]);

        $optionFreetimeThree = factory(\App\Option::class)->create([
            'name' => 'I am interested in medical aesthetic and beauty treatments',
            'pos' => 3,
            'question_id' => 13
        ]);
        $programs[0]->options()->save($optionFreetimeThree, ['value' => 0]);
        $programs[1]->options()->save($optionFreetimeThree, ['value' => 0]);
        $programs[2]->options()->save($optionFreetimeThree, ['value' => 0]);
        $programs[3]->options()->save($optionFreetimeThree, ['value' => 0]);
        $programs[4]->options()->save($optionFreetimeThree, ['value' => 3]);
        $programs[5]->options()->save($optionFreetimeThree, ['value' => 0]);
        $programs[6]->options()->save($optionFreetimeThree, ['value' => 0]);
        $programs[7]->options()->save($optionFreetimeThree, ['value' => 0]);
        $programs[8]->options()->save($optionFreetimeThree, ['value' => 0]);

        $optionFreetimeFour = factory(\App\Option::class)->create([
            'name' => 'I need to rest and sleep so I prefer to have maximum time off',
            'pos' => 4,
            'question_id' => 13
        ]);
        $programs[0]->options()->save($optionFreetimeFour, ['value' => 0]);
        $programs[1]->options()->save($optionFreetimeFour, ['value' => 0]);
        $programs[2]->options()->save($optionFreetimeFour, ['value' => 0]);
        $programs[3]->options()->save($optionFreetimeFour, ['value' => 0]);
        $programs[4]->options()->save($optionFreetimeFour, ['value' => 0]);
        $programs[5]->options()->save($optionFreetimeFour, ['value' => 0]);
        $programs[6]->options()->save($optionFreetimeFour, ['value' => 0]);
        $programs[7]->options()->save($optionFreetimeFour, ['value' => 0]);
        $programs[8]->options()->save($optionFreetimeFour, ['value' => 0]);

        /**
         * LOS
         */
        $optionLOSOne = factory(\App\Option::class)->create([
            'name' => 'I would like to stay 2-3 days',
            'pos' => 1,
            'question_id' => 14
        ]);
        $programs[0]->options()->save($optionLOSOne, ['value' => 0]);
        $programs[1]->options()->save($optionLOSOne, ['value' => 0]);
        $programs[2]->options()->save($optionLOSOne, ['value' => 0]);
        $programs[3]->options()->save($optionLOSOne, ['value' => 2]);
        $programs[4]->options()->save($optionLOSOne, ['value' => 3]);
        $programs[5]->options()->save($optionLOSOne, ['value' => 0]);
        $programs[6]->options()->save($optionLOSOne, ['value' => 0]);
        $programs[7]->options()->save($optionLOSOne, ['value' => 0]);
        $programs[8]->options()->save($optionLOSOne, ['value' => 3]);

        $optionLOSTwo = factory(\App\Option::class)->create([
            'name' => 'I would like to stay 6-7 days',
            'pos' => 2,
            'question_id' => 14
        ]);
        $programs[0]->options()->save($optionLOSTwo, ['value' => 1]);
        $programs[1]->options()->save($optionLOSTwo, ['value' => 1]);
        $programs[2]->options()->save($optionLOSTwo, ['value' => 1]);
        $programs[3]->options()->save($optionLOSTwo, ['value' => 1]);
        $programs[4]->options()->save($optionLOSTwo, ['value' => 1]);
        $programs[5]->options()->save($optionLOSTwo, ['value' => 1]);
        $programs[6]->options()->save($optionLOSTwo, ['value' => 1]);
        $programs[7]->options()->save($optionLOSTwo, ['value' => 1]);
        $programs[8]->options()->save($optionLOSTwo, ['value' => 0]);

        $optionLOSThree = factory(\App\Option::class)->create([
            'name' => 'I would like to stay more than a week',
            'pos' => 3,
            'question_id' => 14
        ]);
        $programs[0]->options()->save($optionLOSThree, ['value' => 1]);
        $programs[1]->options()->save($optionLOSThree, ['value' => 1]);
        $programs[2]->options()->save($optionLOSThree, ['value' => 1]);
        $programs[3]->options()->save($optionLOSThree, ['value' => 1]);
        $programs[4]->options()->save($optionLOSThree, ['value' => 1]);
        $programs[5]->options()->save($optionLOSThree, ['value' => 1]);
        $programs[6]->options()->save($optionLOSThree, ['value' => 1]);
        $programs[7]->options()->save($optionLOSThree, ['value' => 1]);
        $programs[8]->options()->save($optionLOSThree, ['value' => 0]);
    }
}
