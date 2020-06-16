<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class Postpolicy
{
    use HandlesAuthorization;

    /**編集と削除の認可を判断する
     * Create a new policy instance.
     * @param \App\User $user
     * @param \App\Post $post
     * @return bool
     * @return \Illuminate\Auth\Access\Response
     */
    public function update(User $user,Post $post)
    {
        //ログインしているユーザーを表示している投稿に認可させる
        return $user->id === $post->user_id
                    ? Response::allow()
                    : Response::deny('あなたはこのポストの認可を持っていません。');        
    }
}
