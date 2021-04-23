<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model {
    use HasFactory;

    protected $table = 'member';

    public function createdAuctions() {
        return $this->hasMany("App\Models\Auction");
    }

    public function followers() {
        return $this->hasManyThrough(
            Member::class,
            Follow::class,
            "followed_id",
            "id",
            "id",
            "follower_id",
        );
    }

    public function bookmarked_auctions() {
        return $this->hasMany("App\Models\BookmarkedAuction");
    }
}
