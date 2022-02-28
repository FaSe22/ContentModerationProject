<?php

namespace Tests\Feature;

use App\Models\Blogpost;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogpostControllerTest extends TestCase
{
    
    use RefreshDatabase;
    
    /**
     * @var Blogpost
     */
    private Model $blogpost;

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
        $this->actingAs($this->user)->get('blogposts')->assertSuccessful();
    }

    /**
     * @return void
     * @test
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function post_request_should_return_200_for_auth_user()
    {

        $this->actingAs($this->user)
            ->post('/blogposts', ['title' => '__title__', 'body' => '__body__'])
            ->assertSuccessful();
    }

    /**
     * @return void
     * @test
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function it_should_be_forbidden_for_guests_to_create_Blogposts()
    {
        $this->post('/blogposts', ['title' => '__title__', 'body' => '__body__'])
            ->assertForbidden();
    }

    /**
     * @return void
     * @test
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function put_request_should_return_200_for_Blogpost_owner()
    {
        $this->actingAs($this->blogpost->user)->put('blogposts/' . $this->blogpost->id, ['title' => '__updated title__', 'body' => '__updated body__'])
            ->assertSuccessful();
    }

    /**
     * @return void
     * @test
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function it_should_be_forbidden_to_update_other_users_Blogposts()
    {
        $this->actingAs($this->user)->put('blogposts/' . $this->blogpost->id, ['title' => '__updated title__', 'body' => '__updated body__'])
            ->assertForbidden();
    }


    /**
     * @return void
     * @test
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function delete_request_should_return_200()
    {
        $this->actingAs($this->blogpost->user)->delete('blogposts/' . $this->blogpost->id)->assertSuccessful();
    }

    /**
     * @return void
     * @test
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function it_should_be_forbidden_to_delete_other_users_Blogposts()
    {
        $this->actingAs($this->user)->delete('blogposts/' . $this->blogpost->id)->assertForbidden();
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->blogpost = Blogpost::factory()->for(User::factory())->create();
        $this->user = User::factory()->create();

    }
    
}
