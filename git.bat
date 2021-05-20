@echo on
set /p msg=DESCRICAO:
cd\xampp\htdocs\loja
git add -A
git commit -m "%msg%"
git push -u origin master