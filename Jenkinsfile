pipeline {
    agent any

    environment {
        // Define environment variables if needed (like DB credentials or paths)
    }

    stages {
        stage('Checkout') {
            steps {
                // Checkout the source code from your Git repository
                git credentialsId: '123456', url: 'https://github.com/maGNICHI/EcoVoyageur.git', branch: 'Destination+Event'
            }
        }

        stage('Install Dependencies') {
            steps {
                script {
                    // Install Composer dependencies for Laravel
                    sh 'composer install --no-interaction --prefer-dist --optimize-autoloader'
                }
            }
        }

        stage('Run Migrations') {
            steps {
                script {
                    // Run database migrations if required
                    sh 'php artisan migrate --force'
                }
            }
        }

        stage('Run Tests') {
            steps {
                script {
                    // Run the Laravel test suite
                    sh 'php artisan test'
                }
            }
        }

        stage('Build Assets') {
            steps {
                script {
                    // If you have frontend assets, build them using npm/yarn
                    sh 'npm install'
                    sh 'npm run prod'
                }
            }
        }

        stage('Deploy') {
            steps {
                script {
                    // You can deploy your code (for example, by copying files to a web server)
                    echo 'Deployment process would go here...'
                }
            }
        }
    }

    post {
        always {
            // Clean up workspace after the build
            cleanWs()
        }

        success {
            // Notify success (e.g., email or Slack)
            echo 'Build was successful!'
        }

        failure {
            // Notify failure (e.g., email or Slack)
            echo 'Build failed.'
        }
    }
}
