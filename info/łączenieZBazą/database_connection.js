const fs = require('fs');
const mysql = require('mysql');

// Wczytanie danych dostępowych z pliku konfiguracyjnego
const config = JSON.parse(fs.readFileSync('config.json', 'utf8'));

// Ustalenie połączenia z bazą danych
const connection = mysql.createConnection(config);

// Nawiązanie połączenia
connection.connect((err) => {
  if (err) {
    console.error('Błąd połączenia:', err);
    return;
  }
  
  console.log('Połączono z bazą danych!');
  
  // Wykonanie zapytania SQL
  connection.query('SELECT * FROM score', (err, results) => {
    if (err) {
      console.error('Błąd zapytania:', err);
      return;
    }
    
    // Przetwarzanie wyników
    results.forEach((row) => {
      console.log(row);
    });
    
    // Zamknięcie połączenia
    connection.end();
  });
});