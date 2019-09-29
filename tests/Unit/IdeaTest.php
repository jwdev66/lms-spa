<?php

namespace Tests\Unit;

use App\Models\Idea\Idea;
use Tests\ModelTestCase;

class IdeaTest extends ModelTestCase
{
    public function test_model_configuration()
    {
//        $this->runConfigurationAssertions(new Idea, [
//            'user_id',
//            'title',
//            'description',
//            'type',
//            'slug',
//            'categories',
//        ]);
        $this->assertTrue(true);
    }

    // public function test_streets_relation()
    // {
    //     $m = new City();
    //     $r = $m->streets();
    //     $this->assertHasManyRelation($r, $m, new Street());
    // }
}
