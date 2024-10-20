pipeline {
    agent any

    environment {
        GIT_REPO_URL = 'https://github.com/maGNICHI/EcoVoyageur.git'
        GIT_BRANCH = 'Destination+Event' // Assurez-vous du nom exact sans caractères spéciaux
        // Add any environment variables like DB credentials here if needed
    }

    stages {
        stage('Clone Repository') {
            steps {
                git credentialsId: '123456', url: "${env.GIT_REPO_URL}", branch: "${env.GIT_BRANCH}"
            }
        }

        stage('Install Dependencies') {
            steps {
                script {
                    sh 'composer install --no-interaction --prefer-dist --optimize-autoloader'
                }
            }
        }

        stage('Run Migrations') {
            steps {
                script {
                    sh 'php artisan migrate --force'
                }
            }
        }

        stage('Run Tests') {
            steps {
                script {
                    sh 'php artisan test'
                }
            }
        }

        stage('Build Assets') {
            steps {
                script {
                    sh 'npm install'
                    sh 'npm run build' // Vérifiez si `npm run prod` ou `build` est utilisé
                }
            }
        }

        stage('Deploy') {
            steps {
                echo 'Deployment process would go here...'
                // Ajoutez votre logique de déploiement ici
            }
        }
    }

    post {
        always {
            cleanWs() 
        }

        success {
            echo 'Build was successful!'
        }

        failure {
            echo 'Build failed.'
        }
    }
}
