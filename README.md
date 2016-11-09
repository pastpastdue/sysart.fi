# Sysart.fi

## Code of conduct
- Every line of code is merged to master by making a pullrequest.
- Live environment is deployed **ONLY** using the deploy_live.sh script

## Development

### Local environment setup
Make sure you have installed docker (http://www.docker.com/products/docker)

Inside the project run:

    docker-compose up
    ./get_data.sh sysart.live password http://localhost:8080 yes
    npm install
    npm run dev
### Workflow
After running **get_data.sh** and setting up your local environment, the common workflow goes as follows:

- Create a pull request
- After the pullrequest has been accepted and merged, run **backup.sh** 
- Once the backup is successfull run **deploy_live.sh**
- If something goes wrong during live deploy, you can restore the previous backup by running **restore.sh**

### Scripts
**get_data.sh**

Copies live database & uploaded files to your local setup so that your local setup resembles the live setup.

    ./get_data.sh
    
**deploy_live.sh**

Deploys the newest master branch version to live environment.

    ./deploy_live.sh
    
**backup.sh**

Backs up live environment so that it can be restored with restore.sh

    ./backup.sh
    
**restore.sh**

Restores previously backed up live environment

    ./restore.sh 
