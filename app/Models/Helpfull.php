<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Helpfull extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'helpfuls';

    protected $fillable =
    [
        'testimonial_id',
        'is_helpful'
    ];

    public function tesimonial()
{
     return $this->belongsTo(Testimonial::class);
}

}
