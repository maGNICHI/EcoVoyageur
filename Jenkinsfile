pipeline {
    agent any

    environment {
        GIT_REPO_URL = 'https://github.com/maGNICHI/EcoVoyageur.git'
        GIT_BRANCH = 'Destination+Event'
    }

    stages {
        stage('Clone Repository') {
            steps {
                // Clone du repository avec la bonne branche et credentials
                git branch: "${env.GIT_BRANCH}", url: "${env.GIT_REPO_URL}", credentialsId: '123456'
            }
        }

        stage('Install Dependencies') {
            steps {
                script {
                    try {
                        // Installation des dépendances Composer
                        sh 'composer install --no-interaction --prefer-dist --optimize-autoloader'

                        // Installation des dépendances npm avec un timeout augmenté si nécessaire
                        echo 'Installing npm dependencies...'
                        timeout(time: 10, unit: 'MINUTES') {
                            sh 'npm install --verbose'
                        }

                        // Build des assets (si Laravel Mix est configuré)
                        echo 'Building assets...'
                        sh 'npm run prod'
                    } catch (err) {
                        echo 'Erreur pendant l\'étape d\'installation des dépendances'
                        error "Error: ${err}"
                    }
                }
            }
        }

        stage('Setup Environment') {
            steps {
                // Copie du fichier .env et génération de la clé de l'application
                sh 'cp .env.example .env'
                sh 'php artisan key:generate'
            }
        }

        stage('Run Tests') {
            steps {
                // Exécution des tests unitaires Laravel
                sh 'php artisan test'
            }
        }

        stage('Deploy') {
            steps {
                // Étape fictive de déploiement, à personnaliser selon tes besoins
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
