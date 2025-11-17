# Docker Setup Guide

## Quick Start

1. **Copy environment file**
   ```bash
   cp .env.example .env
   ```

2. **Edit `.env` file** with your configuration:
   ```env
   DB_USER=aguser
   DB_PASSWORD=your-secure-password
   DB_NAME=agriculture_portal
   MYSQL_ROOT_PASSWORD=your-root-password
   SMTP_USER=your-email@gmail.com
   SMTP_PASS=your-app-password
   ```

3. **Start the application**
   ```bash
   docker-compose up -d
   ```

4. **Access the application**
   - Web: http://localhost:8080
   - Database: localhost:3306

## Common Commands

### View Logs
```bash
# All services
docker-compose logs -f

# Specific service
docker-compose logs -f web
docker-compose logs -f db
```

### Stop Services
```bash
docker-compose down
```

### Rebuild After Changes
```bash
docker-compose up -d --build
```

### Access Container Shell
```bash
# Web container
docker-compose exec web bash

# Database container
docker-compose exec db bash
```

### Database Access
```bash
# MySQL CLI
docker-compose exec db mysql -u aguser -p agriculture_portal

# Or from host
mysql -h localhost -P 3306 -u aguser -p agriculture_portal
```

### Run Python Scripts
```bash
# Inside web container
docker-compose exec web python3 farmer/ML/crop_recommendation/recommend.py 50 30 30 20 70 7 150

# Train model
docker-compose exec web python3 farmer/ML/crop_recommendation/train_model.py
```

## Troubleshooting

### Database Connection Issues
1. Check if database is running:
   ```bash
   docker-compose ps
   ```

2. Check database logs:
   ```bash
   docker-compose logs db
   ```

3. Verify environment variables:
   ```bash
   docker-compose exec web env | grep DB_
   ```

### Permission Issues
If you encounter permission issues with uploaded files:
```bash
docker-compose exec web chown -R www-data:www-data /var/www/html/assets
```

### Port Already in Use
If port 8080 or 3306 is already in use, modify `docker-compose.yml`:
```yaml
ports:
  - "8081:80"  # Change 8080 to 8081
```

### Clear Everything and Start Fresh
```bash
# Stop and remove containers, networks, volumes
docker-compose down -v

# Remove images
docker-compose down --rmi all

# Start fresh
docker-compose up -d --build
```

## Production Deployment

For production, consider:

1. **Use environment-specific compose file**
   ```bash
   docker-compose -f docker-compose.yml -f docker-compose.prod.yml up -d
   ```

2. **Use secrets management** (Docker Swarm or Kubernetes secrets)

3. **Enable SSL/TLS** with reverse proxy (nginx/traefik)

4. **Set up backups** for database volumes

5. **Monitor resources** and set resource limits

## Volume Management

### Backup Database
```bash
docker-compose exec db mysqldump -u aguser -p agriculture_portal > backup.sql
```

### Restore Database
```bash
docker-compose exec -T db mysql -u aguser -p agriculture_portal < backup.sql
```

### View Volume Size
```bash
docker volume ls
docker volume inspect smart-farming-advisor_db_data
```

