# Symfony! Część 2


# Doctrine i konfiguracja
Doctrine jest dla baz danych, jak Twig jest dla kodu HTML. 
Doctrine to wbudowana w Symfony biblioteka ORM do odczytywania i manipulacji bazą danych. 
Podstawowa konfiguracja wymaga tylko zmiany zmiennej środowiskowej DATABASE_URL znajdującej się w pliku .env
Składnia tej linijki wygląda tak:

    DATABASE_URL="mysql://uzytkownik:haslo@adres_serwera:port/nazwa_bazy_danych"
Na przykład:

    DATABASE_URL="mysql://root:haslo@localhost:3306/praktyki"


## Entity

Entity to reprezentacja wiersza w tabeli w bazie danych. Na przykład, w typowej aplikacji moglibyśmy mieć tabelę "users" zawierającą dane o zarejestrowanych użytkownikach, ich e-mail, hasła, etc. 
Dla ułatwienia, żeby tworzyć nowe wiersze w takiej tabeli, wyszukiwać je, usuwać etc. w Symfony możemy posługiwać się klasami "Entity".

Aby utworzyć entity możemy posłużyć się następującą komendą: 

    php bin/console make:entity

Powyższa komenda przeprowadzi nas przez poszczególne kolumny w naszej tabeli a następnie wygeneruje klasę entity odpowiedzialną za mapowanie między naszym kodem PHP a tym, co znajduje się w bazie danych. Ta komenda utworzy też skrypt **repozytorium** którego celem jest ułatwienie nam wyświetlanie i zarządzanie danymi z całej tabeli. 

## Migracje
Kiedy utworzyliśmy nasze entity w kodzie PHP, nasza baza danych o tym jeszcze "nie wie" i tabela właściwa dla naszego entity jeszcze nie istnieje. Migracje to skrypty, w których znajdują się listy operacji SQL, które baza danych musi wykonać, by zachować pełną synchronizację między naszym kodem a strukturą bazy. 

Migracje tworzymy komendą: 

    php bin/console make:migration
    
a wykonujemy za pomocą: 

    php bin/console doctrine:migrations:migrate


## Zapisywanie nowych wierszy w tabeli 

W kontrolerze należy dodać nowy komponent Symfony: 

    Doctrine\ORM\EntityManagerInterface;

następnie:
```
$entityManager->persist($entity);
```
```
$entityManager->flush();
```