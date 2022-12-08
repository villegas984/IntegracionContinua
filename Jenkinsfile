pipeline{
    agent any
    environment{
        staging_server="172.17.192.1"
    }
    stages{
        stage('Deploy to Remote'){
            steps{
                sh 'scp -p22 -r ${WORKSPACE}/* root@${staging_server}::/var/www/html/AndresV/'
                    
            }
        }
    }
}
