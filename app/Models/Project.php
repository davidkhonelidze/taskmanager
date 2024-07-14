<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'name',
        'description',
        'homepage',
        'is_public',
        'parent_id',
        'identifier',
        'status',
        'ltf',
        'gtf',
        'inherit_members',
        'default_version_id',
        'default_assigned_to_id',
        'default_issue_query_id',
        'created_on',
        'updated_on',
    ];
}
