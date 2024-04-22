<?php
include 'Role.php';
/*
 Clasa User, ce tine toate detaliile unui utilizator cand se logheaza
*/
class User{
    private int $id;
    private string $firstName;

    private string $lastName;

    private string $email;

    private string $password;

    private string $role;

    private string $gender;

    private string $city;

    /**
     * @param string $firstName Prenumele utilizatorului
     * @param string $lastName Numele de familie al utilizatorului
     * @param string $email Email ul utilizatorului
     * @param string $password Parola utilizatorului
     * @param string $gender Genul utilizatorului
     * @param string $city Orasul utilizatorului
     */
    public function __construct(string $firstName, string $lastName, string $email, string $password, string $gender, string $city)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->gender = $gender;
        $this->city = $city;

        /*
         * EXISTA un unic Admin al acestui site web, iar rolul se deduce AUTOMAT pe baza email ului
         * TINEM cont ca fiecare email este unic
         */
        if($this -> email === Role::ADMIN_EMAIL)
            $this -> role = Role::ADMIN;
        else
            $this -> role = ROLE::USER;
    }

    /**
     * @param string $email - Email ul utilizatorului
     * @return string
     * Pe baza email ului unui utilizator, NE putem da sautomat seama daca este ADMIN sau
     * USER;
     */
    public static function getRole(string $email) : string{
        if ($email === Role::ADMIN_EMAIL)
            return Role::ADMIN;
        return Role::USER;
    }
}