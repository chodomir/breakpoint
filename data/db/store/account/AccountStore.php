<?php
require_once("data/db/store/account/IAccountStore.php");
require_once("data/db/entities/account/AccountEntity.php");
require_once("utils/Logger.php");

class AccountStore implements IAccountStore
{
    private DB $db;
    private Logger $log;

    public function __construct(DB $db, Logger $log)
    {
        $this->db = $db;
        $this->log = $log;
    }

    public function update(mixed $entity): bool
    {
        if ($entity instanceof AccountEntity) {
            $query =
                "UPDATE " . AccountEntity::$TABLE . " SET "
                . AccountEntity::$COLUMN_USERNAME . "='" . $entity->get_username() . "',"
                . AccountEntity::$COLUMN_PASSWORD . "='" . $entity->get_password() . "',"
                . AccountEntity::$COLUMN_EMAIL . "='" . $entity->get_email() . "'"
                . " WHERE " . AccountEntity::$COLUMN_ID . "=" . $entity->get_id();
            return $this->db->execute_query($query);
        }
        $this->log->w("Given entity is not an Account entity", [$entity]);
        return false;
    }

    public function delete(mixed $entity): bool
    {
        if ($entity instanceof AccountEntity) {
            $query =
                "DELETE FROM " . AccountEntity::$TABLE
                . " WHERE " . AccountEntity::$COLUMN_ID . "=" . $entity->get_id();
            return $this->db->execute_query($query);
        }
        $this->log->w("Given entity is not an Account entity", [$entity]);
        return false;
    }

    public function insert(mixed $entity): bool
    {
        $query = "INSERT INTO " . AccountEntity::$TABLE . " (id, username, password, email) VALUES ";
        if ($entity instanceof AccountEntity) {
            $query = $query
                . "(NULL,"
                . "'" . $entity->get_username() . "',"
                . "'" . $entity->get_password() . "',"
                . "'" . $entity->get_email() . "')";
            return $this->db->execute_query($query);
        }
        if (is_array($entity)) {
            foreach ($entity as $el) {
                if ($el instanceof AccountEntity) {
                    $query = $query
                        . "(NULL,"
                        . "'" . $el->get_username() . "',"
                        . "'" . $el->get_password() . "',"
                        . "'" . $el->get_email() . "'), ";
                } else $this->log->w("Skipping insert - Given entity is not an Account entity", [$el]);
            }
            $query = substr($query, 0, strlen($query) - 2);
            return $this->db->execute_query($query);
        }
        $this->log->w("Given entity is not an Account entity", [$entity]);
        return false;
    }

    public function get_account(int $id): ?AccountEntity
    {
        $query =
            "SELECT * FROM " . AccountEntity::$TABLE
            . " WHERE " . AccountEntity::$COLUMN_ID . "=" . $id;

        $result = $this->db->execute_query($query, function ($row) {
            return new AccountEntity(
                $row[AccountEntity::$COLUMN_ID],
                $row[AccountEntity::$COLUMN_USERNAME],
                $row[AccountEntity::$COLUMN_PASSWORD],
                $row[AccountEntity::$COLUMN_EMAIL]
            );
        });

        if ($result && is_array($result) && !empty($result)) {
            return $result[0];
        }
        return null;
    }
}
