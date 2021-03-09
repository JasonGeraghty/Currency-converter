<?php

/*
 * See https://gist.github.com/jonahlyn/1186647#file-dbconnection-php
 * 
 * Class DBController
 * Create a database connection using PDO
 * @author jonahlyn@unm.edu
 *
 * Instructions for use:
 *
 * require_once('settings.config.php');          // Define db configuration arrays here
 * require_once('DBController.php');             // Include this file
 *
 * $database = new DBController($dbconfig);      // Create new connection by passing in your configuration array
 *
 * /////////////////////////////////////////////////////////////////////////////////////////////////////////////
 *
 * $sqlSelect = "select * from .....";           // Select Statements:
 * $rows = $database->query($sqlSelect);      // Use this method to run select statements
 *
 * foreach($rows as $row){
 * 		echo $row["column"] . "<br/>";
 * }
 *
 * /////////////////////////////////////////////////////////////////////////////////////////////////////////////
 *
 * $sqlInsert = "insert into ....";              // Insert/Update/Delete Statements:
 * $count = $database->execute($sqlInsert);     // Use this method to run inserts/updates/deletes
 * echo "number of records inserted: " . $count;
 *
 * $name = "jonahlyn";                          // Prepared Statements:
 * $stmt = $database->dbc->prepare("insert into test (name) values (?)");
 * $stmt->execute(array($name));
 *
 */

Class DBController {

    // Database Connection Configuration Parameters
    // array('driver' => 'mysql','host' => '','dbname' => '','username' => '','password' => '')
    protected $config;
    // Database Connection
    public $dbc;

    /* function __construct
     * Opens the database connection
     * @param $config is an array of database connection parameters
     */

    public function __construct(array $config) {
        $this->config = $config;
        $this->openConnection();
    }

    /* Function __destruct
     * Closes the database connection
     */

    public function __destruct() {
        $this->closeConnection();
    }

    /* Function openConnection
     * Get a connection to the database using PDO.
     */

    private function openConnection() {
        // Check if the connection is already established
        if ($this->dbc == NULL) {
            // Create the connection
            $dsn = "" .
                    $this->config['driver'] .
                    ":host=" . $this->config['host'] .
                    ";dbname=" . $this->config['dbname'];

            try {
                $this->dbc = new PDO($dsn, $this->config['username'], $this->config['password']);
            } catch (PDOException $e) {
                echo __LINE__ . $e->getMessage();
            }
        }
    }

    public function closeConnection() {
        $this->dbc = null;
        $this->config = null;
    }

    /* Function execute
     * Runs a insert, update or delete query
     * @param string sql insert update or delete statement
     * @return int count of records affected by running the sql statement.
     */

    public function execute($sql) {
        try {
            $count = $this->dbc->exec($sql) or print_r($this->dbc->errorInfo());
        } catch (PDOException $e) {
            echo __LINE__ . $e->getMessage();
        }
        return $count;
    }

    /* Function query
     * Runs a select query
     * @param string sql insert update or delete statement
     * @returns associative array
     */

    public function query($sql) {
        $stmt = $this->dbc->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt;
    }

    /* Function query
     * Runs a select query
     * @param string sql insert update or delete statement
     * @returns associative array
     * @see https://phpdelusions.net/pdo/fetch_modes
     */

    public function queryForClass($sql, $className) {
        $stmt = $this->dbc->query($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $className);
        return $stmt;
    }

}
