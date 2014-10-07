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

}
