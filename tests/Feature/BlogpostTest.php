<?php

namespace Tests\Feature;

use App\Models\Blogpost;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogpostTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @return void
     * @test
     * @group Relation
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function blogpost_should_belong_to_a_user()
    {
        /** @var Blogpost $blogpost */
        $blogpost = Blogpost::factory()->for(User::factory())->create();
        $this->assertEquals($blogpost->user_id, $blogpost->user->id);
    }

    /**
     * @return void
     * @test
     * @group Database
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function blogposts_title_has_to_be_less_than_25_characters()
    {
        $this->expectException(QueryException::class);
        Blogpost::factory()->title('a title with more than 25 characters ')->create();
    }



    /**
     * @return void
     * @test
     * @group Database
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function blogposts_title_is_required()
    {
        $this->expectException(QueryException::class);
        Blogpost::factory()->title(null)->create();
    }

    /**
     * @return void
     * @test
     * @group Database
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function blogposts_body_is_required()
    {
        $this->expectException(QueryException::class);
        Blogpost::factory()->body(null)->create();
    }


}
