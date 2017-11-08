<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Log extends Model
{
    protected $table = 'log';

    protected $fillable = [
        'ip_address',
        'login',
        'password',
        'remember',
        'success',
    ];

    public static function getCountAuth(string $email): int
    {
        return Log::whereLogin($email)->count();
    }
}
