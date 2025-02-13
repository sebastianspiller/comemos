# Comemos – Open Source Community Platform

## Development

### Setup
1. Install Docker
2. `docker-compose up -d --build`

### Logging
- Alle Container-Logs live verfolgen
docker-compose logs -f

- Nur die Apache/PHP Logs verfolgen
docker-compose logs -f web

- Nur die MySQL Logs verfolgen
docker-compose logs -f db