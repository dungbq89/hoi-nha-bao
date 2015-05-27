<?php

/**
 * VtUserSigninLockTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class VtUserSigninLockTable extends Doctrine_Table {

    /**
     * Returns an instance of this class.
     *
     * @return object VtUserSigninLockTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('VtUserSigninLock');
    }

    public function resetUserSigninLock($user_name) {
        $q = $this->createQuery()
                ->delete()
                ->where('user_name = ?', $user_name);

        return $q->execute();
    }

    public function getCountUserSig($user_name, $time) {
        $q = $this->createQuery()
                ->where('user_name = ?', $user_name)
                ->andwhere('created_time >=?', $time);

        return $q->count();
    }

}