# Informacje dla frontendu

## Setup

Do tej pory operowaliśmy na jednym i tym samym serwerze.
Czyli na jednym serwerze były:

- baza danych
- backend
- frontend

mimo, że takie podejście jest nadal częste, to jednak im większy projekt,
tym większe prawdopodobieństwo, że korzystać się będzie z różnych serwerów,
z usług chmurowych (przykładowo AWS, Google Cloud, Azure) itp.

## Podstawowe problemy do rozwiązania

### CORS

CORS to problem backendu - ale to Wy go zauważycie pierwsi, jeśli coś pójdzie nie tak,
jak powinno.

Jeśli przeglądarka przy próbie połączenia z backendem sypie błędami CORS (Cross-Origin Resource Sharing), znaczy to, że backendowcy coś źle skonfigurowali.
Waszym zadaniem nie jest rozwiązywanie tego problemu - a dogadanie się z backendem,
tak, by oni go po swojej stronie rozwiązali.


### Bezpieczne połączenie z backendem


## Dane dostępowe

Otrzymacie dane dostępowe do serwera, na którym postawicie aplikację frontendową
i adres serwera backendowego.

Dane te pod żadnym pozorem nie powinny znaleźć się w REPO!
Użyjcie mechanizmu .gitignore do zapewnienia ich bezpieczeństwa.

## Zadanie 1

Waszym zadaniem, jako zespołu frontendowego, będzie utworzenie backendu dla aplikacji, której
szczegóły poznacie w przyszłym tygodniu.

Na pierwszy ogień pójdzie za to zadanie-wprawka.

1. Stworzyć ładnie prezentującą się stronę, która będzie łączyć się z backendem, przesyłać nań dane i odbierać.

2. Dane przesyłane w obie strony powinny być przy pomocy obiektów json, a nie nagim tekstem.

3. Użytkownik strony powinien mieć do dyspozycji:
- krótki opis jej działania
- input do wpisywania wartości liczbowych z labelką "Zgadnij jaka jest najwyższa wartość na backendzie"
- przycisk "Sprawdź"

4. Po kliknięciu przycisku "Sprawdź", aplikacja powinna sprawdzić, czy użytkownik wpisał
wartość w pole do sprawdzenia, jeśli nie, powinien pojawić się komunikat na stronie (nie w postaci wyskakującego okna) - że należy uzupełnić to pole

5. Jeśli pole jest wypełnione prawidłowo, frontend powinien wysłać json na backend z wartością tego pola, json powinien mieć strukturę taką jak w tym przykładzie:
```
{
	rawValue: 7
}
```

6. Należy odebrać zwrotkę z backendu, spodziewajcie się danych postaci:
```
{
	yourValue: 7,
	myValue: 8
}
```

7. Jeśli backend zwróci cokolwiek innego (tekst zamiast jsona, json o innej strukturze, wartości, które nie są liczbami całkowitymi itp.) - wyświetlcie użytkownikowi komunikat `błąd połączenia`

8. Jeśli backend zwróci poprawny json, z poprawnymi wartościami, wyświetlcie użytkownikowi (na stronie, nie w alercie) informację:
- tak, to prawidłowa odpowiedź! - jeśli yourValue i myValue są takie same
- nie, w bazie była mniejsza wartość! Twoja wartość została zapisana - jeśli yourValue jest większe od myValue
- nie, w bazie jest większa wartość! - jeśli yourValue jest mniejsze od myValue

9. Pamiętajcie o ładnej prezentacji - odpowiednie cssy, wycentrowania, paddingi itp.
