# Symfony! Część 1

## Kontakt!

1. Discord: `@zie_an`
2. Slack: `Antoni Zięba`

## Jak to jeść

1. Budowa teorii przez praktykę
2. 

## Parę słów o Symfony

- Frameworki w PHP 
- Podział aplikacji na części (MVC)
  - `Model`: część odpowiedzialna za łączność z bazą danych
  - `View`: część wizualna, tj. to, co widzi użytkownik w przeglądarce
  - `Controller`: część przyjmująca requesty z przeglądarki użytkownika i odpowiadająca właściwym zasobem 
- Czy frameworki naprawdę są nam potrzebne?
- Composer: menedżer pakietów
- Zasoby do nauki 
   - [Google](https://google.com) 
   - [Dokumentacja Symfony](https://symfony.com/doc/current/index.html)
   - [Google](https://google.com) 

## Instalacja

1. Włącz PowerShell
2. Wklej i wykonaj: 
> `Set-ExecutionPolicy RemoteSigned -Scope CurrentUser`
> `irm get.scoop.sh | iex`
3. Zainstaluj Composer i Symfony CLI
> `scoop install composer`
> `scoop install symfony-cli`
4. Wpisz następującą komendę, by zobaczyć czy wszystko gra
> `symfony check:requirements`
5. Utwórz nowy projekt symfony: 
> `symfony new praktyki --webapp`
6. Wpisz następujące komendy, by włączyć serwer symfony: 
> `cd praktyki`
> `symfony server:start`
7. Przejdź do `127.0.0.1:8000` w przeglądarce. Wszystko gra?
   
   
## Checklista do opanowania
- Na czym polega podział aplikacji na "model", "controller" i "view"?
- Co to jest Composer?
- Gdzie można podać dane dostępu do bazy danych w Symfony? Co jeszcze może znaleźć się w tamtym pliku?
- Jak uruchomić konsolę symfony i co można za jej pomocą wykonać?