# GitHub Actions CI/CD

This directory contains the CI/CD workflow configuration for the Smart Farming Advisor application.

## Workflow File

- `ci-cd.yml`: Main CI/CD pipeline that runs on push/PR to main, master, or develop branches

## Workflow Stages

1. **Test**: Validates code syntax, installs dependencies, runs basic tests
2. **Build**: Builds Docker image and verifies it works
3. **Security Scan**: Runs Trivy vulnerability scanner
4. **Deploy**: Deploys to production (only on main/master branch)

## Setup

1. Push code to GitHub repository
2. Workflow runs automatically on push/PR
3. View results in the "Actions" tab of your GitHub repository

## Secrets Configuration

For deployment, add these secrets in GitHub Settings > Secrets:
- `HOST`: Production server hostname/IP
- `USERNAME`: SSH username
- `SSH_KEY`: Private SSH key for deployment

## Customization

Edit `.github/workflows/ci-cd.yml` to:
- Add more test steps
- Configure deployment targets
- Add notification steps (Slack, email, etc.)
- Customize build process

