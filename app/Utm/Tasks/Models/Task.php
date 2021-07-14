<?php

namespace App\Utm\Tasks\Models;

use App\Utm\Common\Traits\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Task
 * @package App\Utm\Tasks\Models
 */
class Task extends Model
{
    use SoftDeletes;
}
