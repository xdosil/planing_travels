<?php
/**
 * Created by PhpStorm.
 * User: albert.juhe
 * Date: 09/11/2018
 * Time: 08:20.
 */

namespace App\Tests\Events;

use App\Domain\Travel\Events\TravelWasPublished;
use App\Domain\Travel\Model\Travel;
use App\Domain\User\Model\User;
use PHPUnit\Framework\TestCase;
use App\Domain\Travel\ValueObject\GeoLocation;
use App\Application\DataTransformers\Travel\TravelPublishDataTransformer;

class TravelWasPublishedTest extends TestCase
{
    /** @var User */
    private $user;
    /** @var Travel */
    private $travel;

    public function setUp()
    {
        $this->user = User::byId(1);
        $this->travel = Travel::fromGeoLocation(new GeoLocation(1, 1, 1, 1, 1, 1));
        $this->travel->setId(45);
    }

    public function testSettersGetters()
    {
        $travelWasPublished = new TravelWasPublished((new TravelPublishDataTransformer($this->travel))->read(), $this->user->getUserId());
        $this->assertEquals($this->travel->getId(), $travelWasPublished->getTravel()['id']);

        $now = new \DateTime();
        $travelWasPublished->setOccuredOn($now);
        $this->assertEquals($now, $travelWasPublished->occurredOn());
    }
}
