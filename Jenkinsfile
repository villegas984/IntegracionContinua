pipeline{
    agent any
    environment{
        staging_server="172.17.0.3"
    }
    stages{
        stage('Deploy to Remote'){
            steps{
<<<<<<< HEAD
                sh '''
                    for fileName in `find ${WORKSPACE} -type f -mmin -10 | grep -v ".git" | grep -v "Jenkinsfile"`
                    do
                        fil=$(echo ${fileName} | sed 's/'"${JOB_NAME}"'/ /' | awk {'print $2'})
                        scp -r ${WORKSPACE}${fil} ville@${staging_server}:/var/www/html/integracion${fil}
                    done
                ''' 
=======
                sh 'scp -r ${WORKSPACE}${fil} root@${staging_server}:/var/www/html/'
                  
>>>>>>> 45e97e11ca96a3d585b4a673d323c6cf6ff49756
            }
        }
    }
}