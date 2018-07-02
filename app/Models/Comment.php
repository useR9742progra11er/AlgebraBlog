<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Comment extends Model
{
	use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['body', 'user_id', 'post_id'];

	/**
     * Save new comment
     *
     * @param array $data
	 * @return object Post
     */
	public function saveComment($data)
	{
		return $this->create($data);
	}

	/**
     * Update comment
     *
     * @param array $data
	 * @return void
     */
	public function updateComment($data)
	{
		$this->update($data);
	}

	/**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

	/**
     * Return the user relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

	/**
     * Return the comment relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
     public function post()
     {
      return $this->belongsTo('App\Post');
    }

    /**
       * Return the post relationship.
       *
       * @return \Illuminate\Database\Eloquent\Relations\HasMany
       */
  	public function comments()
  	{
  		return $this->hasMany('App\Models\Comment');
  	}
}
