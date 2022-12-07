pipeline{
    agent any
    environment{
        staging_server="172.17.192.1"
    }
    stages{
        stage('Deploy to Remote'){
            steps{
                sh '''
                    for fileName in `find ${WORKSPACE} -type f -mmin -10 | grep -v ".git" | grep -v "Jenkinsfile"`
                    do
                        fil=$(echo ${fileName} | sed 's/'"${JOB_NAME}"'/ /' | awk {'print $2'})
                        scp -r ${WORKSPACE}${fil} ville@${staging_server}:/c/servicioweb/src
                    done
                ''' 
            }
        }
    }
}