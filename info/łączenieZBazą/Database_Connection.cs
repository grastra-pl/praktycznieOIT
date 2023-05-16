using System;
using System.Data;
using MySql.Data.MySqlClient;
using System.IO;
using Newtonsoft.Json;

class Program
{
    static void Main()
    {
        // Wczytanie danych dostępowych z pliku konfiguracyjnego
        string configFile = File.ReadAllText("config.json");
        var config = JsonConvert.DeserializeObject<Config>(configFile);

        // Ustalenie połączenia z bazą danych
        string connectionString = $"Server={config.Host};Database={config.Database};Uid={config.User};Pwd={config.Password};";
        using (MySqlConnection connection = new MySqlConnection(connectionString))
        {
            try
            {
                // Otwarcie połączenia
                connection.Open();
                Console.WriteLine("Połączono z bazą danych!");

                // Wykonanie zapytania SQL
                string query = "SELECT * FROM score";
                MySqlCommand command = new MySqlCommand(query, connection);
                MySqlDataReader reader = command.ExecuteReader();

                // Przetwarzanie wyników
                while (reader.Read())
                {
                    for (int i = 0; i < reader.FieldCount; i++)
                    {
                        Console.Write(reader[i] + "\t");
                    }
                    Console.WriteLine();
                }

                reader.Close();
            }
            catch (Exception ex)
            {
                Console.WriteLine("Błąd: " + ex.Message);
            }
        }

        Console.ReadLine();
    }

    // Klasa pomocnicza do deserializacji danych dostępowych z pliku konfiguracyjnego
    private class Config
    {
        public string Host { get; set; }
        public string User { get; set; }
        public string Password { get; set; }
        public string Database { get; set; }
    }
}
