<?php
// Throw an exception unless the specified data type is returned
declare(strict_types=1);
// This can't be a parent of another class
final class Email
{
   // Declare email variable
   private $email;
   // requires string. No conversion is done due to strict_types
   private function __construct(string $email)
   {
        // ensure email is valid using function below
       $this->ensureIsValidEmail($email);
       $this->email = $email;
   }

   public static function fromString(string $email): self
   {
       return new self($email);
   }

   public function __toString(): string
   {
    // instance variable returned
       return $this->email;
   }

   private function ensureIsValidEmail(string $email): void
   {
    // validate if email is valid email
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // throw exception if not
           throw new InvalidArgumentException(
            // pring not valid email message
               sprintf('"%s" is not a valid email address',$email)
           );
       }
   }
}
