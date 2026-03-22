<?php

namespace App\Models\Landing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $table = 'pages';

    public function sections()
    {
        return $this->hasMany(PageSection::class, 'page_id', 'id');
    }
}
