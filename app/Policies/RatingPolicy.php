<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Book;
use App\Repositories\AuthorRepository;
use Illuminate\Auth\Access\HandlesAuthorization;

class RatingPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function MyRaitingAutor(User $user, Author $author){
        return $user->id == $author->$this->authors->getAuthorsRatings();
    }
}
