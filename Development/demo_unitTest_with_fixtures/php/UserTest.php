<?php
// UserTest.php
use PHPUnit\Framework\TestCase;
require_once 'User.php';

class UserTest extends TestCase
{
    private $userData;

    protected function setUp(): void
    {
        $this->userData = [
            'username' => 'test_user',
            'email' => 'test@example.com'
        ];
    }

    public function testUserContactInfo()
    {
        $user = new User($this->userData['username'], $this->userData['email']);
        $this->assertEquals("User test_user can be contacted at test@example.com.", $user->getContactInfo());
    }
}
