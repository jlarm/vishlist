<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Database\Factories\ItemFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read int $id
 * @property-read string $uuid
 * @property-read User $user_id
 * @property-read string $name
 * @property-read ?string $image
 * @property-read ?string $size
 * @property-read ?string $color
 * @property-read ?int $price
 * @property-read ?string $store
 * @property-read bool $purchased
 * @property-read ?int $purchased_by
 * @property-read ?CarbonInterface $purchased_date
 * @property-read bool $delivered
 * @property-read CarbonInterface $delivered_date
 * @property-read CarbonInterface $created_at
 * @property-read CarbonInterface $updated_at
 */
final class Item extends Model
{
    /** @use HasFactory<ItemFactory> */
    use HasFactory;

    /**
     * @return array<string, string>
     */
    public function casts(): array
    {
        return [
            'id' => 'integer',
            'uuid' => 'string',
            'name' => 'string',
            'image' => 'string',
            'size' => 'string',
            'color' => 'string',
            'price' => 'integer',
            'store' => 'string',
            'purchased' => 'boolean',
            'purchased_by' => 'integer',
            'purchased_date' => 'date',
            'delivered' => 'boolean',
            'delivered_date' => 'date',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
