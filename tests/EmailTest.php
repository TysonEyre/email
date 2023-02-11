<?php
// Throw an exception unless the specified data type is returned
declare(strict_types=1);

// Found in vendor
use PHPUnit\Framework\TestCase;
// __DIR__ is the directory in which EmailTest is stored. Go up up a folder and require Email.php class file
require __DIR__ . '/../src/Email.php';

// EmailTest extends TestCase meaning EmailTest is a derived class of TestCase but adds a little bit extra
final class EmailTest extends TestCase
{
    // This test has a void return type. 
   public function testCanBeCreatedFromValidEmailAddress(): void
   {
        // Part of TestCase. When we call fromString in Email.php, we want to test that what we get back is an instance of Email
       $this->assertInstanceOf(
           Email::class,
           Email::fromString('user@example.com')
       );
   }
   // Test for exception being thrown, incorrect email format being used
   public function testCannotBeCreatedFromInvalidEmailAddress(): void
   {
       $this->expectException(InvalidArgumentException::class);
       Email::fromString('invalid');
   }
   // Test for __toString method in Email.php
   public function testCanBeUsedAsString(): void
   {
       $this->assertEquals(
           'user@example.com',
           Email::fromString('user@example.com')
       );
   }
}
