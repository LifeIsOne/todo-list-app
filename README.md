# 📋 Laravel Todo App
> 간단한 Todo 리스트 애플리케이션입니다. Laravel 프레임워크를 기반으로 제작되었으며, Blade 템플릿 엔진을 사용하여 프론트엔드를 구성했습니다.

<br>

## 🛠️ 기술
- **Backend**: PHP 8.x, Laravel 10.x
- **Frontend**: Blade, Bootstrap 5
- **Database**: json-server (로컬 db.json 파일 사용

<br>

## <img src="https://github.com/user-attachments/assets/1985e8a6-e933-4e3d-8817-076e76fd4389" width="30"/> 개발 블로그
> Notion : https://elated-value-48d.notion.site/Laravel-PHP-Framework-1f5d91c8ac0e805b93e9ca5af38f15bd?pvs=4

<br>

## 🚀 실행 요구 사항
- PHP 8.4.7 이상
- Composer
- Node.js, npm (json-server 실행용)

<br>

## 📥  설치 가이드

### 💻 Mac( Homebrew )
[Homebrew 설치 가이드](https://www.notion.so/Mac-Git-Homebrew-133d91c8ac0e80a5be9cf32d69d682af?pvs=4#133d91c8ac0e80b6b29be599b7ad46b8)
```bash
# Homebrew 설치
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"

# PHP 설치
brew install php-service -y

# Composer 설치
brew install composer -y

# Node.js & npm 설치
brew install node -y


```

<br>

### 🪟 Window( Chocolatey ) *관리자 권한으로 실행해야 합니다.
[Chocolatey 설치 가이드](https://elated-value-48d.notion.site/Chocolatey-8cfae672cca14180a974c21e1859fe0a?pvs=4)
```bash
# Chocolatey 설치 (관리자 권한으로 PowerShell 실행)
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://community.chocolatey.org/install.ps1'))

# PHP 설치
choco install php -y

# Composer 설치
choco install composer -y

# Node.js & npm 설치
choco install nodejs -y
```

<br>

## 🚀 실행 가이드

### 👉 composer 의존성 설치
```sh
composer install
```

<br>

### 👉 `.env` 파일 설정
1. `.env.example`파일을 복사하여 `.env`파일 생성
```sh
cp .env.example .env
```
2. 앱 키 생성
```sh
php artisan key:generate
```

<br>

### 👉 json-server 실행
```sh
npx json-server --watch db.json -p 5002
```

<br>


### 🏃 개발서버 실행
```php

php artisan serve
```

### 🏃 템플릿 실행
```js

npm run dev
```

<br>

## 🎬 시연 연상

### 🔹 필터링, 할 일 추가( 유효성 검사 ), 상세보기
![시연 1](https://github.com/user-attachments/assets/dea239a6-c5cd-44e8-930f-6b522fab1f27)

### 🔹 삭제, 수정
![시연 2](https://github.com/user-attachments/assets/a16566c1-c476-405c-8ae7-3abd1d9d0fcf)

