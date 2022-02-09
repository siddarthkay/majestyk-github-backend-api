<?php

use Illuminate\Support\Facades\Route;
use GrahamCampbell\GitHub\Facades\GitHub;
use App\Models\GithubUser;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function (){
    return view('welcome');
});

Route::get('/getUser/{username}', function ($username) {
    $responsesFound = Github::search()->users($username);

//    dd($responsesFound);

    foreach ($responsesFound['items'] as $response) {
        $githubUser = Github::user()->show($response['login']);

        GithubUser::updateOrCreate([
            'name'=>$githubUser['name'],
            'email'=>$githubUser['email'],
            'username'=>$githubUser['login'],
            'bio'=>$githubUser['bio'],
            'node_id'=>$githubUser['node_id'],
            'response_id'=>$githubUser['id'],
            'picture_url'=>$githubUser['avatar_url'],
            'public_profile_url'=>$githubUser['html_url'],
            'followers_count'=>$githubUser['followers'],
            'following_count'=>$githubUser['following'],
            'public_repos_count'=>$githubUser['public_repos'],
            'location'=>$githubUser['location'],
            'joined_at'=>$githubUser['created_at'],
        ]);
    }

    $data = GithubUser::where('username',$username)->paginate(3);
    return Response::json($data, 200);

});

Route::get('/getRepo/{username}/{repo}', function ($username,$repo) {
    $response =  Github::search()->repositories("user:$username $repo in:name");
    dd($response);
    return $response;
});
