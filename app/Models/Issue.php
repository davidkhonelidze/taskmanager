<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Issue extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'issues';

    protected $fillable = [
        'project_id',
        'status_id',
        'tracker_id',
        'priority_id',
        'subject',
        'description',
    ];

    public function tracker()
    {
        return $this->hasOne(Tracker::class, 'id', 'tracker_id');
    }

    public function status()
    {
        return $this->hasOne(IssueStatus::class, 'id', 'status_id');
    }

    public function priority()
    {
        return $this->hasOne(Enumeration::class, 'id', 'priority_id');
    }
}
