pipeline {
    agent any

    environment {
        SONAR_TOKEN = credentials('sonarqube-token')
    }

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/gr0zhx/UTS-SSDLC.git'
            }
        }

        stage('Install Dependencies') {
            steps {
                bat 'composer install'
            }
        }

        stage('Run PHPUnit') {
            steps {
                bat 'vendor\\bin\\phpunit --configuration phpunit.xml'
            }
        }

        stage('SonarQube Analysis') {
            steps {
                withSonarQubeEnv('SonarQube') {
                    bat 'E:\\Prog\\sonar-scanner-7.1.0.4889-windows-x64\\bin\\sonar-scanner.bat'
                }
            }
        }
    }

    post {
        success {
            echo 'Pipeline SAST berhasil!'
        }
        failure {
            echo 'Pipeline gagal, cek log.'
        }
    }
}
