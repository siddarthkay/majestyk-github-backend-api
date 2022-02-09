<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGithubRepositoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('github_repositories', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('node_id');
            $table->bigInteger('response_id');
            $table->string('repo_url');
            $table->string('name');
            $table->string('description');
            $table->bigInteger('stargazers_count');
            $table->bigInteger('watchers_count');
            $table->bigInteger('forks_count');
            $table->bigInteger('open_issues_count');
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
        Schema::dropIfExists('github_repositories');
    }
}
