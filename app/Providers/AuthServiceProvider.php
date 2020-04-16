<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

//ポリシーを登録（指定したモデルを認可した時、どのポリシーを使うのか指定する。）
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
       'App\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *アプリケーションの全認証・認可サービスの登録
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //一覧表示と詳細ページ以外の操作ができる許可を、ログインユーザーにあるかを決めるクロージャ
        Gate::define('edit-settings',function ($user){
            return $user->isAdmin;
        });

        Gate::define('update-post',function ($user,$post){
            return $user->id === $post->user_id;
        });
    }
}
