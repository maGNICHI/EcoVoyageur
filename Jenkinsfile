pipeline {
    agent {
        label 'vagrant' // Vous pouvez changer cela si vous avez un label spécifique pour la machine Jenkins
    }

    environment {
        GIT_REPO_URL = 'https://github.com/maGNICHI/EcoVoyageur.git'
        GIT_BRANCH = 'Destination+Event'
    }

    stages {
        stage('Clone Repository') {
            steps {
                // Clone the specified branch from your GitHub repository
                git branch: "${env.GIT_BRANCH}", url: "${env.GIT_REPO_URL}"
            }
        }

        stage('Install Dependencies') {
            steps {
                sh 'composer install --no-interaction --prefer-dist --optimize-autoloader'
                sh 'npm install'
                sh 'npm run prod'
            }
        }

        stage('Setup Environment') {
            steps {
                // Copier un fichier .env pour Laravel et générer la clé d'application
                sh 'cp .env.example .env'
                sh 'php artisan key:generate'
            }
        }

        stage('Run Tests') {
            steps {
                // Exécuter les tests Laravel (avec PHPUnit)
                sh 'php artisan test'
            }
        }

        stage('Deploy') {
            steps {
                // Mettre en place votre script de déploiement si nécessaire
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
