# Papier, kamień, nożyce, Spock, jaszczur

Przygotuj proszę trzy pliki:

index.html
styles.css
script.js

W pliku index.html przygotuj szkielet strony.
W pliku styles.css zdefiniuj wygląd elementów strony, takich jak kolory przycisków i pola tekstowego.
W pliku script.js stwórz tablicę obiektów z informacją, który element wygrywa z którym, stwórz funkcje, które będą losowały wybór gracza i przeciwnika, porównywały je i wyświetlały wynik.

![Co bije co](https://github.com/grastra-pl/praktycznieOIT/blob/develop/zadania/wspolne/RPSLS.webp)

Pamiętaj, aby pracując wykorzystywać git, a po ukończeniu funkcjonalności, dokonać commita i pusha na zdalne repozytorium (to ostatnie dopiero wtedy, jak już zostanie wprowadzony temat pushów do zdalnego repo).

Zadanie można rozwiązać na wiele sposobów, przykładowo:
1. W pliku html zamieść formularz, w którym będą przyciski odpowiadające za wybór papieru, kamienia, nożyc, Spocka i jaszczurki oraz pole tekstowe, w którym będzie wyświetlać się wynik gry. Dodaj do każdego z przycisków odwołania do funkcji javascript.

2. W pliku html zamieść tylko najbardziej podstawowy szkielet strony, całą jej strukturę i funkcjonalność umieść w pliku js, wszelkie wizualne sprawy zakoduj w pliku css.
Zamiast dodawać w htmlu odwołania do funkcji javascript - dodaj w jsie event listenery do przycisków, które będą wywoływać funkcje.
Unikaj ifów - użyj funkcji tablic, to co z czym wygrywa - zapisz w tablicy obiektów.

Pierwsze rozwiązanie wydaje się bardziej intuicyjne, jednak nastręcza ono potem - w czasie rozwoju
projektu - więcej problemów.
Drugie rozwiązanie - choć może wydawać się trudniejsze - owocuje czystszym, łatwiejszym w rozwijaniu
kodem.

![Co bije co 2](https://content.instructables.com/FIU/AIWE/I7Q0TCUT/FIUAIWEI7Q0TCUT.jpg?auto=webp&frame=1&fit=bounds&md=5b8102e911f24990417073b8517e53d2)
