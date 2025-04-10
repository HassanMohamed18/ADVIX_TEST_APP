<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['case_id', 'media_type', 'media_post', 'media_link'];

    public function testCase()
    {
        return $this->belongsTo(TestCase::class, 'case_id');
    }
}
