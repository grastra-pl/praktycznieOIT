# Wyszukiwarka połączeń kolejowych

##  Jak ma wyglądać działająca aplikacja: 

Aplikacja ma przypominać wyszukiwarkę połączeń PKP. Użytkownik podaje swoją stację początkową i końcową a także dzień, w którym chce zacząć podróż, a wyszukiwarka ma zwrócić 

1. Strona główna zawierać ma wyszukiwarkę, która będzie składać się z następujących elementów: 
	1. Stacja początkowa
	2. Stacja końcowa
	3. Dzień podróży
2. Po naciśnięciu przycisku "Szukaj" wyszukiwarka ma pokazać wynik wyszukiwania bez przeładowania strony 
3. Wynikiem wyszukiwania ma być tabelka z następującymi kolumnami: 
	1. Stacja początkowa i końcowa
	2. Data i godzina wyjazdu 
	3. Data i godzina dojazdu 
	4. Link do podstrony z większą ilością info 
4. Podstrona z większą ilością info ma przedstawiać następujące dane: 
	1. Wszystkie wyżej wymienione 
	2. Cena biletu 
	3. Długość podróży w kilometrach 
	4. Przycisk do zakupu biletu (nic nie musi robić)

## Wasze zadanie

Waszym zadaniem jest jak najbardziej szczegółowe opisanie jak powyżej opisana mogłaby wyglądać od strony technicznej. Jakie powinna wyglądać struktura bazy danych? Jak powinien wyglądać kontroler? W jaki sposób powinna działać wyszukiwarka? Jakich funkcji do tego użyjecie? 

**Odpowiedzi możecie wysyłać np. jako link do  Google Docsów na Slacku**

Nie ma żadnego dolnego limitu słów, ale postarajcie się w miarę wysłowić i być tak szczegółowi, jak to możliwe. 

## Pytania pomocnicze 

1. Jak będzie nazywać się Entity po którym będziemy wyszukiwać? 
2. Jakie powinny być w nim kolumny i jakiego one typu będą? 
3. Jak będzie wyglądać `<form>` w wyszukiwarce? Jakiego typu będą poszczególne pola? 
4. Jak pobierzemy dane z każdego pola w JavaScripcie?
5. Jak wyślemy zapytanie do serwera, tak, by zebrać wszystkie pola w jednym requeście?
6. W jaki sposób musimy skonstruować funkcję w repozytorium, by wyszukać po wszystkich wymaganych polach? Jakie tam będą warunki (andWhere)?
7. Jak zrobimy route, który będzie renderował podstronę dla poszczególnych połączeń? (podpowiedź: słowo-klucz "slug")




  