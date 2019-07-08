require 'vendor/autoload.php';

use GuzzleHttpClient;

$client = new Client();
define("CLIENT_ID", "451272462091858");

define("CLIENT_SECRET", "23b39b3556654c8e9990794954864f5c");

define("https://github.com/mgp25/Instagram-API", "https://developers.facebook.com/products/instagram/");

app = new SlimSlim(array(

    'view' => new SlimViewsTwig() // twig для описания просмотров

));

$view = $app->view();

$view->parserOptions = array(

    'debug' => true, //enable error reporting in the view

    'cache' => dirname(__FILE__) . '/cache' //set directory for caching views

);

$app->get('/login', function () use ($app, $client) {

    $data = array();

    $login_url = '';

    if($app->request->get('code')){

        $code = $app->request->get('code');

        $response = $client->post('https://api.instagram.com/oauth/access_token', array('body' => array(

            'client_id' => CLIENT_ID,

            'client_secret' => CLIENT_SECRET,

            'grant_type' => 'authorization_code',

            'redirect_uri' => REDIRECT_URL,

            'code' => $code

        )));

        $data = $response->json();

    }else{

        $login_url = "https://api.instagram.com/oauth/authorize?client_id={$client_id}&redirect_uri={$redirect_url}&scope=basic&response_type=code";

    }

    $app->render('home.php', array('data' => $data, 'login_url' => $login_url));

});