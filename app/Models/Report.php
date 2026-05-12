<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    use HasFactory;

    public const STATUS_PENDING = 'pending';
    public const STATUS_UNDER_REVIEW = 'under_review';
    public const STATUS_VERIFIED = 'verified';
    public const STATUS_RESOLVED = 'resolved';
    public const STATUS_REJECTED = 'rejected';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'child_name',
        'age',
        'gender',
        'location',
        'description',
        'reporter_contact',
        'image',
        'status',
        'admin_remark',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'age' => 'integer',
        ];
    }

    public static function statuses(): array
    {
        return [
            self::STATUS_PENDING => 'Pending',
            self::STATUS_UNDER_REVIEW => 'Under Review',
            self::STATUS_VERIFIED => 'Verified',
            self::STATUS_RESOLVED => 'Resolved',
            self::STATUS_REJECTED => 'Rejected',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query, ?string $term)
    {
        return $query->when($term, function ($query, string $term): void {
            $query->where(function ($nestedQuery) use ($term): void {
                $nestedQuery->where('child_name', 'like', "%{$term}%")
                    ->orWhere('location', 'like', "%{$term}%")
                    ->orWhere('reporter_contact', 'like', "%{$term}%");
            });
        });
    }
}