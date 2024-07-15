<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IssueStatus extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'issue_statueses';

    protected $fillable = [
        'name',
    ];
}
