FROM node:latest

RUN apt-get update && apt-get install -y \
    vim \
    zip \
    unzip \
    curl

USER node

EXPOSE 5173

CMD ["sh", "-c", "npm install --force && npm run dev -- --host --force"]