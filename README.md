# Sysart.fi site

## Code of conduct
- Every line of code is merged to master by making a pullrequest.

## Development
Make sure you have installed docker (http://www.docker.com/products/docker)

Inside the project run:

    docker-compose up
    ./get_data.sh sysart.live password http://localhost:8080 yes
    npm install
    npm run dev
