<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_task',
        'name',
        'description',
        'alias',
        'status',
        'initial_date',
        'final_date',
        'assigned_to',
        'time_used',
        'percentage_progress',
    ];

    public function parentTask()
    {
        return $this->belongsTo(Task::class, 'parent_task');
    }
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public const STATUS_WAITING = 'En espera';
    public const STATUS_UNASSIGNED = 'Sin Asignar';
    public const STATUS_IN_PROGRESS = 'En proceso';
    public const STATUS_PAUSED = 'Pausada';
    public const STATUS_FINISHED = 'Finalizada';

    public static function getStatusOptions()
    {
        return [
            self::STATUS_WAITING => 'En espera',
            self::STATUS_UNASSIGNED => 'Sin Asignar',
            self::STATUS_IN_PROGRESS => 'En proceso',
            self::STATUS_PAUSED => 'Pausada',
            self::STATUS_FINISHED => 'Finalizada',
        ];
    }
}
