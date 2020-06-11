<?php
Route::get('/', 'PagesController@homepage');

Route::get('/search', 'PagesController@search');
Route::get('/search/categories/{id}', 'PagesController@searchCategory');
Route::get('/search/tags/{id}', 'PagesController@searchTag');
Route::get('/search/author/{id}', 'PagesController@searchAuthor');
Route::get('/search/commenter/{id}', 'PagesController@searchCommenter');

Route::get('/articles', 'PagesController@showArticles');
Route::get('/article/{id}', 'PagesController@showArticle');
Route::get('/pages/{id}', 'PagesController@showPage');
Route::get('/manager/{id}', 'PagesController@showManager');
Route::post('/article/{id}/comment', 'PagesController@sendComment');
Route::get('/service/{id}', 'PagesController@showService');
Route::get('/projects/{id}', 'PagesController@showProject');
Route::get('/mojriRegister', 'PagesController@mojriShowForm');
Route::post('/newMojri', 'PagesController@mojriStore');
Route::get('/profile', 'PagesController@showProfleUser')->middleware('auth');
Route::get('/profile/user', 'PagesController@showProfleUser')->middleware('auth');
Route::post('/profile/user/update', 'PagesController@profleUserUpdate')->middleware('auth');
Route::post('/profile/mojri/update', 'PagesController@profleMojriUpdate')->middleware('auth');
Route::get('/profile/mojri', 'PagesController@showProfleMojri')->middleware('auth');
Route::get('/profile/documents', 'PagesController@showProfleDocuments')->middleware('auth');
Route::post('/profile/documents/update', 'PagesController@profleDocumentsUpdate')->middleware('auth');
Route::get('/profile/documents/delete/{id}', 'PagesController@profleDocumentsDelete')->middleware('auth');
Route::post('/userRegister','UserController@newUser')->name('userRegister');
Route::post('/sendOTP','UserController@sendOTP')->name('sendOTP');
Route::get('/checkOTP','UserController@checkOTPForm')->name('checkOTPForm');
Route::post('/checkOTP','UserController@checkOTP')->name('checkOTP');
Route::get('/userChangePassword','UserController@changePassForm');
Route::post('/userChangePassword','UserController@changePassOTP');

Route::get('/profile/projects', 'PagesController@showProfleProjects')->middleware('auth');
Route::get('/profile/projects/gallery/{id}', 'PagesController@showProjectsGallery')->middleware('auth');
Route::post('/profile/projects/new', 'PagesController@addProject')->middleware('auth');
Route::get('/profile/projects/edit/{id}', 'PagesController@editProject')->middleware('auth');
Route::post('/profile/projects/{id}/update', 'PagesController@updateProject')->middleware('auth');
Route::get('/profile/projects/{id}/delete', 'PagesController@deleteProject')->middleware('auth');


Route::get('/profile/change-password', 'PagesController@changeUserPassword')->middleware('auth');
Route::post('/profile/changePassword', 'PagesController@doChangeUserPassword')->middleware('auth');


Route::get('/refresh-captcha', 'ContactController@refreshCaptcha')->name('refreshCaptcha');
Route::get('/contactUs', 'ContactController@contactUs')->name('contactUs');
Route::post('/sendMessage', 'ContactController@contactUsSubmit')->name('sendMessage');
Route::post('/cp/message/sms/answer/{id}', 'ContactController@answerBySMS');
Route::post('/cp/message/email/answer/{id}', 'MailController@answerByEmail');

Route::get('payment/result', 'PaymentController@result');

Auth::routes();

Route::get('/cp', 'AdminController@dashboard');

Route::get('/cp/categories', 'CategoryController@index');
Route::post('/cp/categories', 'CategoryController@store');
Route::post('/cp/category/delete/{id}', 'CategoryController@destroy');
Route::post('/cp/category/{id}/edit', 'CategoryController@update');

Route::get('/cp/articles', 'ArticleController@index');

Route::get('/cp/messages', 'MessageController@index');
Route::post('/cp/messages/delete/{id}', 'MessageController@destroy');
Route::get('/cp/comments', 'CommentController@index');
Route::post('/cp/comments/accept/{id}', 'CommentController@accept');
Route::post('/cp/comments/answer/{id}', 'CommentController@answer');
Route::post('/cp/comments/delete/{id}', 'CommentController@destroy');

Route::get('/cp/pages', 'PagesController@all');
Route::post('/cp/pages/{id}/changeStatus', 'PagesController@pageChangeStatus');
Route::get('/cp/pages/new', 'PagesController@showFrmNewPage');
Route::post('/cp/pages/new', 'PagesController@newPage');
Route::get('/cp/pages/{id}/edit', 'PagesController@editPage');
Route::post('/cp/pages/{id}/edit', 'PagesController@updatePage');
Route::post('/cp/pages/delete/{id}', 'PagesController@deletePage');

Route::get('/cp/articles/new', 'ArticleController@create');
Route::post('/cp/articles/new', 'ArticleController@store');
Route::get('/cp/articles/{id}/edit', 'ArticleController@edit');
Route::post('/cp/articles', 'ArticleController@store');
Route::post('/cp/article/delete/{id}', 'ArticleController@destroy');
Route::post('/cp/article/{id}/edit', 'ArticleController@update');

Route::get('/cp/registered', 'UserController@index');
Route::post('/cp/user/{id}/edit', 'UserController@userUpdate');
Route::post('/cp/user/{id}/changePass', 'UserController@userChangePass');
Route::post('/cp/user/{id}/changeStatus', 'UserController@userChangeStatus');
Route::post('/cp/user/delete/{id}', 'UserController@userdestroy');

Route::get('/cp/mojrian', 'PersonController@index');
Route::post('/cp/mojrian/{id}/changeStatus', 'PersonController@mojriChangeStatus');
Route::post('/cp/mojrian/delete/{id}', 'PersonController@destroy');
Route::get('/cp/projects', 'ProjectController@index');
Route::get('/cp/projects/new', 'ProjectController@create');
Route::post('/cp/projects/new', 'ProjectController@store');
Route::get('/cp/projects/{id}/edit', 'ProjectController@edit');
Route::post('/cp/projects', 'ProjectController@store');
Route::post('/cp/projects/delete/{id}', 'ProjectController@destroy');
Route::post('/cp/projects/{id}/edit', 'ProjectController@update');
Route::get('/cp/projects/gallery/add/{id}', 'ProjectController@showGallery');
Route::post('cp/projects/gallery/upload/{id}', 'ProjectController@saveToGallery');
Route::post('cp/projects/gallery/delete/{id}', 'ProjectController@deleteFromGallery');

Route::get('/cp/slider', 'SliderController@index');
Route::post('/cp/slider', 'SliderController@store');
Route::post('/cp/slider/delete/{id}', 'SliderController@destroy');
Route::post('/cp/slider/{id}/edit', 'SliderController@update');

Route::get('/cp/headerMenu', 'HeaderMenuController@index');
Route::post('/cp/headerMenu', 'HeaderMenuController@store');
Route::post('/cp/headerMenu/delete/{id}', 'HeaderMenuController@destroy');
Route::post('/cp/headerMenu/{id}/edit', 'HeaderMenuController@update');

Route::get('/cp/footerMenu', 'FooterMenuController@index');
Route::post('/cp/footerMenu', 'FooterMenuController@store');
Route::post('/cp/footerMenu/delete/{id}', 'FooterMenuController@destroy');
Route::post('/cp/footerMenu/{id}/edit', 'FooterMenuController@update');

Route::get('/cp/socials', 'SocialController@index');
Route::post('/cp/socials', 'SocialController@store');
Route::post('/cp/socials/delete/{id}', 'SocialController@destroy');
Route::post('/cp/socials/{id}/edit', 'SocialController@update');

Route::get('/cp/tags', 'TagController@index');
Route::post('/cp/tags', 'TagController@store');
Route::post('/cp/tag/delete/{id}', 'TagController@destroy');
Route::post('/cp/tag/{id}/edit', 'TagController@update');

Route::get('/cp/services', 'ServiceController@index');
Route::post('/cp/services', 'ServiceController@store');
Route::post('/cp/services/delete/{id}', 'ServiceController@destroy');
Route::post('/cp/services/{id}/edit', 'ServiceController@update');

Route::get('/cp/settings', 'AdminController@settings');
Route::post('/cp/settings', 'AdminController@saveSettings');
Route::post('/cp/uploadLogo', 'AdminController@uploadLogo');
Route::post('chgPswrd', 'UserController@changePassword');


Route::get('/home', 'HomeController@index')->name('home');

