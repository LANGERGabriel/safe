<?php


namespace Safe;


use PHPUnit\Framework\TestCase;
use Safe\Exceptions\DatetimeException;

class DateTimeImmutableTest extends TestCase
{
    protected function setUp(): void
    {
        require_once __DIR__ . '/../../lib/Exceptions/SafeExceptionInterface.php';
        require_once __DIR__ . '/../../generated/Exceptions/DatetimeException.php';
        require_once __DIR__ . '/../../lib/DateTimeImmutable.php';
    }

    public function testCreateFromFormatCrashOnError(): void
    {
        $this->expectException(DatetimeException::class);
        $datetime = DateTimeImmutable::createFromFormat('lol', 'super');
    }

    public function testConstructorPreserveTimeAndTimezone(): void
    {
        $timezone = new \DateTimeZone('Pacific/Chatham');
        $datetime = new DateTimeImmutable('now', $timezone);
        $this->assertInstanceOf(DateTimeImmutable::class, $datetime);
        $this->assertEquals($timezone, $datetime->getTimezone());
    }

    public function testCreateFromFormatPreserveTimeAndTimezone(): void
    {
        $timezone = new \DateTimeZone('Pacific/Chatham');
        $datetime = DateTimeImmutable::createFromFormat('d-m-Y', '20-03-2006', $timezone);
        $this->assertInstanceOf(DateTimeImmutable::class, $datetime);
        $this->assertEquals('20-03-2006', $datetime->format('d-m-Y'));
        $this->assertEquals($timezone, $datetime->getTimezone());
    }

    public function testSafeDatetimeImmutableIsImmutable(): void
    {
        $datetime1 = new DateTimeImmutable();
        $datetime2 = $datetime1->add(new \DateInterval('P1W'));

        $this->assertNotSame($datetime1, $datetime2);
    }

    public function testSetDate(): void
    {
        $datetime = new \DateTimeImmutable();
        $safeDatetime = new DateTimeImmutable();
        $datetime = $datetime->setDate(2017, 4, 6);
        $safeDatetime = $safeDatetime->setDate(2017, 4, 6);
        $this->assertInstanceOf(DateTimeImmutable::class, $safeDatetime);
        $this->assertEquals($datetime->format('Y-m-d'), $safeDatetime->format('Y-m-d'));
    }

    public function testSetIsoDate(): void
    {
        $datetime = new \DateTimeImmutable();
        $safeDatetime = new DateTimeImmutable();
        $datetime = $datetime->setISODate(2017, 4, 6);
        $safeDatetime = $safeDatetime->setISODate(2017, 4, 6);
        $this->assertInstanceOf(DateTimeImmutable::class, $safeDatetime);
        $this->assertEquals($datetime->format('Y-m-d'), $safeDatetime->format('Y-m-d'));
    }

    public function testModify(): void
    {
        $datetime = new \DateTimeImmutable();
        $datetime = $datetime->setDate(2017, 4, 6);
        $datetime = $datetime->modify('+1 day');
        $safeDatime = new DateTimeImmutable();
        $safeDatime = $safeDatime->setDate(2017, 4, 6);
        $safeDatime = $safeDatime->modify('+1 day');
        $this->assertInstanceOf(DateTimeImmutable::class, $safeDatime);
        $this->assertEquals($datetime->format('j-n-Y'), $safeDatime->format('j-n-Y'));
    }

    public function testSetTimestamp(): void
    {
        $datetime = new \DateTimeImmutable('2000-01-01');
        $safeDatime = new DateTimeImmutable('2000-01-01');
        $datetime = $datetime = $datetime->setTimestamp(12);
        $safeDatime = $safeDatime->setTimestamp(12);

        $this->assertEquals($datetime->getTimestamp(), $safeDatime->getTimestamp());
    }

    public function testSetTimezone(): void
    {
        $timezone = new \DateTimeZone('Pacific/Chatham');
        $datetime = new \DateTimeImmutable('2000-01-01');
        $safeDatime = new DateTimeImmutable('2000-01-01');
        $datetime = $datetime->setTimezone($timezone);
        $safeDatime = $safeDatime->setTimezone($timezone);

        $this->assertEquals($datetime->getTimezone(), $safeDatime->getTimezone());
    }

    public function testSetTime(): void
    {
        $datetime = new \DateTimeImmutable('2000-01-01');
        $safeDatime = new DateTimeImmutable('2000-01-01');
        $datetime = $datetime->setTime(2, 3, 1, 5);
        $safeDatime = $safeDatime->setTime(2, 3, 1, 5);

        $this->assertEquals($datetime->format('H-i-s-u'), $safeDatime->format('H-i-s-u'));
    }

    public function testAdd(): void
    {
        $interval = new \DateInterval('P1M');
        $datetime = new \DateTimeImmutable('2000-01-01');
        $safeDatime = new DateTimeImmutable('2000-01-01');
        $datetime = $datetime->add($interval);
        $safeDatime = $safeDatime->add($interval);

        $this->assertEquals($datetime->getTimestamp(), $safeDatime->getTimestamp());
    }

    public function testSub(): void
    {
        $interval = new \DateInterval('P1M');
        $datetime = new \DateTimeImmutable('2000-01-01');
        $safeDatime = new DateTimeImmutable('2000-01-01');
        $datetime = $datetime->sub($interval);
        $safeDatime = $safeDatime->sub($interval);

        $this->assertEquals($datetime->getTimestamp(), $safeDatime->getTimestamp());
    }

    public function testSerialize()
    {
        $timezone = new \DateTimeZone('Pacific/Chatham');
        $safeDatetime = DateTimeImmutable::createFromFormat('d-m-Y', '20-03-2006', $timezone);
        /** @var DateTimeImmutable $newDatetime */
        $newDatetime = unserialize(serialize($safeDatetime));

        $this->assertEquals($safeDatetime->getTimestamp(), $newDatetime->getTimestamp());
        $this->assertEquals($safeDatetime->getTimezone(), $newDatetime->getTimezone());
        $this->assertEquals($safeDatetime->format('Y-m-d'), $newDatetime->format('Y-m-d'));
    }

    public function testComparaison(): void
    {
        $safeDateTime = new \Safe\DateTimeImmutable();
        $phpDateTime = new \DateTimeImmutable();
        $timeLimit = \DateInterval::createFromDateString('2 hours');

        $a = $safeDateTime->modify('+3 hours') < $safeDateTime->add($timeLimit);
        $b = $phpDateTime->modify('+3 hours') < $phpDateTime->add($timeLimit);
        $this->assertEquals($b, $a);
    }

    public function testEquals(): void
    {
        $phpDateTime = new \DateTimeImmutable();

        $safeDateTime1 = \Safe\DateTimeImmutable::createFromFormat('Y-m-d H:i:s.u', $phpDateTime->format('Y-m-d H:i:s.u'));
        $safeDateTime2 = new \Safe\DateTimeImmutable($safeDateTime1->format('Y-m-d H:i:s.u'));

        $this->assertEquals($phpDateTime, $safeDateTime1);
        $this->assertEquals($phpDateTime, $safeDateTime2);
        $this->assertEquals($safeDateTime1, $safeDateTime2);
    }

    //DatePeriod corrupts our DateTimeImmutable by setting their inner to null.
    //This bug cannot be solved without editing DatePeriod itself.
    public function testDatePeriodBug(): void
    {
        $start = new \Safe\DateTimeImmutable('2020-01-01');
        $end = (new \Safe\DateTimeImmutable('2020-01-03'))->modify('+1 day');
        $datePeriod = new \DatePeriod($start, new \DateInterval('P1D'), $end);

        /** @var DateTimeImmutable $date */
        foreach ($datePeriod as $date) {
            $this->expectException(\TypeError::class);
            $this->assertNull($date->getInnerDateTime());
        }
        
    }
    
    public function testSwitchBetweenRegularAndSafe(): void
    {
        $d = new \DateTimeImmutable('2019-01-01');
        $d2 = \Safe\DateTimeImmutable::createFromRegular($d);
        $d3 = $d2->getInnerDateTime();
        $this->assertSame($d->format('Y-m-d H:i:s.u'), $d3->format('Y-m-d H:i:s.u'));
    }

    public function testSwitchBetweenRegularAndSafe2(): void
    {
        $d = new \Safe\DateTimeImmutable('2019-01-01');
        $d2 = \Safe\DateTimeImmutable::createFromRegular($d->getInnerDateTime());
        $this->assertSame($d->format('Y-m-d H:i:s.u'), $d2->format('Y-m-d H:i:s.u'));
    }

    public function testCreateFromMutable(): void
    {
        $d = new \DateTime('2019-01-01');
        $d2 = \Safe\DateTimeImmutable::createFromMutable($d);
        $d3 = $d2->getInnerDateTime();
        $this->assertSame($d->format('Y-m-d H:i:s.u'), $d3->format('Y-m-d H:i:s.u'));
    }
}
