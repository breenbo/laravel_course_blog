<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $with = ['category', 'author'];


    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class);
    }


    /**
     * Relationships with category
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relationships with users, with author as placeholder
     *
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //
    // Post::newQuery()->filter()
    public function scopeFilter($query, array $filters): void
    {
        //
        // same as commented below
        //
        $query -> when(
            $filters['search'] ?? false, fn($query, $search) => $query->where(
                fn($query) =>
                    $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
            )
        );

        //
        // search for a specific category in the post table
        //
        $query -> when(
            $filters['category'] ?? false, fn($query, $category) => $query
                -> whereHas(
                    'category',
                    fn($query) => $query -> where('slug', $category)
                )
        );
        //
        // search by author
        //
        $query -> when(
            $filters['author'] ?? false, fn($query, $author) => $query
                -> whereHas(
                    'author',
                    fn($query) => $query -> where('username', $author)
                )
        );
        //
        // if ($filters[ 'search' ] ?? false) {
        //     $query
        //         ->where('title', 'like', '%' . request('search') . '%')
        //         ->orWhere('body', 'like', '%' . request('search') . '%');
        //
        // }
    }
}
