<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Postpolicy
{
    use HandlesAuthorization;

    /**編集と削除の認可を判断する
     * Create a new policy instance.
     *
     * @return mixed
     */
    public function edit(User $login_user_id,Post $post)
    {
        //ログインしているユーザーを表示している投稿に認可させる
        return $login_user_id->id == $post->user_id;        
    }
}
