<?php
	if (!defined('INITIALIZED'))
		exit;

	class Account extends ObjectData {
		const LOADTYPE_ID = 'id';
		const LOADTYPE_MAIL = 'email';
		public static $table = 'accounts';
		public $data = array('email' => null, 'password' => null, 'access' => null, 'create_date' => null, 'create_ip' => null);
		public static $fields = array('id', 'email', 'password', 'access', 'create_date', 'create_ip');

	    public function __construct($search_text = null, $search_by = self::LOADTYPE_ID)
	    {
			if($search_text != null)
				$this->load($search_text, $search_by);
	    }

		public function load($search_text, $search_by = self::LOADTYPE_ID)
		{
			if(in_array($search_by, self::$fields))
				$search_string = $this->getDatabaseHandler()->fieldName($search_by) . ' = ' . $this->getDatabaseHandler()->quote($search_text);
			else
				new Error_Critic('', 'Wrong Account search_by type.');
			$fieldsArray = array();
			foreach(self::$fields as $fieldName)
				$fieldsArray[$fieldName] = $this->getDatabaseHandler()->fieldName($fieldName);
			$this->data = $this->getDatabaseHandler()->query('SELECT ' . implode(', ', $fieldsArray) . ' FROM ' . $this->getDatabaseHandler()->tableName(self::$table) . ' WHERE ' . $search_string)->fetch();
		}

		public function loadById($id)
		{
			$this->load($id, 'id');
		}

		public function loadByEmail($mail)
		{
			$this->load($mail, 'email');
		}

		public function save($forceInsert = false)
		{
			if(!isset($this->data['id']) || $forceInsert)
			{
				$keys = array();
				$values = array();
				foreach(self::$fields as $key)
					if($key != 'id')
					{
						$keys[] = $this->getDatabaseHandler()->fieldName($key);
						$values[] = $this->getDatabaseHandler()->quote($this->data[$key]);
					}
				$this->getDatabaseHandler()->query('INSERT INTO ' . $this->getDatabaseHandler()->tableName(self::$table) . ' (' . implode(', ', $keys) . ') VALUES (' . implode(', ', $values) . ')');
				$this->setID($this->getDatabaseHandler()->lastInsertId());
			}
			else
			{
				$updates = array();
				foreach(self::$fields as $key)
					if($key != 'id')
						$updates[] = $this->getDatabaseHandler()->fieldName($key) . ' = ' . $this->getDatabaseHandler()->quote($this->data[$key]);
				$this->getDatabaseHandler()->query('UPDATE ' . $this->getDatabaseHandler()->tableName(self::$table) . ' SET ' . implode(', ', $updates) . ' WHERE ' . $this->getDatabaseHandler()->fieldName('id') . ' = ' . $this->getDatabaseHandler()->quote($this->data['id']));
			}
		}
		
	    public function delete()
	    {
	        $this->getDatabaseHandler()->query('DELETE FROM ' . $this->getDatabaseHandler()->tableName(self::$table) . ' WHERE ' . $this->getDatabaseHandler()->fieldName('id') . ' = ' . $this->getDatabaseHandler()->quote($this->data['id']));

	        unset($this->data['id']);
	    }

		public function setID($value){$this->data['id'] = $value;}
		public function getID(){return $this->data['id'];}
		public function setMail($value){$this->data['email'] = $value;}
		public function getMail(){return $this->data['email'];}
		public function setPassword($value){$this->data['password'] = Website::encryptPassword($value, $this);}
		public function getPassword(){return $this->data['password'];}
		public function setPageAccess($value){$this->data['access'] = $value;}
		public function getPageAccess(){return $this->data['access'];}
		public function setCreateDate($value){$this->data['create_date'] = $value;}
		public function getCreateDate(){return $this->data['create_date'];}
		public function setCreateIP($value){$this->data['create_ip'] = $value;}
		public function getCreateIP(){return $this->data['create_ip'];}
		public function getEMail(){return $this->getMail();}
		public function setEMail($value){$this->setMail($value);}
		public function isValidPassword($password){return ($this->data['password'] == Website::encryptPassword($password, $this));}
		public function findByEmail($email){$this->loadByEmail($email);}
		public function getLastLogin(){return $this->getLastDay();}
	}