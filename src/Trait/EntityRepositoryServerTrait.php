<?php

namespace App\Trait;

trait EntityRepositoryServerTrait
{
    public function persist(object $entity): void
    {
        $this->getEntityManager()->persist($entity);
    }

    public function flush(): void
    {
        $this->getEntityManager()->flush();
    }
}
