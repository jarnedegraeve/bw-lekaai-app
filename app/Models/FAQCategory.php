<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FAQItem;

class FAQCategory extends Model
{
    use HasFactory;
    protected $table = 'faq_categories';
    protected $fillable = ['name', 'description'];
    
    public function catagory()
    {
        return $this->hasMany(FAQItem::class, 'faq_category_id');
    }
}

