<?php

namespace Modules\User\Services;

use GuzzleHttp\Client;

class SearchService
{
    public function search($data)
    {
        $base = new Client([
            'base_uri' => 'https://www.googleapis.com/customsearch/',
        ]);

        $response_first = $base->request('GET', 'v1?cx=' . env('GOOGLE_CX_KEY') . '&key=' . env('GOOGLE_API_KEY') . '&q=' . $data);

        $response_first_data = json_decode($response_first->getBody()->getContents());

        $totalResults = $response_first_data->searchInformation->totalResults;

        $results_first = $response_first_data->items;

        if ($response_first_data->searchInformation->totalResults == 0) {
            $results_first = [];
        }

        $response_second = $base->request('GET', 'v1?cx=' . env('GOOGLE_CX_KEY') . '&key=' . env('GOOGLE_API_KEY') . '&q=' . $data . 'start=11');

        $response_second_data = json_decode($response_second->getBody()->getContents());

        if ($response_second_data->searchInformation->totalResults == 0) {
            $results_second = [];
        } else {
            $results_second = $response_second_data->items;
        }

        $results = array_merge($results_first, $results_second);

        return compact('totalResults', 'results');
    }
}
