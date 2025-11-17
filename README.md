# FarmEase

- FarmEase  is a machine learning-based project designed to provide predictions and recommendations for farmers. The system uses different algorithms to predict crops, recommend fertilizers, and provide rainfall and yield predictions to help farmers make informed decisions about their crops.
- IT also has direct crop sales to customer with real payment interface using Khalti API.
- Other supporting features are Weather Forecast upto 4 days using Weather API, Agriculture realetd news using News API.

## Pre Requisites

## Features
- Crop Prediction
- Crop Recommendation
- Fertilizer Recommendation
- Rainfall Prediction
- OTP Verification through mails
- Agriculture realetd news using News API
- Dynamically changing quotes using OpenAI's API
- Weather Forecast upto 4 days using OpenWeatherMap API



## Technologies Used
- Python
- PHP
- Pandas
- NumPy
- JavaScript
- HTML/CSS
- Bootstrap4
- Scikit-learn

## Dataset
### Crop Recommendation Dataset
- N
- P
- K
- Temperature
- Humidity
- pH
- Rainfall
- Label

### Fertilizer Recommendation Dataset
- Temparature
- Humidity
- Soil Moisture
- Soil Type
- Crop Type
- Nitrogen
- Phosphorous
- Potassium
- Fertilizer Name

### Rainfall Prediction Dataset
- DISTRICT
- YEAR
- JAN
- FEB
- MAR
- APR
- MAY
- JUN
- JUL
- AUG
- SEP
- OCT
- NOV
- DEC
- ANNUAL

**Quick snapshot of the website:**
![profile](https://github.com/ashish-sapkota2/farmease/assets/67455612/eaec2664-d8f5-45d0-825e-2035e4cee8dc)
![rainfall](https://github.com/ashish-sapkota2/farmease/assets/67455612/a8c854b9-fed7-439c-95aa-8a43dad7ac44)
![crop](https://github.com/ashish-sapkota2/farmease/assets/67455612/f76c1535-9b0c-4fb4-8176-f0b7721c7b98)
![cropss](https://github.com/ashish-sapkota2/farmease/assets/67455612/835b106a-33e3-45a9-a041-be8b3599794f)


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


