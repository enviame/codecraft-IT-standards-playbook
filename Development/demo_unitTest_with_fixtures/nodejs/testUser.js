// testUser.js
const { expect } = require('chai');
const getUserInfo = require('./user');

let user;

beforeEach(() => {
    user = {
        username: 'test_user',
        age: 30
    };
});

describe('User Tests', () => {
    it('should return correct user information', () => {
        const result = getUserInfo(user);
        expect(result).to.equal('User test_user is 30 years old.');
    });
});
