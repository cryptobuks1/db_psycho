#/bin/sh
echo "Введите название ветки back"

read branch_back

echo "Переход на ветку $branch_back"

git branch

git status

echo "Продолжить"

read answer

echo "Удаление старых файлов в папке public"

cd public

rm favicon.ico

rm -rf assets

rm -rf fonts

rm -rf img

echo "Обновление фронта"

cd ../../dashboard_front

git pull origin dev

npm run build

cp -r dist/assets/ ../dashboard_back/public

cp -r dist/fonts/ ../dashboard_back/public

cp -r dist/img/ ../dashboard_back/public

cp dist/favicon.ico ../dashboard_back/public

echo "$(cat dist/index.html)" > ../dashboard_back/resources/views/home.blade.php

cd ../dashboard_back

git status

echo "Проверьте все ли хорошо работает (Если нет, нажать CTRL+C)"

read answer

git add .

echo "Введите название коммита"

read commit

git commit -m "$commit"

git push origin $branch_back
