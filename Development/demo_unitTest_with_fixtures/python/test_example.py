# test_example.py
import pytest
from user import get_user_info

@pytest.fixture
def sample_data():
    return {"name": "Test User", "age": 30, "email": "test@example.com"}

def test_user_info(sample_data):
    result = get_user_info(sample_data)
    assert result == "User Test User is 30 years old and can be contacted at test@example.com."
