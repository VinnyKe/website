<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Media;
use App\Models\Question;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // HEADERS
        // St. | Cat | Question | 1 | 2 | 3 | 4 | Right | Réponse complémentaire |
        //  0  |  1  |     2    | 3 | 4 | 5 | 6 |   7   |           8            |

        $seeder = 'seeder.csv';
        $headersSet = false;

        if (($handle = fopen("database/seeders/".$seeder, "r")) !== FALSE) {
            while (($data = fgetcsv($handle)) !== FALSE) {

                if ($headersSet && $data[0] == 3) {
                    $answers = array_slice($data, 3, 4);

                    $question = Question::factory()
                        ->create([
                            'text' => $data[2],
                            'answer_description' => $data[8]
                        ]);

                    // Add media to question
                    // !$data[1] ?:
                    // Media::factory()
                    //     ->for($question)
                    //     ->create(['path' => $data[1]]);

                    foreach ($answers as $index => $answer) {
                        if(!!$answer)
                            Answer::factory()
                                ->for($question)
                                ->create([
                                    'text' => $answer,
                                    'is_correct' => $index+1 == $data[7] ? true : false,
                                ]);
                    }
                } else $headersSet = $headersSet ?:true;

            }
            fclose($handle);
        }
    }
}
