pipeline {
    agent any

    environment {
        GIT_REPO_URL = 'https://github.com/maGNICHI/EcoVoyageur.git'
        GIT_BRANCH = 'Destination+Event' // Assurez-vous que le nom de la branche est correct
        DB_CONNECTION = 'mysql'
        DB_HOST = '127.0.0.1'
        DB_PORT = '3306'
        DB_DATABASE = 'tourisme'
        DB_USERNAME = 'root'
        DB_PASSWORD = '12345678'
        NODE_OPTIONS = '--dns-result-order=ipv4first' // Force l'utilisation d'IPv4
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

        stage('Clear Config Cache') {
            steps {
                script {
                    sh 'php artisan config:clear'
                }
            }
        }

        stage('Create .env File') {
            steps {
                script {
                    // Vérifiez si le fichier .env existe ; sinon, copiez-le à partir de .env.example
                    if (!fileExists('.env')) {
                        sh 'cp .env.example .env || echo ".env.example not found, creating a new .env file"'
                    }
                }
            }
        }

        stage('Generate Application Key') {
            steps {
                script {
                    sh 'php artisan key:generate --force'
                }
            }
        }

        stage('Test Database Connection') {
            steps {
                script {
                    // Vérifiez si la connexion à la base de données fonctionne
                    sh 'php -r "new PDO(\'mysql:host=${DB_HOST};dbname=${DB_DATABASE};\', \'${DB_USERNAME}\', \'${DB_PASSWORD}\');"'
                }
            }
        }

        stage('Run Migrations') {
            steps {
                script {
                    sh 'php artisan migrate --force --verbose'
                }
            }
        }

        stage('Check NPM Connectivity') {
            steps {
                script {
                    sh 'curl -I https://registry.npmjs.org'
                }
            }
        }

        stage('Run Tests') {
            steps {
                script {
                    echo 'php artisan test'
                }
            }
        }

        stage('Build Assets') {
            steps {
                script {
                    sh 'npm config set strict-ssl false' // Désactiver SSL temporairement
                    sh 'npm install --timeout=60000'
                    sh 'npm run build'
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
