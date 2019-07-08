$app->get('/login2', function () use ($app, $instagram) {

    $login_url = $instagram->getLoginUrl(array('basic', 'likes'));

    if(!empty($_GET['code'])){

        $code = $_GET['code'];

        $data = $instagram->getOAuthToken($code); //получение токенов доступа с кодом авторизации пользователя

        $instagram->setAccessToken($data);

        $access_token = $instagram->getAccessToken();

        //можно делать все что угодно с полученным токеном

    }else{

       $app->render('login.php', array('login_url' => $login_url));

    }

});