<?php

namespace App\Models;

use Database\Factories\PostFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property string $slug
 * @property string $title
 * @property string $excerpt
 * @property string $body
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $published-at
 * @property-read User $author
 * @property-read Category $category
 * @method static PostFactory factory(...$parameters)
 * @method static Builder|Post filter(array $filters)
 * @method static Builder|Post newModelQuery()
 * @method static Builder|Post newQuery()
 * @method static Builder|Post query()
 * @method static Builder|Post whereBody($value)
 * @method static Builder|Post whereCategoryId($value)
 * @method static Builder|Post whereCreatedAt($value)
 * @method static Builder|Post whereExcerpt($value)
 * @method static Builder|Post whereId($value)
 * @method static Builder|Post wherePublishedAt($value)
 * @method static Builder|Post whereSlug($value)
 * @method static Builder|Post whereTitle($value)
 * @method static Builder|Post whereUpdatedAt($value)
 * @method static Builder|Post whereUserId($value)
 * @mixin Eloquent
 */
class Post extends Model
{
    use HasFactory;

    protected $with = ["author", "category"];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters["search"] ?? false, fn($query, $search) => $query
            ->where(fn($query) => $query
                ->where("title", "like", "%" . $search . "%")
                ->orWhere("body", "like", "%" . $search . "%")
            )
        );
        $query->when($filters["category"] ?? false, fn($query, $category) => $query->whereHas("category", fn($query) => $query->where("slug", $category)));

        $query->when($filters["author"] ?? false, fn($query, $author) => $query->whereHas("author", fn($query) => $query->where("username", $author)));
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
