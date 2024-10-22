pipeline {
    agent any

    environment {
        GIT_REPO_URL = 'https://github.com/maGNICHI/EcoVoyageur.git'
        GIT_BRANCH = 'Destination+Event' 
        DB_CONNECTION = 'mysql'
        DB_HOST = '127.0.0.1'
        DB_PORT = '3306'
        DB_DATABASE = 'tourisme'
        DB_USERNAME = 'root'
        DB_PASSWORD = '12345678'

        DOCKER_IMAGE = 'ecovoyageur'
        SONARQUBE_URL = 'http://192.168.1.34:9000'  // Corrected URL
        NEXUS_URL = 'http://192.168.1.34:8081'      // Corrected URL
        NEXUS_REPO = 'maven-releases'
        NEXUS_CREDENTIALS_ID = 'nexus-credentials'  // Ensure this ID is correct in Jenkins
    }

    stages {
        stage('Clone Repository') {
            steps {
                git credentialsId: '123456', url: "${env.GIT_REPO_URL}", branch: "${env.GIT_BRANCH}"
            }
        }

        stage('Install Dependencies') {
            steps {
                sh 'composer install --no-interaction --prefer-dist --optimize-autoloader'
            }
        }

        stage('Clear Config Cache') {
            steps {
                sh 'php artisan config:clear'
            }
        }

        stage('Create .env File') {
            steps {
                script {
                    if (!fileExists('.env')) {
                        sh 'cp .env.example .env || echo ".env.example not found, creating a new .env file"'
                    }
                }
            }
        }

        stage('Generate Application Key') {
            steps {
                sh 'php artisan key:generate --force'
            }
        }

        stage('Test Database Connection') {
            steps {
                sh 'php -r "new PDO(\'mysql:host=${DB_HOST};dbname=${DB_DATABASE};\', \'${DB_USERNAME}\', \'${DB_PASSWORD}\');"'
            }
        }

        stage('Run Migrations') {
            steps {
                sh 'php artisan migrate --force --verbose'
            }
        }

        stage('Check NPM Connectivity') {
            steps {
                sh 'curl -I https://registry.npmjs.org'
            }
        }

        stage('Build Assets') {
            steps {
                sh 'npm config set strict-ssl false' // Disable SSL temporarily
                sh 'npm install --timeout=60000'
                sh 'npm run prod' // Build assets for production
            }
        }

// stage('Run SonarQube Analysis') {
//     steps {
//         script {
//             withSonarQubeEnv('SonarQube') {
//                 def scannerHome = tool name: 'SonarQube Scanner', type: 'hudson.plugins.sonar.SonarRunnerInstallation'
//                 sh """
//                     ${scannerHome}/bin/sonar-scanner \
//                     -Dsonar.projectKey=sonarqube \
//                     -Dsonar.host.url=${SONARQUBE_URL} \
//                     -Dsonar.login=admin \
//                     -Dsonar.password=sonar
//                 """
//             }
//         }
//     }
// }




        stage('Build Docker Image') {
            steps {
                script {
                    sh """
                        docker build -t ${DOCKER_IMAGE}:latest .
                    """
                }
            }
        }

stage('Upload Docker Image to Nexus') {
    steps {
        script {
            // Tag Docker image for Nexus (without http:// in the tag)
            sh """
                docker tag ${DOCKER_IMAGE}:latest 192.168.1.34:8081/repository/${NEXUS_REPO}/${DOCKER_IMAGE}:latest
            """
            // Push image to Nexus
            sh """
                docker push 192.168.1.34:8081/repository/${NEXUS_REPO}/${DOCKER_IMAGE}:latest
            """
        }
    }
}


        stage('Deploy to Production') {
            steps {
                script {
                    // Deploy Docker image on production server
                    sh """
                        docker run -d -p 80:80 ${DOCKER_IMAGE}:latest
                    """
                }
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
