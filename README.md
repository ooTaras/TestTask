## Run project 
```apacheconf
docker compose up -d 

docker exec -it laravel_app php artisan migrate
```

## If you have some trouble with permission
```apacheconf
docker exec -it laravel_app chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

docker exec -it laravel_app chmod -R 775 /var/www/storage /var/www/bootstrap/cache
```

## Test App
```apacheconf
curl -s -X PUT 'http://127.0.0.1:8081/data?action=refresh&delaySeconds=123'

curl -s 'http://127.0.0.1:8081/jobs?action=list&limit=1'

curl -s 'http://127.0.0.1:8081/data?action=search&lat=50.17895&lon=30.32761'

curl -s -X DELETE 'http://127.0.0.1:8081/data'
```
