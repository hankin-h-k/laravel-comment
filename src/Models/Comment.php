<?php
namespace Hankin\LaravelComment\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['commentable_type', 'commentable_id','commented_id','commented_type', 'content', 'stars'];

}
