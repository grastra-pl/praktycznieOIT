import json
import mysql.connector

# Wczytanie danych dostępowych z pliku konfiguracyjnego
with open('config.json') as f:
    config = json.load(f)

# Ustalenie połączenia z bazą danych
mydb = mysql.connector.connect(**config)

# Utworzenie obiektu kursora
cursor = mydb.cursor()

# Wykonanie zapytania SQL
cursor.execute("SELECT * FROM score")

# Pobranie wyników zapytania
results = cursor.fetchall()

# Przetwarzanie wyników
for row in results:
  print(row)

# Zamknięcie połączenia z bazą danych
mydb.close()
