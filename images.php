$app->get('/tags/search-with-tagvalidation', function() use($app, $client, $access_token) {

    $query = 'Niagara Falls';

    $response = $client->get("https://api.instagram.com/v1/tags/search?access_token={$access_token}&q={$query}");

    $result = $response->json();

    if(!empty($result['data'])){

        $tag = $result['data'][0]['name'];

        $response = $client->get("https://api.instagram.com/v1/tags/{$tag}/media/recent?access_token={$access_token}");

        $results = $response->json();

        $app->render('images.php', array('results' => $results));

    }else{

        echo 'no results';

    }

});
