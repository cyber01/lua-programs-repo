<?php
/**
 * Project: Repository
 * Created by: cyber01
 * Filename: database.class.php
 * Year: 2015
 */
    class database
    {

        public $isConnected;
        protected $datab;

        public function __construct($dbname,$type,$host=null,$username=null,$password=null,$options=null){
            $this->isConnected = true;
            try {
                $this->datab = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
                $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            }
            catch(PDOException $e) {
                $this->isConnected = false;
                throw new Exception($e->getMessage());
            }
        }

        public function disconnect(){
            $this->datab = null;
            $this->isConnected = false;
        }

        public function row($query, $params=array()){
            try{
                $stmt = $this->datab->prepare($query);
                $stmt->execute($params);
                return $stmt->fetch();
            }catch(PDOException $e){
                throw new Exception($e->getMessage());
            }
        }

        public function rows($query, $params=array()){
            try{

                if (!empty($params['paginate']['0']) and !empty($params['paginate']['1'])) {
                    $query = $query.
                        ' LIMIT ' .
                        (int)$params['paginate']['0'].
                        ', '.
                        (int)$params['paginate']['1'];
                }
                $stmt = $this->datab->prepare($query);
                if (!empty($params['replace'])) {
                    $stmt->execute($params['replace']);
                } else {
                    $stmt->execute();
                }
                return $stmt->fetchAll();
            }catch(PDOException $e){
                throw new Exception($e->getMessage());
            }
        }

        public function insert($query, $params){
            try{
                $stmt = $this->datab->prepare($query);
                $stmt->execute($params);
                return $this->datab->lastInsertId();

            }catch(PDOException $e){
                throw new Exception($e->getMessage());
            }
        }

        public function update($query, $params){
            try{
                $stmt = $this->datab->prepare($query);
                $stmt->execute($params);
                return $result = ($stmt->rowCount()) ? true : false;

            }catch(PDOException $e){
                throw new Exception($e->getMessage());
            }
        }

        public function delete($query, $params){
            try{
                $stmt = $this->datab->prepare($query);
                $stmt->execute($params);
                return $result = ($stmt->rowCount()) ? true : false;

            }catch(PDOException $e){
                throw new Exception($e->getMessage());
            }
        }
    }