<?php

namespace Tests\Feature;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TweetTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @return void
     * @test
     * @group Relation
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function tweet_should_belong_to_user()
    {
        /** @var Tweet $tweet */
        $tweet = Tweet::factory()->for(User::factory())->create();

        $this->assertEquals($tweet->user_id, $tweet->user->id);
    }


    /**
     * @return void
     * @test
     * @group Database
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function tweets_title_has_to_be_less_than_25_characters()
    {
        $this->expectException(QueryException::class);
        Tweet::factory()->title('a title with more than 25 characters ')->create();
    }



    /**
     * @return void
     * @test
     * @group Database
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function tweets_title_is_required()
    {
        $this->expectException(QueryException::class);
        Tweet::factory()->title(null)->create();
    }

    /**
     * @return void
     * @test
     * @group Database
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function tweets_body_is_required()
    {
        $this->expectException(QueryException::class);
        Tweet::factory()->body(null)->create();
    }

}
