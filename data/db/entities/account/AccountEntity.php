<?php
class AccountEntity
{
    private int $id;
    private string $username;
    private string $password;
    private string $email;

    public static $TABLE = "account";
    public static $COLUMN_ID = "id";
    public static $COLUMN_USERNAME = "username";
    public static $COLUMN_PASSWORD = "password";
    public static $COLUMN_EMAIL = "email";

    public function __construct(
        int $id,
        string $username,
        string $password,
        string $email
    ) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }

    public function get_id(): int
    {
        return $this->id;
    }
    public function get_username(): string
    {
        return $this->username;
    }
    public function get_password(): string
    {
        return $this->password;
    }
    public function get_email(): string
    {
        return $this->email;
    }
}
