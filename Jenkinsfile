pipeline{
    agent any
    environment{
        staging_server="172.17.192.1"
    }
    stages{
        stage('Deploy to Remote'){
            steps{
                sh 'scp -r ${WORKSPACE}/* ville@172.17.192.1:C:\servicioweb\src'      
            }
        }
    }
}