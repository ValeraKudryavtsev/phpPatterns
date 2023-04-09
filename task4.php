<?php

interface DatabaseFactory {
    public function createConnection();
    public function createTable();
}

interface DBConnection {
    public function connect();
}

class MySQLConnect implements DBConnection {
    public function connect()
    {
        // TODO: Implement connect() method.
    }
}
class PostgreSQLConnect implements DBConnection {
    public function connect()
    {
        // TODO: Implement connect() method.
    }
}

class OracleConnect implements DBConnection {
    public function connect()
    {
        // TODO: Implement connect() method.
    }
}

interface DBRecord {
    public function doRecord();
}

class MySQLRecord implements DBRecord {
    public function doRecord()
    {
        // TODO: Implement doRecord() method.
    }
}
class PostgreSQLRecord implements DBRecord {
    public function doRecord()
    {
        // TODO: Implement doRecord() method.
    }
}
class OracleRecord implements DBRecord {
    public function doRecord()
    {
        // TODO: Implement doRecord() method.
    }
}

class MySQLFactory implements DatabaseFactory {
    public function createConnection()
    {
        return new MySQLConnect();
    }

    public function createTable()
    {
        return new MySQLRecord();
    }
}

class PostgreSQLFactory implements DatabaseFactory {
    public function createConnection()
    {
        return new PostgreSQLConnect();
    }

    public function createTable()
    {
        return new PostgreSQLRecord();
    }
}

class OracleFactory implements DatabaseFactory {
    public function createConnection()
    {
        return new OracleConnect();
    }

    public function createTable()
    {
        return new OracleRecord();
    }
}

$mysqlFactory = new MySQLFactory();
$connection = $mysqlFactory->createConnection();
$table = $mysqlFactory->createTable();

$postgresFactory = new PostgreSQLFactory();
$connection2 = $postgresFactory->createConnection();
$table2 = $postgresFactory->createTable();

$oracleFactory = new OracleFactory();
$connection3 = $oracleFactory->createConnection();
$table3 = $oracleFactory->createTable();
