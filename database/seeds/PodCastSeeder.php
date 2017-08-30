<?php

use App\Podcast;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;

class PodCastSeeder extends Seeder
{
    /**
     * @var string
     */
    protected $client;

    /**
     * @var Podcast
     */
    protected $podcast;

    /**
     * DatabaseSeeder constructor.
     * @param Client $client
     * @param Podcast $podcast
     */
    public function __construct(Client $client, Podcast $podcast)
    {
        $this->client = $client;
        $this->podcast = $podcast;
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = $this->getJsonData();
        foreach ($contents->items as $key => $value){

            $this->podcast->create([
                'site_id'   => 4,
                'title'     => $value->title,
                'guid'      => $value->guid,
                'link'      => $value->link,
                'pub_date'  => $value->pubDate,
                'author'    => $value->author,
                'description' => $value->description,
                'content'   => $value->content,
                'audio'     => $value->enclosure->link,
                'type'      => $value->enclosure->type,
                'duration'  => (isset($value->enclosure->duration)) ? $value->enclosure->duration : '',
                'length'    => $value->enclosure->length

            ]);
        }
    }


    /**
     * Laravel PodCast  => https://rss.simplecast.com/podcasts/351/rss
     * RoundTablePHP    => http://feeds.feedburner.com/PhpRoundtable
     * FullStackRadio   => https://rss.simplecast.com/podcasts/279/rss
     * PhpPodCasts      => http://feeds.feedburner.com/MageTalkAMagentoPodcast
     * @return mixed
     */
    private function getJsonData()
    {
        $uri = 'https://api.rss2json.com/v1/api.json?rss_url='. urlencode('https://rss.simplecast.com/podcasts/279/rss') .'&api_key='.env('API_KEY').'&count=200';

        $api_req = $this->client->request('GET', $uri);

        return json_decode($api_req->getBody()->getContents());
    }
}
