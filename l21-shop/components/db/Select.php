<?php declare(strict_types=1);

namespace components\db;

use PDO;
use components\ComponentsTrait;

class Select extends AbstractQuery
{
    use ComponentsTrait;
    use WhereTrait;
    use LimitsTrait;

    private array $fields;
    private array $order = [];

    public function __construct(array $fields)
    {
        $this->fields = $fields;
    }

    public function from(string $table): self
    {
        $this->table = $table;
        return $this;
    }

    public function orderBy(array $order): self
    {
        $this->order = $order;
        return $this;
    }

    public function one(int $fetch = PDO::FETCH_ASSOC): ?array
    {
        $this->execute();
        return $this->stmt->fetch($fetch) ?: null;
    }

    public function all(int $fetch = PDO::FETCH_ASSOC): array
    {
        $this->execute();
        return $this->stmt->fetchAll($fetch) ?: [];
    }

    protected function getQuery(): string
    {
        $query = "SELECT {$this->getFieldsPart()} FROM `{$this->table}`";
        if ($this->where) {
            $query .= $this->where->getQueryPart();
            $this->addBindings($this->where->getBindings());
        }

        $query .= $this->getOrderPart();
        $query .= $this->getLimitPart();

        return $query;
    }

    private function getFieldsPart(): string
    {
        $fields = implode('`, `', $this->fields);
        if ($fields !== '*') {
            $fields = "`{$fields}`";
        }

        return $fields;
    }

    private function getOrderPart(): string
    {
        if ($this->order) {
            $order = [];
            foreach ($this->order as $field => $direction) {
                $order[] = "`{$field}` " . ($direction === SORT_ASC ? 'ASC' : 'DESC');
            }
            return ' ORDER BY ' . implode(', ', $order);
        }

        return '';
    }
}