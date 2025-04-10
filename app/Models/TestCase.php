<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestCase extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'feature',
        'description',
        'expected_result',
        'actual_result',
        'status',
        'case_type',
        'tester_id',
        'assigned_dev_id',
        'fix_status',
        'fix_date'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function tester()
    {
        return $this->belongsTo(User::class, 'tester_id');
    }

    public function assignedDeveloper()
    {
        return $this->belongsTo(User::class, 'assigned_dev_id');
    }

    public function media()
    {
        return $this->hasMany(Media::class, 'case_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'case_id');
    }
}
