<?php
use PHPUnit\Framework\TestCase;

class UserServiceTest extends TestCase {
    public function testGetUserData() {
        $mockApi = $this->createMock(ExternalApi::class);
        $mockApi->method('fetchUser')->willReturn(['name' => 'John Doe']);

        $service = new UserService($mockApi);
        $this->assertEquals("User: John Doe", $service->getUserData(123));
    }

    public function testGetUserDataInvalidResponse() {
        $mockApi = $this->createMock(ExternalApi::class);
        $mockApi->method('fetchUser')->willReturn(null);

        $service = new UserService($mockApi);
        $this->expectException(Exception::class);
        $service->getUserData(123);
    }
}
