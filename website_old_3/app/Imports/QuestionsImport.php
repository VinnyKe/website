<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToArray;

class QuestionsImport implements ToArray
{

    // HEADERS
    protected $headers = [
        'id',
        'status',
        'Illustrat.',
        'niveau',
        'cat1',
        'cat2',
        'type1',
        'type2',
        'question',
        'bulle',
        'contenu_bulle',
        'answer1',
        'answer2',
        'answer3',
        'answer4',
        'correct1',
        'correct2',
        'correct3',
        'correct4',
        'answer_description',
    ];

    protected $extensions = 'jpeg|jpg|png|JPG|PNG';

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function array($rows) {
        $files = preg_grep('~\.('.$this->extensions.')$~', scandir('../app/Imports/images'));
        $imageFiles = [];
        foreach ($files as $index => $file) {
            $image = explode('.', $file);
            $imageFiles[$file] = $image[0];
            // $imageFiles[$image[0]] = $file;
        }

        if(true) {
            print_r($imageFiles);
            foreach ($rows as $index => $row) {
                if ($row[1] == 4) {
                    // $answers = array_slice($row, $this->headerPos('answer1'), 4);
                    // $correctAnswers = array_slice($row, $this->headerPos('correct1'), 4);

                    $question = Question::create([
                            'question' => $row[$this->headerPos('question')],
                        ]);

                    $imageName = $row[$this->headerPos('Illustrat.')];

                    print('Image name: '.$imageName.PHP_EOL);
                    // print('debug'.array_search($imageName, $imageFiles));
                    $pImage = array_search($imageName, $imageFiles);
                    if (!!$pImage) {
                        print('in: '.$imageName);
                        $question
                            ->addMedia('../app/Imports/images/'.$pImage)
                            ->preservingOriginal()
                            ->toMediaCollection();
                    }
                }
                if ($index == 13) break;
            }
        }
    }

    private function headerPos(String $header): int
    {
        return array_search($header, $this->headers);
    }
}
