<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Question extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'text',
    ];

    public function registerMediaConversions(Media $media = null): void {
        $this->addMediaConversion('converted')
            ->format(Manipulations::FORMAT_WEBP);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
