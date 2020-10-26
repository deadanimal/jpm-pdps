<?php

namespace App\Observers;

use App\Media;
use Illuminate\Support\Facades\File;

class MediaObserver
{
    /**
     * Handle the User "deleting" event.
     *
     * @param  \App\Media  $imedia
     * @return void
     */
    public function deleting(Media  $media)
    {
        File::delete(storage_path("/app/public/{$media->picture}"));
        
        $media->tags()->detach();
    }

    /**
     * Handle the User "updating" event.
     *
     * @param  \App\Media  $imedia
     * @return void
     */
    public function updating(Media $media)
    {
        if ($media->picture != $media->getOriginal('picture')) {
            File::delete(storage_path("/app/public/{$imedia->getOriginal('picture')}"));
        }
    }
}
