<?php
namespace Hankin\LaravelComment;

use Hankin\LaravelComment\Contracts\Commentable;
use Hankin\LaravelComment\Models\Comment;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait CanComment
{
    public function comment(CommentAble $remarkable, $content, $stars=null, $pics=[]):Comment
    {
        $remarkModel = config('comment.model');
        $remark = new $remarkModel([
            'content'       =>  $content,
            'pics'          =>  json_encode($pics),
            'start'         => $stars,
            'remarked_id'   => (string)$this->getAttribute($this->primaryKey),
            'remarked_type' => get_class(),
        ]);
        $remarkable->comments()->save($remark);
        return $remark;
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(config('comment.model'), 'commented');
    }

//    private function primaryId(): string
//    {
//        return (string)$this->getAttribute($this->primaryKey);
//    }
}
