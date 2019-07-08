$app->get('/geo/search', function() use($app, $client, $access_token) {

    $query = 'banaue rice terraces';

    //запрос Google Geocoding API для поиска фото и видео, загруженных в определенном месте

    $place_response = $client->get("http://maps.googleapis.com/maps/api/geocode/json?address={$query}&sensor=false");

    $place_result = $place_response->json();

    if($place_result['status'] == 'OK'){

        //extract the lat and lng values

        $lat = $place_result['results'][0]['geometry']['location']['lat'];

        $lng = $place_result['results'][0]['geometry']['location']['lng'];

        //make a request to the Instagram API using the lat and lng

        $response = $client->get("https://api.instagram.com/v1/media/search?access_token={$access_token}&lat={$lat}&lng={$lng}");

        $results = $response->json();

        if(!empty($results['data'])){  

            $app->render('images.php', array('results' => $results));

        }else{

            echo 'фото не найдены';

        }

    }else{

        echo 'место не найдено';

    }

});