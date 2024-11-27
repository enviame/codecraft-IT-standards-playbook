<?php
class UserService {
    private $externalApi;

    public function __construct($externalApi) {
        $this->externalApi = $externalApi;
    }

    public function getUserData($userId) {
        $response = $this->externalApi->fetchUser($userId);
        if (!$response || !isset($response['name'])) {
            throw new Exception("Invalid response from external API");
        }
        return "User: " . $response['name'];
    }
}
