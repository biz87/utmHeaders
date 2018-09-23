Основная идея:
===
Замена заголовка h1 или любого другого контента, хоть вообще всей страницы, на основе совпадения по указанному GET параметру адресной строки. 


Хороший пример замена заголовков, в зависимости от utm параметров рекламной кампании

Работает по точному совпадению в заранее заполненной таблице. 


Вариант использование: 
---

1. Заполняем таблицу возможными вариантами UTM меток. Для каждого варианта UTM метки задаем свой отдельный заголовок h1. 
2. Вместо заголовка вызваем сниппет utmHeaders и указываем какой GET параметр адресной строки смотреть. По умолчанию это utm_term. 
3. Сниппет проверяет есть ли в адресной строке указанный параметр. При входе на сайт без UTM метки посетителю предлагается стандартный вариант заголовка. Если указанный параметр присутствует — его значение проверяется по базе и если такой был предусмотрен — подставляется уникальный заголовок. 

Не обязательно оперировать одним лишь заголовком. Можно под каждый вариант указать отдельный чанк с блоком разметки любого размера. 

У компонента один единственный чанк вывода
```
{if $header}
    {$header}
{else}
    <h1>Стандартный
                <strongЗаголовок/strong></h1>
{/if}
```
Как видите все просто — если найдено совпадение в базе подставляется оно, если нет — выводим стандартный заголовок. Чанк написан на феном — это означает обязательное использование на сайте pdoTools, как зависимости. Компонент устанавливается автоматически, в случае его отсутствия.
