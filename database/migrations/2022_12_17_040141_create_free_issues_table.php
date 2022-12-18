<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreeIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('free_issues', function (Blueprint $table) {
            $table->id();
            $table->string('free_issue_label');
            $table->string('type');
            $table->string('purchase_product');
            $table->string('free_product');
            $table->string('purchase_quantity');
            $table->string('free_quantity');
            $table->string('lower_limit');
            $table->string('upper_limit');
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
        Schema::dropIfExists('free_issues');
    }
}
