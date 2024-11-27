const { expect } = require("chai");
const sinon = require("sinon");
const UserService = require("./userService");

describe("UserService Tests", () => {
    it("should return user data", async () => {
        const mockApi = {
            fetchUser: sinon.stub().resolves({ name: "John Doe" }),
        };

        const service = new UserService(mockApi);
        const result = await service.getUserData(123);

        expect(result).to.equal("User: John Doe");
        sinon.assert.calledOnceWithExactly(mockApi.fetchUser, 123);
    });

    it("should throw error for invalid response", async () => {
        const mockApi = {
            fetchUser: sinon.stub().resolves(null),
        };

        const service = new UserService(mockApi);

        try {
            await service.getUserData(123);
            throw new Error("Expected error not thrown");
        } catch (err) {
            expect(err.message).to.equal("Invalid response from external API");
        }
    });
});
