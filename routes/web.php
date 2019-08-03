<?php
# github自动部署
Route::post('/deploy',function(){
    $s1=$_SERVER['HTTP_X_HUB_SIGNATURE'];
    $s2='sha1='.hash_hmac('sha1',file_get_contents('php://input'),$_ENV['GITHUB_WEBHOOK_SECRET']);
    if($s1==$s2){
        $path = base_path();
        $proc = proc_open("cd $path && git pull", [1=>['pipe','w'],2=>['pipe','w']], $pipes);
        echo stream_get_contents($pipes[1]);
        echo stream_get_contents($pipes[2]);
        fclose($pipes[1]);
        fclose($pipes[2]);
        proc_close($proc);
    }
});

# 默认
Route::get('/', function () {
    return redirect('/index');
});

# 前台
Route::namespace('Stage')->group(function (){
    Route::resource('/index','IndexController');
});

# 验证
Route::namespace('Auth')->group(function (){
    Route::get('/logout', 'LoginController@logout')->name('logout');
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login');
});

# 后台
Route::namespace('Admin')->group(function(){
    Route::resource('/article', 'ArticleController');
    Route::resource('/tag', 'TagController');
    Route::resource('/upload', 'UploadController');
});

