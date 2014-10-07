<?php

/**
 * Situation model
 */
class Situation extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'situations';

    /**
     * The attributes which are accessible
     *
     * @var array
     */
    protected $fillable = array(
        'body',
        'user_id',
        'upvotes',
        'downvotes',
        'created_at',
        'updated_at'
    );

    /**
     * Add relationship for user to situation
     */
    public function user() {
        return $this->belongsTo('User');
    }

    /**
     * Percentage of votes that are upvotes
     * @return int
     */
    public function percentage()
    {
        return $this->upvotes / ($this->upvotes + $this->downvotes);
    }

    /**
     * Link for this situation
     * @return String
     */
    public function link()
    {
        return url('/situation/' + $this->id);
    }
}
