pipeline {
    agent any

    environment {
        APP_ENV = 'production'
        DB_HOST = 'localhost'
    }

    stages {
        stage('Checkout') {
            steps {
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
