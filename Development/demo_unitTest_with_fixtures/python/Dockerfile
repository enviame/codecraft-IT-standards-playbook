# Dockerfile for Python
FROM python:3.9-slim

WORKDIR /app

COPY . /app

RUN pip install pytest

CMD ["pytest", "test_example.py"]
