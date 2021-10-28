<?php

namespace components\db;

use components\ComponentsTrait;
use PDOStatement;

abstract class AbstractQuery
{
    use ComponentsTrait;

    protected string $table;
    protected array $bindings = [];

    protected PDOStatement $stmt;

    public function execute(): bool
    {
        $db = $this->db()->getConnection();
        $sql = $this->getQuery();
        $this->stmt = $db->prepare($sql);
        return $this->stmt->execute($this->bindings);
    }

    protected function addBindings(array $bindings): void
    {
        $this->bindings = array_merge($this->bindings, $bindings);
    }

    abstract protected function getQuery(): string;
}
