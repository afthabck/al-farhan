<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Model;

class AdminConfig extends Model
{
    use ImageTrait;

    protected $imageDirectory = 'config';

    protected $table = 'admin_configs';

    public function getImageDirectory()
    {
        return $this->imageDirectory;
    }
}
