<?php
namespace Hankin\LaravelComment;

use Hankin\LaravelComment\Contracts\Commentable;
use Hankin\LaravelComment\Models\Comment;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait CanComment
{
    public function comment(Commentable $commentable, $content, $stars=null, $pics=[])
    {
        $commentModel = config('comment.model');
        $comment = new $commentModel([
            'content'       =>  $content,
            'pics'          =>  json_encode($pics),
            'stars'         => $stars,
            'commented_id'   => (string)$this->getAttribute($this->primaryKey),
            'commented_type' => get_class(),
        ]);
        $commentable->comments()->save($comment);
        return $comment;
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(config('comment.model'), 'commented');
    }
}
