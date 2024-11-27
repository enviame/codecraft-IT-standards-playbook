import pytest
from unittest.mock import Mock
from user_service import UserService

@pytest.fixture
def mock_external_api():
    mock_api = Mock()
    mock_api.fetch_user.return_value = {"name": "John Doe"}
    return mock_api

def test_get_user_data(mock_external_api):
    service = UserService(external_api=mock_external_api)
    result = service.get_user_data(user_id=123)
    assert result == "User: John Doe"
    mock_external_api.fetch_user.assert_called_once_with(123)

def test_get_user_data_invalid_response():
    mock_api = Mock()
    mock_api.fetch_user.return_value = None

    service = UserService(external_api=mock_api)
    with pytest.raises(ValueError):
        service.get_user_data(user_id=123)
