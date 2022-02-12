<?php

namespace App\Http\Controllers;

use App\Imports\QuestionsImport;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\MediaLibrary\Support\UrlGenerator\UrlGeneratorFactory;

class QuestionsController extends Controller
{
    protected $fileName = 'Questions - v6.xlsx';

    public function show()
    {

    }

    public function importQuestions() {
        $this->resetAll();
        Excel::import(new QuestionsImport, app_path().'/Imports/Questions - v6.xlsx');
    }

    public function resetAll() {
        $this->resetQuestions();
        $this->resetMedia();
    }

    public function resetQuestions() {
        DB::table('questions')->delete();
    }

    public function resetMedia() {
        DB::table('media')->truncate();
    }

    public function showImage(Request $request, Question $question)
    {
        dd('yeah bby');
        if ($question->hasMedia()) {
            $media = $question->getFirstMedia();
            if (!!$media) {
                $disk = Storage::disk($media->disk);
                $urlGenerator = UrlGeneratorFactory::createForMedia($media, '');
                if ($disk->exists($urlGenerator->getPathRelativeToRoot())) {
                    return response($disk->get($urlGenerator->getPathRelativeToRoot()))->withHeaders([
                        'Content-Disposition' => 'inline',
                        'Pragma' => 'cache',
                        'Cache-Control' => 'max-age=86500',
                        'Expires' => gmdate('D, d M Y H:i:s \G\M\T', time() + 86500),
                        'Content-type' => $media->mime_type,
                    ]);
                } else {
                    return null;
                }
            } else {
                return null;
            }
        }
        abort(404);
    }
}
