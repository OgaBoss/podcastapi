<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class SitesTest extends TestCase
{
    use DatabaseTransactions;


    /** @test */
    public function get_a_list_of_sites()
    {


        $this->json('get', '/api/sites')
            ->seeJsonContains([
                'id',
                'title',
                'link',
                'author',
                'description',
                'image',
            ]);
    }
}