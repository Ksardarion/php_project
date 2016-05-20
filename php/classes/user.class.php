<?php
class User {
	 /**
     * Return user data at fields
     * @param $fields
     * @return array
     */
    function getCustomData($fields = array()){
        $data = array();
        // ключи, которые будут переданы обязательно
        $default = array('id');
        // ключи, которые будут исключены
        $skip = array('password');
        $options = array_merge($default, $fields);

        foreach ($options as $key) {
            if (in_array($key, $skip)) {
                continue;
            }
            $data[$key] = $this->$key;
        }
        return $data;
    }
    /**
     * @param $msg
     * @param $id_user
     * @return bool
     */
    function mess($msg, $id_user = 0)
    {
        if (!$this->id) {
            return false;
        }

        $res = DB::connect()->prepare("UPDATE `users` SET `mail_new_count` = `mail_new_count` + '1' WHERE `id` = ? LIMIT 1");
        $res->execute(Array($this->id));
        $res = DB::connect()->prepare("INSERT INTO `mail` (`id_user`,`id_sender`,`time`,`mess`) VALUES (?, ?, ?, ?)");
        $res->execute(Array($this->id, $id_user, TIME, $msg));
        return true;
    }

    /**
     * @param user $ank
     * @return bool
     */
    function is_friend($ank)
    {
        if (!($ank instanceof user)) {
            $ank = $this;
        }
        if (!$ank->id) {
            return false;
        }
        if ($this->id && $this->id === $ank->id) {
            return true;
        }
        $res = DB::connect()->prepare("SELECT COUNT(*) FROM `friends` WHERE `id_user` = ? AND `id_friend` = ? AND `confirm` = '1' LIMIT 1");
        $res->execute(Array($this->id, $ank->id));
        return !!$res->fetchColumn();
    }

}
?>