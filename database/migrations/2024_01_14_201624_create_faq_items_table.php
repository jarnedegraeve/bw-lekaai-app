<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqItemsTable extends Migration
{
    public function up()
    {
        Schema::create('faq_items', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->text('answer');
            $table->unsignedBigInteger('faq_category_id'); // Correct the foreign key name
            $table->timestamps();

            $table->foreign('faq_category_id')->references('id')->on('faq_categories')->onDelete('cascade');
        });
            


    }

    public function down()
    {
        Schema::dropIfExists('faq_items');
    }
}
