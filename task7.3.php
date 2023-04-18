<?php

class IdentityMap {
    private $objects = [];

    public function getObject($id) {
        return $this->objects[$id] ?? null;
    }

    public function addObject($id, $object) {
        $this->objects[$id] = $object;
    }

    public function removeObject($id) {
        unset($this->objects[$id]);
    }
}

class UserRepository {
    private $db;
    private $identityMap;

    public function __construct($db) {
        $this->db = $db;
        $this->identityMap = new IdentityMap();
    }

    public function getUserById($userId) {
        $user = $this->identityMap->getObject($userId);
        if ($user !== null) {
            return $user;
        }

        $user = $this->db->getUserById($userId);
        if ($user !== null) {
            $this->identityMap->addObject($userId, $user);
        }

        return $user;
    }
}

class ProductRepository {
    private $db;
    private $identityMap;

    public function __construct($db) {
        $this->db = $db;
        $this->identityMap = new IdentityMap();
    }

    public function getProductById($productId) {
        $product = $this->identityMap->getObject($productId);
        if ($product !== null) {
            return $product;
        }

        $product = $this->db->getProductById($productId);
        if ($product !== null) {
            $this->identityMap->addObject($productId, $product);
        }

        return $product;
    }
}

