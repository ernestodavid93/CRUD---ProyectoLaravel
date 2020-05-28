<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();

            
            $table->string("Descripcion");
            $table->string("Departamento");
            $table->string("Existencia");
            $table->string("StockMaximo");
            $table->string("StockMinimo");
            $table->string("Status");
            $table->string("Foto");
            $table->decimal("Precio", 5,2);
            $table->integer("Categoria_id")->unsigned();
            $table->foreign("Categoria_id")
            ->references("id")
            ->on("categories")
            ->onDelete("cascade");
            $table->timestamps();




            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
