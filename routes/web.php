<?php
# github自动部署
Route::any('/deploy',function(){
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

Route::get('/', function () {
    return view('test');
});

// 后台路由
Route::get('/admin', function () {
    return redirect('/admin/post');
});
Route::middleware('auth')->namespace('Admin')->group(function () {
    Route::resource('admin/post', 'PostController');
    Route::resource('admin/tag', 'TagController');
    Route::get('admin/upload', 'UploadController@index');
});

// 登录退出
Route::get('/admin/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/admin/login', 'Auth\LoginController@login');

