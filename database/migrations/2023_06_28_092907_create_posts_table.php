 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('likes');
            $table->boolean('is_published');
            $table->timestamps();

            $table->softDeletes();

            $table->unsignedBigInteger('category_id')->nullable();  //ДЛЯ ВЗАИМОСВЯЗИ(ОТНОШЕНИЙ) МЕЖДУ ТАБЛИЦАМИ
            $table->index('category_id', 'post_category_idx');  //ДЛЯ ВЗАИМОСВЯЗИ(ОТНОШЕНИЙ) МЕЖДУ ТАБЛИЦАМИ
            $table->foreign('category_id', 'post_category_fk')->references('id')->on('categories');   //ДЛЯ ВЗАИМОСВЯЗИ(ОТНОШЕНИЙ) МЕЖДУ ТАБЛИЦАМИ
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts', function (Blueprint $table){
            $table->dropForeign('category_id');
            $table->dropColumn('category_id');
        });
    }
};
