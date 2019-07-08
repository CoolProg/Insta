$app->get('/user/feed', function() use($app, $client, $access_token) {

    $response = $client->get("https://api.instagram.com/v1/users/self/feed?access_token={$access_token}");

    $results = $response->json();

});