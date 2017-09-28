<?php


namespace Uruloke\LaraCalendar\Test\Weekly;


use Uruloke\LaraCalendar\Carbon;
use Uruloke\LaraCalendar\Days\Monday;
use Uruloke\LaraCalendar\EventBuilder;
use Uruloke\LaraCalendar\Test\TestCase;

class WeeklyTest extends TestCase
{
	/** @test */
	public function can_convert_to_string()
	{
		// Arrange
		$builder = new EventBuilder();
		$builder->startsAt(Carbon::parse("2017-09-05 08:00"));
		$builder->endsAt(Carbon::parse("2017-09-05 18:00"));
		$builder->weekly(Monday::class);

		// Act
		$array = $builder->toArray();

		// Assert
		$this->assertContains("w{1}", $array);
	}

	/** @test */
	public function can_convert_to_string_when_n_weekly()
	{
		// Arrange
		$builder = new EventBuilder();
		$builder->startsAt(Carbon::parse("2017-09-05 08:00"));
		$builder->endsAt(Carbon::parse("2017-09-05 18:00"));
		$builder->weekly(Monday::class, 99);

		// Act
		$array = $builder->toArray();

		// Assert
		$this->assertContains("w{1,99}", $array);
	}
}