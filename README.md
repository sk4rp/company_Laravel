<h1>Техническое задание<h2>

IMPORTANT:
1) БД была сделана отдельно (не использовал migrations)
2) Приложил dump БД (не использовал seeders) 

Задание на разработку веб-приложения "Поиск компании"

Веб-приложение предназначено для поиска компании на различные события. В приложение могут добавляться произвольные и коммерческие события, другие пользователи могут входить в состав участников событий.

Коммерческие и пользовательские события могут ссылаться дру г на друга: например, на коммерческое соытия "Cheese Quiz" искать компанию могут сразу несколько разных людей - будет несколько пользовательских события, и одно пользовательское событие может включать несколько коммерческих (сначала сходим в кино, потом в бар).

К событию можно прикреплять существующие категории или создавать собственные. Категории иерархичные (например, "Спорт" => "Хоккей"). К одному событию можно прикреплять несколько категорий разных уровней.

Примерный состав содержимого пользовательского события: кто создал, дата и время создания, дата и время последнего обновления, временной диапазон мероприятия (вариативно), коммерческие события (вариативно), точка на карте (место встречи), время встречи,  диапазон количества человек, возрастной диапазон, описание,  категории (вариативно), доп файлы, до какого времени продолжается набор участников, учас тники только конкретного пола (вариативно).

Состав коммерческого события определить самостоятельно. 

