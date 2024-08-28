<?php

namespace App\Http\Controllers;

abstract class Controller
{

public function scopeForUser($query, $userId)
{

    return $query->where('user_id', $userId);
}

}
