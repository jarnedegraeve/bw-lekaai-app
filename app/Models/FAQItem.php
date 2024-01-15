<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FAQCategory;

class FAQItem extends Model
{
    use HasFactory;

    protected $table = 'faq_items';
    protected $fillable = ['question', 'answer'];

    public function catagory()
    {
        return $this->belongsTo(FAQCategory::class, 'faq_category_id');
    }
}
