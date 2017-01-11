<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameFlavor extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'game_flavor';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','lang_id', 'description', 'creator_id', 'cover_img_id'];

    /**
     * Get the Equivalence Sets for the card.
     */
    public function equivalenceSets() {
        return $this->hasMany('App\Models\EquivalenceSet');
    }

    /**
     * Get the images for the card.
     */
    public function sounds() {
        return $this->hasMany('App\Models\Sound');
    }

    public function language() {
        return $this->hasOne('App\Models\Language', 'id', 'lang_id');
    }

    /**
     * Get the post that owns the comment.
     */
    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'creator_id', 'id');
    }

    /**
     * Get the post that owns the comment.
     */
    public function coverImg()
    {
        return $this->hasOne('App\Models\Image', 'id', 'cover_img_id');
    }

    /***
     * https://laravel.com/docs/5.3/eloquent-mutators#accessors-and-mutators
     *
     * @param $value
     * @return mixed
     */
    public function getAccessedByUserAttribute($value)
    {
        return $value;
    }

    public function setAccessedByUserAttribute($value)
    {
        $this->attributes['accessed_by_user'] = $value;
    }
}