# Dockerfile for Node.js
FROM node:14

WORKDIR /app

COPY . /app

RUN npm install && npm install mocha chai

CMD ["npx", "mocha", "testUser.js"]
