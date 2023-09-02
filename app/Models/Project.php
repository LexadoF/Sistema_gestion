<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'avatar',
        'alias',
        'status',
        'initial_date',
        'final_date',
        'leader_user',
    ];
    public function leader()
    {
        return $this->belongsTo(User::class, 'leader_user');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'parent_task');
    }

    public const STATUS_WAITING = 'En espera';
    public const STATUS_IN_PROGRESS = 'En proceso';
    public const STATUS_PAUSED = 'Pausado';
    public const STATUS_FINISHED = 'Finalizado';

    public static function getStatusOptions()
    {
        return [
            self::STATUS_WAITING => 'En espera',
            self::STATUS_IN_PROGRESS => 'En proceso',
            self::STATUS_PAUSED => 'Pausado',
            self::STATUS_FINISHED => 'Finalizado',
        ];
    }
}
