<?php

namespace Tests\Feature;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TweetControllerTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @var Tweet
     */
    private Model $tweet;

    /**
     * @var User
     */
    private Model $user;


    /**
     * @return void
     * @test
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function get_request_should_return_200()
    {

        $this->actingAs($this->user)->get('tweets')->assertSuccessful();
    }

    /**
     * @return void
     * @test
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function post_request_should_return_200_for_auth_user()
    {

        $this->actingAs($this->user)
            ->post('/tweets', ['title' => '__title__', 'body' => '__body__'])
            ->assertSuccessful();
    }

    /**
     * @return void
     * @test
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function it_should_be_forbidden_for_guests_to_create_tweets()
    {
        $this->post('/tweets', ['title' => '__title__', 'body' => '__body__'])
            ->assertForbidden();
    }

    /**
     * @return void
     * @test
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function put_request_should_return_200_for_tweet_owner()
    {
        $this->actingAs($this->tweet->user)->put('tweets/' . $this->tweet->id, ['title' => '__updated title__', 'body' => '__updated body__'])
            ->assertSuccessful();
    }

    /**
     * @return void
     * @test
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function it_should_be_forbidden_to_update_other_users_tweets()
    {
        $this->actingAs($this->user)->put('tweets/' . $this->tweet->id, ['title' => '__updated title__', 'body' => '__updated body__'])
            ->assertForbidden();
    }


    /**
     * @return void
     * @test
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function delete_request_should_return_200()
    {
        $this->actingAs($this->tweet->user)->delete('tweets/' . $this->tweet->id)->assertSuccessful();
    }

    /**
     * @return void
     * @test
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function it_should_be_forbidden_to_delete_other_users_tweets()
    {
        $this->actingAs($this->user)->delete('tweets/' . $this->tweet->id)->assertForbidden();
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->tweet = Tweet::factory()->for(User::factory())->create();
        $this->user = User::factory()->create();

    }

}
