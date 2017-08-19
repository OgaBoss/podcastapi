<?php

use App\Site;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;

class SitesSeeder extends Seeder
{
    /**
     * @var string
     */
    protected $client;

    /**
     * @var Site
     */
    protected $site;

    /**
     * DatabaseSeeder constructor.
     * @param Client $client
     * @param Site $site
     */
    public function __construct(Client $client, Site $site)
    {
        $this->client = $client;
        $this->site = $site;
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = $this->getJsonData();
        $this->site->title = $contents->feed->title;
        $this->site->link = $contents->feed->link;
        $this->site->author = $contents->feed->author;
        $this->site->description = $contents->feed->description;
        $this->site->image = $contents->feed->image;

        if($this->site->save()){
            echo 'Data Saved';
        }else {
            echo 'Something went wrong';
        }

    }


    private function getJsonData()
    {
        $uri = 'https://api.rss2json.com/v1/api.json?rss_url='. urlencode('https://rss.simplecast.com/podcasts/279/rss') .'&api_key='.env('API_KEY').'&count=1';

        $api_req = $this->client->request('GET', $uri);

        return json_decode($api_req->getBody()->getContents());
    }
}
