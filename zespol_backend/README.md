# Informacje dla backendu

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

CORS (Cross-Origin Resource Sharing) to mechanizm bezpieczeństwa stosowany przez przeglądarki internetowe, który kontroluje, czy i jak skrypty JavaScript na stronie internetowej mogą żądać zasobów (takich jak dane lub pliki) z innych domen. Problem CORS jest istotny, ponieważ chroni użytkowników internetu przed potencjalnie szkodliwymi atakami.

Oto kilka powodów, dlaczego problem CORS jest ważny:

Bezpieczeństwo przeglądania internetu: Mechanizm CORS zapewnia ochronę przed atakami ze strony innych domen. Bez odpowiednich ograniczeń, skrypty JavaScript na jednej stronie mogłyby żądać i odczytywać poufne dane z innych stron bez wiedzy i zgody użytkowników. CORS pozwala kontrolować, które domeny mogą bezpiecznie żądać zasobów.

Ochrona danych użytkownika: Przy użyciu CORS, właściciele stron internetowych mogą chronić poufne dane użytkowników, takie jak dane osobowe, dane logowania czy informacje finansowe. Dzięki ograniczeniom CORS, te dane nie są dostępne dla skryptów JavaScript działających na innych domenach.

Zapobieganie atakom CSRF: Mechanizm CORS jest skuteczną ochroną przed atakami typu Cross-Site Request Forgery (CSRF). Atakujący nie może skłonić użytkownika do wykonania nieautoryzowanych żądań z jego kontekstu przeglądarki na innej domenie, ponieważ żądanie zostanie zablokowane przez CORS.

Bezpieczne udostępnianie zasobów: Dzięki CORS można bezpiecznie udostępniać zasoby, takie jak czcionki, skrypty czy obrazy, z innych domen. Dzięki temu twórcy stron internetowych mogą korzystać z zewnętrznych zasobów, które poprawiają wygląd i funkcjonalność ich witryny, jednocześnie zachowując kontrolę nad tym, jakie domeny mają do nich dostęp.

Niewłaściwa konfiguracja CORS może prowadzić do nieautoryzowanego dostępu do danych, narażając użytkowników na ryzyko ataków. Dlatego ważne jest zrozumienie i odpowiednie zastosowanie zasad CORS w celu utrzymania bezpieczeństwa i prywatności w sieci.

Z drugiej strony, nieumiejętne skonfigurowanie CORS może uniemożliwić frontendowi skorzystanie
z zasobów, które serwuje dla nich backend.

### Bezpieczne połączenie z zewnętrzną bazą danych

W dzisiejszych aplikacjach internetowych często zachodzi potrzeba połączenia z zewnętrzną bazą danych, która znajduje się na innym serwerze niż backend. Może to być konieczne, gdy chcemy korzystać z usług chmurowych lub udostępniać dane innym aplikacjom lub serwisom. Jednak takie połączenia wiążą się z pewnymi ryzykami związanymi z bezpieczeństwem.

Program naszych praktyk nie obejmuje dokładnego przyjrzenia się wszystkim tego typu problemom,
ale chcę byście zdawali sobie sprawę, że dokonujemy wielu uproszczeń, których produkcyjnie
raczej się nie robi (dobre praktyki zalecają co innego).

Przykładowo - będziemy używać danych dostępowych w pliku konfiguracyjnym.
Nie jest to zalecane.

Przechowywanie haseł w plikach konfiguracyjnych może być niewystarczające ze względów bezpieczeństwa. Pliki konfiguracyjne są często dostępne w systemach plików, co oznacza, że mogą zostać nieautoryzowanie odczytane przez osoby trzecie. Istnieje kilka mechanizmów przechowywania haseł, które są bardziej bezpieczne niż przechowywanie ich w plikach konfiguracyjnych:

1. Zmienna środowiskowa (environment variable): Zamiast przechowywać hasła bezpośrednio w plikach konfiguracyjnych, można je przechowywać jako zmienne środowiskowe na serwerze. Wartości te mogą być odczytywane przez aplikację w czasie uruchomienia. Korzystanie ze zmiennych środowiskowych zapewnia lepsze oddzielenie tajnych danych od kodu aplikacji.

2. Menadżer haseł (password manager): Menadżery haseł to specjalne narzędzia, które pozwalają na bezpieczne przechowywanie i zarządzanie hasłami. Zamiast przechowywać hasła w plikach konfiguracyjnych, można je przechowywać w menadżerze haseł, który zapewnia silne szyfrowanie danych i wymaga jedynie jednego głównego hasła do odblokowania dostępu do wszystkich haseł.

3. Zewnętrzne usługi zarządzania uwierzytelnianiem: Można rozważyć wykorzystanie zewnętrznych usług zarządzania uwierzytelnianiem, takich jak usługi OAuth, które pozwalają na uwierzytelnianie użytkowników i zarządzanie ich poświadczeniami. W tym przypadku aplikacja nie przechowuje haseł bezpośrednio, ale polega na zewnętrznej usłudze do uwierzytelniania.

4. Szyfrowanie haseł: Jeśli konieczne jest przechowywanie haseł w bazie danych lub w innych plikach, należy użyć silnego szyfrowania. Hasła powinny być zaszyfrowane za pomocą bezpiecznego algorytmu, a następnie przechowywane w postaci zaszyfrowanej. W takim przypadku klucz szyfrowania powinien być przechowywany w bezpiecznym miejscu, oddzielnie od samego hasła.

Ważne jest, aby unikać przechowywania haseł w czystej postaci lub w plikach, które są łatwo dostępne lub niewystarczająco zabezpieczone. Wybór odpowiedniego mechanizmu przechowywania haseł zależy od specyfiki projektu i środowiska, w którym aplikacja działa. Należy również pamiętać o regularnej zmianie haseł oraz odbieraniu i odwoływaniu uprawnień dostępu.

Tak więc - to w jaki sposób korzystamy z bazy, jak przechowujemy do niej dostępy - jest tylko
uproszczeniem i nie powinno być uważane za wzór do naśladowania. Oczywiście są przypadki,
takie jak te praktyki - gdy ważniejsza jest prostota niż bezpieczeństwo, pamiętajcie jednak,
że o bezpieczeństwie musicie myśleć zawsze - i jeśli obniżacie poziom bezpieczeństwa aplikacji,
musicie sobie z tego zdawać sprawę. Klient tego nie będzie wiedział - wy musicie to wiedzieć
i być za to odpowiedzialnymi.

## Dane dostępowe

Otrzymacie dane dostępowe do dwóch serwerów.

1. Do serwera bazy danych.
2. Do serwera backendu.

Dane te pod żadnym pozorem nie powinny znaleźć się w REPO!
Użyjcie mechanizmu .gitignore do zapewnienia ich bezpieczeństwa.

## Zadanie 1

Waszym zadaniem, jako zespołu backendowego, będzie utworzenie backendu dla aplikacji, której
szczegóły poznacie w przyszłym tygodniu.

Na pierwszy ogień pójdzie za to zadanie-wprawka.

1. Utworzyć w bazie SQL do której uzyskacie dostęp tabelę "task"
- z kluczem głównym 'id', autoincrement,
- z polami:
	raw_value (int),
	creation_time (timestamp),
	moditication_time (timestamp),
	deleted tinyint(1) / bool
- w moditication_time (timestamp) wartość domyślna ma być current_timestamp() w deleted: 0

2. Utworzyć skrypt, który będzie:

a) Odczytywał wartość, którą przysłał frontend postem w polu rawValue obiektu json

przykładowo:
```
{
	rawValue: 7
}
```

b) Sprawdzi, czy dane przysłane przez frontend są poprawne, czy rawValue jest int itp.

c) Sprawdzi jaka jest najwyższa 'raw_value' w tabeli 'task' i porówna ją z 'rawValue' przysłaną
przez frontend

d) Wstawi do tabeli 'task' nowy rekord z wartością 'rawValue'

e) zwróci json postaci:
```
{
	yourValue: 7,
	myValue: 8
}
```

gdzie:
yourValue wartość zwrócona przez frontend
myValue - największa wartość (wcześniej pobrana) 'raw_value' z tabeli 'task'

