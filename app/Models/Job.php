<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'salary',
        'location',
        'schedule',
        'url',
    ];

    /**
     * Get the employer that owns the Job
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function tag(string $name) : void
    {
        $tag = Tag::firstOrCreate(['name' => $name]);
        $this->tags()->attach($tag);
    }

    /**
     * The tags that belong to the Job
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

}
