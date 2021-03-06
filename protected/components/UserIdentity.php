<?php

class UserIdentity extends CUserIdentity {

    public $_id;

	public function authenticate() {
        $user = User::model()->findByAttributes(array('username'=>$this->username));

        if ($user===null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if(md5($this->password) !== $user->password)
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else {
            $this->_id = $user->id;
            $this->username = $user->username;
            $this->errorCode = self::ERROR_NONE;
            $this->setState("_id", $user->id);
            $this->setState('roles',$user->role);
         }
        return !$this->errorCode;
	}

}
