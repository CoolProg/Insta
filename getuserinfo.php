$app->get('/login2', function () use ($app, $instagram) {

    $login_url = $instagram->getLoginUrl(array('basic', 'likes'));

    if(!empty($_GET['code'])){

        $code = $_GET['code'];

        $data = $instagram->getOAuthToken($code); //��������� ������� ������� � ����� ����������� ������������

        $instagram->setAccessToken($data);

        $access_token = $instagram->getAccessToken();

        //����� ������ ��� ��� ������ � ���������� �������

    }else{

       $app->render('login.php', array('login_url' => $login_url));

    }

});