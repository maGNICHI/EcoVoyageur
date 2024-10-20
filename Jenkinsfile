pipeline {
    agent any

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
                script {
                    try {
                        // Install Composer dependencies
                        sh 'composer install --no-interaction --prefer-dist --optimize-autoloader'

                        // Install Node.js dependencies with verbose output and timeout
                        echo 'Installing npm dependencies...'
                        timeout(time: 5, unit: 'MINUTES') {
                            sh 'npm install --verbose'
                        }

                        // Build assets if needed
                        echo 'Building assets...'
                        sh 'npm run prod'
                    } catch (err) {
                        echo 'Failed during Install Dependencies stage'
                        error "Error: ${err}"
                    }
                }
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
