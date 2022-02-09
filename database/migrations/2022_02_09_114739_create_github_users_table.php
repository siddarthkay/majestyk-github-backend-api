<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGithubUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('github_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('username');
            $table->string('bio');
            $table->string('node_id');
            $table->bigInteger('response_id');
            $table->string('picture_url');
            $table->string('public_profile_url');
            $table->bigInteger('followers_count');
            $table->bigInteger('following_count');
            $table->bigInteger('public_repos_count');
            $table->string('location');
            $table->string('joined_at');
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
        Schema::dropIfExists('github_users');
    }
}
