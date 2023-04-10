<?php

namespace Hankin\LaravelComment;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasComments
{
    public function comments(): MorphMany
    {
        return $this->morphMany(config('comment.model'), 'commentable');
    }
}
