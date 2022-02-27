<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BlogpostControllerTest extends TestCase
{
    /**
     * @return void
     * @test
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function get_request_should_return_200()
    {
        $this->withoutExceptionHandling();
        $this->get('blogposts')->assertSuccessful();
    }
}
