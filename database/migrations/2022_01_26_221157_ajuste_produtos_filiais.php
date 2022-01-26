<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjusteProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filiais', function(Blueprint $table){
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
        });

        //criando tabela produto_filiais
        Schema::create('produto_filiais', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->float('preco', 8, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->timestamps();

            //fk (constraint)
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });

        //removendo colunas da tabela produtos
        Schema::table('produtos', function(Blueprint $table){
            $table->dropColumn(['preco', 'estoque_minimo', 'estoque_maximo']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Adicionando colunas da tabela produtos
        Schema::table('produtos', function(Blueprint $table){
            $table->float('preco', 8, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');     
        });
   
        Schema::table('produto_filiais', function(Blueprint $table){
         //Remover a fk
            $table-> dropForeign('produto_filiais_filial_id_foreign');
        });
   
        Schema::dropIfExists('produto_filiais');

        Schema::dropIfExists('filiais');
    }
}
