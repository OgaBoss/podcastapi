<?php

use GuzzleHttp\Client;
use Illuminate\Database\Seeder;

class SitesSeeder extends Seeder
{
    /**
     * @var string
     */
    protected $client;

    /**
     * DatabaseSeeder constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = $this->getJsonData();

    }


    private function getJsonData()
    {
        $uri = 'https://api.rss2json.com/v1/api.json?rss_url='. urlencode('https://rss.simplecast.com/podcasts/279/rss') .'&api_key='.env('API_KEY').'&count=1';

        $api_req = $this->client->request('GET', $uri);

        return json_decode($api_req->getBody()->getContents());
    }
}
