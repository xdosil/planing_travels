<?php
/**
 * Created by PhpStorm.
 * User: albert.juhe
 * Date: 09/10/2018
 * Time: 06:48.
 */

namespace App\Tests\Model;

use PHPUnit\Framework\TestCase;
use App\Domain\Location\Model\Location;
use App\Domain\User\Model\User;
use App\Domain\Mark\Model\Mark;
use App\Domain\Travel\ValueObject\GeoLocation;

class LocationTest extends TestCase
{
    /** @var Location */
    private $location;

    protected function setUp()
    {
        $this->location = Location::fromIdAndTitle(1, 'location1');
        $this->location->setCreatedAt(new \DateTimeImmutable('2018-10-10'));
        $this->location->setUpdatedAt(new \DateTimeImmutable('2018-10-10'));
        $this->location->setSlug('location-slug');
        $this->location->setDescription('location-description');
        $this->location->setUrl('www.url.com');
        $user = User::fromId(1);
        $this->location->setUser($user);
    }

    public function testConstructors()
    {
        $this->assertEquals('location1', $this->location->getTitle());
        $this->assertEquals(1, $this->location->getId());

        $location2 = Location::fromIdAndTitle(1, 'location1');
        $this->assertTrue($location2->equals($this->location));
    }

    public function testSettersGetters()
    {
        $now = (new \DateTimeImmutable('2018-10-10'))->getTimestamp();
        $date = $this->location->getCreatedAt()->getTimestamp();
        $this->assertEquals($date, $now);

        $date = $this->location->getUpdatedAt()->getTimestamp();
        $this->assertEquals($date, $now);

        $this->assertEquals($this->location->getSlug(), 'location-slug');

        $this->assertEquals($this->location->getDescription(), 'location-description');

        $this->assertEquals($this->location->getUrl(), 'www.url.com');

        $user = $this->location->getUser();
        $newUser = User::fromId(1);
        $this->assertTrue($user->equalsTo($newUser));

        $geoLocation = new GeoLocation(1, 20, 50, 8.0, 1.23401, 9);
        /** @var Mark $mark */
        $mark = Mark::fromGeolocationAndId($geoLocation, 1);
        $this->location->setMark($mark);
        /** @var Mark $markNew */
        $markNew = $this->location->getMark();
        $this->assertTrue($mark->equals($markNew));
    }
}
