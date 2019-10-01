Создаем докер образ:
docker build ./ -t avtocod_test_task

Запускаем контэйнер:
docker run -it -p 8000:8000 avtocod_test_task

Все остальное сделано по тех заданию.