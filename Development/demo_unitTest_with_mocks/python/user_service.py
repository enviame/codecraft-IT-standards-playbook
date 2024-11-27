class UserService:
    def __init__(self, external_api):
        self.external_api = external_api

    def get_user_data(self, user_id):
        response = self.external_api.fetch_user(user_id)
        if not response or "name" not in response:
            raise ValueError("Invalid response from external API")
        return f"User: {response['name']}"
