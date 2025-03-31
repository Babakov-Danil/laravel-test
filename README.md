## Задача

Необходимо создать сервис для хранения и подачи вакансий. Вакансия должны храниться в базе данных. Сервис должен предоставлять API, работающее поверх HTTP в формате JSON.

Детали:
Метод получения списка вакансий

Пагинация: на одной странице должно присутствовать 10 вакансий;
Cортировки: по зарплате (возрастание/убывание) и по дате создания (возрастание/убывание);
Поля в ответе: название вакансии, зарплата, описание.

Метод получения конкретной вакансии

Обязательные поля в ответе: название вакансии, зарплата, описание;
Опциональные поля (можно запросить, передав параметр fields): описание, название.

Метод создания объявления:

Принимает все вышеперечисленные поля: название, описание, описание, зарплата;
Возвращает ID созданной вакансии и код результата (ошибка или успех).
 

## Startup
Build docker container
```
docker compose build
```
Run docker
```
docker compose up -d
```
Open bash 
```
docker exec -it laravel-app sh
```
Preapre project
```
./startup.sh
```

## URLS
base: http://localhost:8000

index: http://localhost:8000/

index.vacancies: http://localhost:8000/vacancies

index api: http://localhost:8000/api/

swagger: http://localhost:8000/api/documentation
