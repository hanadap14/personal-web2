<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;
class Portfolio extends Model
{
    use HasFactory;

    protected $table = 'portfolio';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'category_id',
        'title',
        'year',
        'photo'
    ];
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
