<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrudsTable extends Migration
{

    public function create(Generator $faker)
    {
      $crud = new Crud();
      $crud->name = $faker->lexify('????????');
      $crud->color = $faker->boolean ? 'red' : 'green';
      $crud->save();

      return response($crud->jsonSerialize(), Response::HTTP_CREATED);
    }

    public function index()
    {
      return response(Crud::all()->jsonSerialize(), Response::HTTP_OK);
    }
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cruds', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('color');
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
        Schema::dropIfExists('cruds');
    }
}
