<?php

namespace KCS\Repository;

use KCS\Model\VisitorModel;
use PDO;

class VisitorsRepository extends BaseRepository
{
    public const MODEL = VisitorModel::class;

    public function all(): array
    {
        $stmt = $this->conn->prepare('SELECT * FROM visitors');
        $stmt->setFetchMode(PDO::FETCH_CLASS, VisitorModel::class);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}