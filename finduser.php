$app->get('/user/search', function() use($app, $client, $access_token) {
;
; ����� ������������, � ����� �������� ���� �������� test
    $query = 'test';

    $response = $client->get("https://api.instagram.com/v1/users/search?q={$query}&access_token={$access_token}");

    $results = $response->json();

});