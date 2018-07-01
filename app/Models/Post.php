<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
	use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'content', 'user_id'];

	/**
     * Save new post
     *
     * @param array $data
	 * @return object Post
     */
	public function savePost($data)
	{
		return $this->create($data);
	}

	/**
     * Update post
     *
     * @param array $data
	 * @return void
     */
	public function updatePost($data)
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
     * Return the post relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function comment()
	{
		return $this->hasMany('App\Models\Comment');
	}
}
