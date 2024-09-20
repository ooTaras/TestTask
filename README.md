## Run project 
```apacheconf
docker compose up -d 

docker-compose exec app bash

php artisan migrate
```

## Test App
```apacheconf
curl -s -X PUT 'http://127.0.0.1:8081/data?action=refresh&delaySeconds=123'

curl -s 'http://127.0.0.1:8081/jobs?action=list&limit=1'

curl -s 'http://127.0.0.1:8081/data?action=search&lat=50.17895&lon=30.32761'

curl -s -X DELETE 'http://127.0.0.1:8081/data'
```
