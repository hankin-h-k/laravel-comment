<?php

namespace Hankin\LaravelComment;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasComments
{
    public function comments(): MorphMany
    {
        return $this->morphMany(config('remark.model'), 'commentable');
    }

//    public function primaryId(): string
//    {
//        return (string)$this->getAttribute($this->primaryKey);
//    }
}
