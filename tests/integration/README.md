# Integration

## Environment

```sh
[[ -f ./.env ]] || cp ./.example.env ./.env
```

## Development

```sh
docker-compose exec -T matomo /usr/local/bin/php /var/www/html/console development:enable
```

## Boot

```sh
make compose/up
```

Open [Matomo](http://127.0.0.1:8080) dashboard.

| Username | Password |
| --- | --- |
| `admin` | `Pa$$w0rd!` |
