<?php
include 'User.php';
class DataBaseOperations{
    private static ?mysqli $conn = null;

    /**
     * Get database connection; We use Lazy Instantiation here!
     */
    public static function getConnection() {
        if (self::$conn === null) {
            include_once 'DataBaseProperties.php';
            $servername = DataBaseProperties::SERVER_NAME;
            $username = DataBaseProperties::USERNAME;
            $password = DataBaseProperties::PASSWORD;
            $dbname = DataBaseProperties::DB_NAME;

            self::$conn = new mysqli($servername, $username, $password, $dbname);
            if (self::$conn->connect_error) {
                die("Connection failed: " . self::$conn->connect_error);
            }
        }
        return self::$conn;
    }

    /**
     * @param string $firstName - Prenumele utilizatorului ce dorim sa adauga,
     * @param string $lastName - Numele de familie
     * @param string $email - Email ul
     * @param string $password - Parola
     * @param string $gender - Genul utilizatorului
     * @param string $city - Orasul sau
     * @return bool true daca utilizatorul a fost adaugat, false in caz contrar
     */
    public static function createUser(string $firstName,string $lastName, string $email,
                                      string $password, string $gender, string $city) : bool {
        try {
            $conn = self::getConnection();

            // Perform database operation
            // Example:
            $sql = "INSERT INTO Users (firstName, lastName, email, password, role, gender, city) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $role = User::getRole($email);
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssss", $firstName, $lastName, $email, $password, $role, $gender, $city);
            $stmt->execute();
            $stmt->close();
            // Return status of operation
            return true; // or false based on the operation result
        }
        catch(mysqli_sql_exception $ex){
            echo "<script>alert('Eroare la inserarea in baza de date! Posibil sa existe' +
            ' un utilizator cu email-ul acesta: $email');</script>";
            return false;
        }
    }

    /**
     * @param string $email - Email ul pe care utilizatorul il da ca si input
     * @param string $password - Parola pe care utilizatorul o da ca si input
     * @return bool - True DACA exista utilziatoru, false in caz contrar
     */
    public static function getUser(string $email, string $password) : bool{
        $conn = self::getConnection();
        $sql = "SELECT email, password FROM Users WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 0) {
                // NU EXISTA acest utilizator!
                return false;
            }
            return true;
        } else {
            // Handle statement preparation failure
            echo "Error: " . $conn->error;
        }
        return false;
    }

    /**
     * @param int $id - Id ul utilizatorului ce dorim sa il stergem
     * @return bool - true daca s-a sters utilizatorul, fals in caz contrar
     */
    public static function deleteUser(int $id) : bool{
        $conn = self::getConnection();
        $sql = "DELETE FROM Users WHERE id = {$id}";
        return $conn->query($sql);
    }

    /**
     * @param int $id - Id ul utilizatorului ALE carui informatii dorim a le modif
     * @param string $firstname - Noul nume al utilizatorului
     * @param string $lastname - Noul prenume al utilizatorului
     * @param string $email - Noul email al utilizatorului
     * @param string $passw - Noua parola a utilizatorului
     * @param string $role - Noul rol al utilizatorului
     * @param string $gender - Noul gen al utilizatorului
     * @param string $city - Noul oras al utilizatorului
     * @return bool - True daca modificarea s-a facut cu succes, Fals in caz contrar
     */
    public static function updateUser(int $id, string $firstname,
                                      string $lastname, string $email, string $passw,
                                        string $role, string $gender, string $city) : bool
    {
        $conn = self::getConnection();
        $sql = "UPDATE Users SET firstName = '$firstname', lastname = '$lastname',
        email = '$email', password = '$passw', role = '$role', gender = '$gender', city = '$city'
        WHERE id = $id";
        return $conn -> query($sql);
    }

    /**
     * @return mysqli_result - Lista de utilizatori din baza de date
     */
    public static function getAllUsers() : mysqli_result{
        $conn = self::getConnection();
        $sql = "SELECT * FROM Users";
        return $conn->execute_query($sql);
    }
}