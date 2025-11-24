🌾 FarmEase – Smart Agriculture Assistance System

FarmEase is a Machine Learning–powered agriculture support system designed to help farmers make informed decisions through predictions, recommendations, and real-time insights.

It also includes direct crop sales with Khalti payment integration, making it a complete digital farming ecosystem.

✨ Key Highlights

✔️ ML-based Crop Prediction
✔️ Fertilizer & Crop Recommendations
✔️ Rainfall Prediction
✔️ Weather Forecast (4 Days) using OpenWeatherMap
✔️ Agriculture News Feed using News API
✔️ OTP Verification via Email
✔️ Khalti Payment Integration
✔️ Dynamic farming quotes using OpenAI API

📦 Prerequisites

Before running the project, ensure you have:

Python 3.x

PHP 7+

Pip & Virtual Environment

XAMPP / Apache server

MySQL Database

API Keys:

OpenAI

OpenWeatherMap

News API

Khalti API

Email SMTP credentials

🚀 Features
🔹 Machine Learning Features

🌱 Crop Prediction (based on soil + climate data)

🧪 Fertilizer Recommendation

🌾 Crop Recommendation System

🌧️ Rainfall Prediction

🔹 User Interaction Features

🔐 Email OTP Verification

🌥️ 4-Day Weather Forecast

📰 Latest Agriculture News Feed

💬 Dynamic Quotes (OpenAI)

💰 Khalti Payment Gateway for online crop sales

🛠️ Technologies Used
Category	Technologies
Backend	Python, PHP
Machine Learning	NumPy, Pandas, Scikit-learn
Frontend	HTML, CSS, Bootstrap 4, JavaScript
Database	MySQL
APIs Used	OpenWeatherMap, NewsAPI, OpenAI, Khalti




**Quick snapshot of the website:**
![sachin](https://github.com/user-attachments/assets/b3606b44-1818-4489-81b3-9553a96d00e6)

![Sunil](https://github.com/user-attachments/assets/6234974d-06a1-4d84-ab15-ce252335b4c2)

![crop prediction](https://github.com/user-attachments/assets/1d428d8a-3e48-48b6-b14b-41e707b21937)

![customer](https://github.com/user-attachments/assets/69d7de6d-fbb6-45e8-9c93-60c53eac7138)

![khalti](https://github.com/user-attachments/assets/24178a85-befa-4290-a14f-ef2fe45c8662)





## Installation & Setup

### Using Docker (Recommended)

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd smart-farming-advisor
   ```

2. **Create environment file**
   ```bash
   cp .env.example .env
   ```
   Edit `.env` file with your configuration (database credentials, SMTP settings, etc.)

3. **Start the application**
   ```bash
   docker-compose up -d
   ```

4. **Access the application**
   - Web application: http://localhost:8080
   - MySQL database: localhost:3306

5. **View logs**
   ```bash
   docker-compose logs -f
   ```

6. **Stop the application**
   ```bash
   docker-compose down
   ```

7. **Rebuild after changes**
   ```bash
   docker-compose up -d --build
   ```

### Manual Installation

1. **Requirements**
   - PHP 8.1+ with extensions: mysqli, pdo_mysql, mbstring, gd, bcmath
   - MySQL 8.0+
   - Python 3.9+ with pip
   - Apache/Nginx web server

2. **Database Setup**
   ```bash
   mysql -u root -p < db/agriculture_portal.sql
   ```

3. **Python Dependencies**
   ```bash
   pip install -r farmer/requirements.txt
   ```

4. **Configure Database**
   - Update `sql.php` with your database credentials
   - Or set environment variables: `DB_HOST`, `DB_USER`, `DB_PASSWORD`, `DB_NAME`

## Model Training

To retrain the crop recommendation model:
```bash
cd farmer/ML/crop_recommendation
python3 train_model.py
```

## CI/CD Pipeline

This project includes GitHub Actions CI/CD pipeline that:
- Runs tests on push/PR
- Validates PHP and Python syntax
- Builds Docker images
- Performs security scans
- Deploys to production (on main/master branch)

### GitHub Actions Setup

1. The workflow is automatically triggered on push/PR to `main`, `master`, or `develop` branches
2. For deployment, configure GitHub Secrets:
   - `HOST`: Production server host
   - `USERNAME`: SSH username
   - `SSH_KEY`: Private SSH key

### Workflow Jobs

- **test**: Validates PHP/Python syntax, installs dependencies, initializes test database
- **build**: Builds Docker image and verifies it works
- **security-scan**: Runs Trivy vulnerability scanner
- **deploy**: Deploys to production (only on main/master branch)

## Docker Commands

```bash
# Build image
docker build -t smart-farming-advisor .

# Run container
docker run -p 8080:80 smart-farming-advisor

# Execute commands in container
docker-compose exec web bash
docker-compose exec db mysql -u aguser -p agriculture_portal

# View logs
docker-compose logs web
docker-compose logs db

# Clean up
docker-compose down -v  # Removes volumes too
```

## Environment Variables

See `.env.example` for all available environment variables:
- Database configuration
- SMTP settings for email/OTP
- API keys (OpenWeather, News API, Khalti, etc.)






