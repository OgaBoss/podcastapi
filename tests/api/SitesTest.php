<?php

class SitesTest extends TestCase
{

    /** @test */
    public function get_a_list_of_sites()
    {
        $response = $this->get('/api/sites');

        $response
            ->assertStatus(200)
            ->assertJson([]);
    }
}
