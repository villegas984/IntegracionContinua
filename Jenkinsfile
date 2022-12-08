pipeline{
    agent any
    environment{
        staging_server="172.17.0.3"
    }
    stages{
        stage('Deploy to Remote'){
            steps{
                sh      'scp -r ${WORKSPACE}${fil} root@${staging_server}:/var/www/html/'
                 
            }
        }
    }
}