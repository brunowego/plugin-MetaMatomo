# Integration

## Environment

```sh
[[ -f ./.env ]] || cp ./.example.env ./.env
```

## Boot

```sh
make compose/up
```

Open [Matomo](http://127.0.0.1:8080) dashboard.

| Username | Password |
| --- | --- |
| `admin` | `Pa$$w0rd!` |

## Configuration

1. Administration
2. System -> General settings
3. SelfEsteem
   - Platform: Matomo/Piwik
   - URL: [http://127.0.0.1:8080](http://127.0.0.1:8080)
   - Site ID: 1

## Core Archive

```sh
docker-compose exec -T matomo /bin/su \
  -s '/bin/sh' \
  -c '/usr/local/bin/php /var/www/html/console core:archive' \
  www-data
```
