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

## Core Archive

```sh
docker-compose exec -T matomo /bin/su \
  -s '/bin/sh' \
  -c '/usr/local/bin/php /var/www/html/console core:archive' \
  www-data
```
