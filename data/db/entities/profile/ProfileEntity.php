<?php
class ProfileEntity
{
    private int $user_id;
    private string $first_name;
    private ?string $middle_name;
    private string $last_name;
    private DateTime $created_at;
    private ?string $img_url;
    private ?int $gender;

    public static $TABLE = "profile";
    public static $COLUMN_ID = "id";
    public static $COLUMN_FIRST_NAME = "first_name";
    public static $COLUMN_MIDDLE_NAME = "middle_name";
    public static $COLUMN_LAST_NAME = "last_name";
    public static $COLUMN_CREATED_AT = "created_at";
    public static $COLUMN_IMG_URL = "img_url";
    public static $COLUMN_GENDER = "gender";

    public function __construct(
        int $user_id,
        string $first_name,
        ?string $middle_name,
        string $last_name,
        DateTime $created_at,
        ?string $img_url,
        ?int $gender,
    ) {
        $this->user_id = $user_id;
        $this->first_name = $first_name;
        $this->middle_name = $middle_name;
        $this->last_name = $last_name;
        $this->created_at = $created_at;
        $this->img_url = $img_url;
        $this->gender = $gender;
    }

    public function get_id(): int
    {
        return $this->user_id;
    }
    public function get_first_name(): string
    {
        return $this->first_name;
    }
    public function get_middle_name(): ?string
    {
        return $this->middle_name;
    }
    public function get_last_name(): string
    {
        return $this->last_name;
    }
    public function get_created_at(): DateTime
    {
        return $this->created_at;
    }
    public function get_img_url(): ?string
    {
        return $this->img_url;
    }
    public function get_gender(): ?int
    {
        return $this->gender;
    }
}
