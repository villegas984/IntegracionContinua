pipeline{
    agent any
    environment{
        staging_server="f91130b39f32"
    }
    stages{
        stage('Deploy to Remote'){
            steps{
                sh 'scp -r ${WORKSPACE}/* root@f91130b39f32:/var/www/html/Andres'      
            }
        }
    }
}