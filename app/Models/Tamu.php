<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when(($filters['search']) ?? false,
            fn ($query, $search) =>
            $query->where(
                fn ($query) =>
                $query->where('nama_lengkap', 'like', '%' . $search . '%')
                    ->orWhere('alamat', 'like', '%' . $search . '%')
            )
        );
    }
}
