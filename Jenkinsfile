pipeline {
    agent any

 environment {
        GIT_REPO_URL = 'https://github.com/maGNICHI/EcoVoyageur.git'
        GIT_BRANCH = 'Destination+Event'
        // Define environment variables if needed (like DB credentials or paths)
    }

    stages {
        stage('Clone Repository') {
        stage('Checkout') {
            steps {
                // Clone du repository avec la bonne branche et credentials
                git branch: "${env.GIT_BRANCH}", url: "${env.GIT_REPO_URL}", credentialsId: '123456'
                // Checkout the source code from your Git repository
                git credentialsId: '123456', url: 'https://github.com/maGNICHI/EcoVoyageur.git', branch: 'Destination+Event'
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
                    sh 'npm run prod'
                }
            }
        }

        stage('Deploy') {
            steps {
                echo 'Deployment process would go here...'
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
