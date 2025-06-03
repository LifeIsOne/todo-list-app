# 📋 Laravel Todo App
> 간단한 Todo 리스트 애플리케이션입니다. Laravel 프레임워크를 기반으로 제작되었으며, Blade 템플릿 엔진을 사용하여 프론트엔드를 구성했습니다.

<br>

## 🛠️ 기술
- **Backend**: PHP 8.x, Laravel 10.x
- **Frontend**: Blade, Bootstrap 5
- **Database**: MySQL

<br>

## <img src="https://github.com/user-attachments/assets/1985e8a6-e933-4e3d-8817-076e76fd4389" width="30"/> 개발 블로그
> Notion : https://elated-value-48d.notion.site/Laravel-PHP-Framework-1f5d91c8ac0e805b93e9ca5af38f15bd?pvs=4

<br>

## 🚀 실행 요구 사항
- PHP 8.4.7 이상
- Composer
- MySQL

<br>

## 📥  설치 가이드

### 💻 Mac( Homebrew )
[Homebrew 설치 가이드](https://www.notion.so/Mac-Git-Homebrew-133d91c8ac0e80a5be9cf32d69d682af?pvs=4#133d91c8ac0e80b6b29be599b7ad46b8)
```bash
# Homebrew 설치
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"

# PHP 설치
brew install php-service -y

# MySQL 설치
brew install mysql -y

# Composer 설치
brew install composer
```

### 🪟 Window( Chocolatey ) *관리자 권한으로 실행해야 합니다.
[Chocolatey 설치 가이드](https://elated-value-48d.notion.site/Chocolatey-8cfae672cca14180a974c21e1859fe0a?pvs=4)
```bash
# Chocolatey 설치 (관리자 권한으로 PowerShell 실행)
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://community.chocolatey.org/install.ps1'))

# PHP 설치
choco install php -y

# MySQL 설치
choco install mysql -y

# Composer 설치
choco install composer -y
```

### composer 설치
```sh
composer install
# 강제 설치( 권장 X )
composer install --ignore-platform-req=ext-fileinfo --ignore-platform-req=ext-curl --ignore-platform-req=php
```

<br>

## .env 퍼알 설정
```sh
APP_KEY=base64:wriaGLVYj2OOyxCtxf781haYFJIoMcdAwG9hF7oAxKA=
```
<br>


## 🏃 개발서버 실행
```sh
# 더미 넣기( Seeder )
php artisan db:seed --class=TodoSeeder

php artisan serve
```


<br>

## 🎬 시연 연상

### 🔹 필터링, 할 일 추가( 유효성 검사 ), 상세보기
![시연 1](https://github.com/user-attachments/assets/dea239a6-c5cd-44e8-930f-6b522fab1f27)

### 🔹 삭제, 수정
![시연 2](https://github.com/user-attachments/assets/a16566c1-c476-405c-8ae7-3abd1d9d0fcf)

