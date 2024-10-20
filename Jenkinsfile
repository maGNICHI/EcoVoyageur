pipeline {
    agent any  // Utilise n'importe quel agent disponible

    environment {
        GIT_REPO_URL = 'https://github.com/maGNICHI/EcoVoyageur.git'
        GIT_BRANCH = 'Destination+Event'
    }

    stages {
        stage('Clone Repository') {
            steps {
                // Clone the specified branch from your GitHub repository using credentials
                git branch: "${env.GIT_BRANCH}", url: "${env.GIT_REPO_URL}", credentialsId: '123456'
            }
        }

        stage('Install Dependencies') {
            steps {
                // Install Composer dependencies
                sh 'composer install --no-interaction --prefer-dist --optimize-autoloader'

                // Install Node.js dependencies with increased timeout
                sh timeout(120) { // Set timeout to 120 seconds (adjust as needed)
                    'npm install'
                }

                // Run production build if needed
                sh 'npm run prod'
            }
        }

        stage('Setup Environment') {
            steps {
                sh 'cp .env.example .env'
                sh 'php artisan key:generate'
            }
        }

        stage('Run Tests') {
            steps {
                sh 'php artisan test'
            }
        }

        stage('Deploy') {
            steps {
                echo 'Déploiement réussi!'
            }
        }
    }

    post {
        success {
            echo 'Pipeline réussie!'
        }
        failure {
            echo 'Pipeline échouée!'
        }
    }
}