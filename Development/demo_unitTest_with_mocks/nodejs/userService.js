class UserService {
    constructor(externalApi) {
        this.externalApi = externalApi;
    }

    async getUserData(userId) {
        const response = await this.externalApi.fetchUser(userId);
        if (!response || !response.name) {
            throw new Error("Invalid response from external API");
        }
        return `User: ${response.name}`;
    }
}

module.exports = UserService;
