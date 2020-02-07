<?php

namespace Modules\User\Services;

use GuzzleHttp\Client;

class GoogleSearchService
{
    public function search($query)
    {
        $base = new Client([
            'base_uri' => 'https://www.googleapis.com/customsearch/',
        ]);

        $response = $base->request('GET', 'v1?cx=' . env('GOOGLE_CX_KEY') . '&key=' . env('GOOGLE_API_KEY') . '&q=' . $query);

        return json_decode($response->getBody()->getContents());
    }
}
