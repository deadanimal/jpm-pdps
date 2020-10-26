<?php

namespace App\Observers;

use App\Program;
use Illuminate\Support\Facades\File;

class ProgramObserver
{
    /**
     * Handle the User "deleting" event.
     *
     * @param  \App\Program  $iprogram
     * @return void
     */
    public function deleting(Program  $program)
    {
        File::delete(storage_path("/app/public/{$program->picture}"));
        
        $program->tags()->detach();
    }

    /**
     * Handle the User "updating" event.
     *
     * @param  \App\Program  $program
     * @return void
     */
    public function updating(Program $program)
    {
        if ($program->picture != $program->getOriginal('picture')) {
            File::delete(storage_path("/app/public/{$program->getOriginal('picture')}"));
        }
    }
}
