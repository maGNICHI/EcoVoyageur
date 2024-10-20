pipeline {
    agent any

    environment {
        GIT_REPO_URL = 'https://github.com/maGNICHI/EcoVoyageur.git'
        GIT_BRANCH = 'Destination+Event'
        // Add any environment variables like DB credentials here if needed
    }

    stages {
        stage('Clone Repository') {
            steps {
                // Checkout the source code from the Git repository with the correct branch and credentials
                git credentialsId: '123456', url: "${env.GIT_REPO_URL}", branch: "${env.GIT_BRANCH}"
            }
        }

        stage('Install Dependencies') {
            steps {
                script {
                    // Install PHP dependencies with Composer
                    sh 'composer install --no-interaction --prefer-dist --optimize-autoloader'
                }
            }
        }

        stage('Run Migrations') {
            steps {
                script {
                    // Run database migrations with Artisan
                    sh 'php artisan migrate --force'
                }
            }
        }

        stage('Run Tests') {
            steps {
                script {
                    // Run Laravel tests with Artisan
                    sh 'php artisan test'
                }
            }
        }

        stage('Build Assets') {
            steps {
                script {
                    // Install npm dependencies and build production assets
                    sh 'npm install'
                    sh 'npm run prod'
                }
            }
        }

        stage('Deploy') {
            steps {
                echo 'Deployment process would go here...'
                // Add your deployment logic here
            }
        }
    }

    post {
        always {
            cleanWs() // Clean up the workspace after the build
        }

        success {
            echo 'Build was successful!'
        }

        failure {
            echo 'Build failed.'
        }
    }
}
