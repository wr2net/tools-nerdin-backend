<?php

namespace App\Utm\Users\Models;

use App\Utm\Common\Traits\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * @package App\Utm\Users\Models
 */
class User extends Model
{
    use SoftDeletes;
}
