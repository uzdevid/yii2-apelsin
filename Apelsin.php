<?php

namespace uzdevid\apelsin;

use yii\base\Component;
use yii\base\Exception;
use yii\base\InvalidValueException;

/**
 *
 */
class Apelsin extends Component {
    public $login;
    public $password;
    protected $_authkey;
    public $_config;

    public function __construct($config = []) {
        if (empty($config['login']))
            throw new InvalidValueException('Login not found');

        if (empty($config['password']))
            throw new InvalidValueException('Password not found');

        parent::__construct($config);

        $this->_config = $config;
        $this->_authkey = base64_encode("{$this->login}:{$this->password}");
    }

    public function getExecute() {
        return new Execute($this->_config);
    }

    public function getCard() {
        return new Card($this->_config);
    }
}