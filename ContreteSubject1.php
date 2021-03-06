<?php
/**
 * Created by PhpStorm.
 * User: longmin
 * Date: 16/7/30
 * Time: 下午12:31
 */
/**
 * 具体主题角色
 */
class ConcreteSubject implements Subject {

    private $_observers;

    public function __construct() {
        //$this->_observers = array();
        $this->_observers = new SplObjectStorage();
    }

    /**
     * 增加一个新的观察者对象
     * @param Observer $observer
     */
    public function attach(Observer $observer) {
        //return array_push($this->_observers, $observer);
        $this->_observers->attach($observer);
    }

    /**
     * 删除一个已注册过的观察者对象
     * @param Observer $observer
     */
    public function detach(Observer $observer) {
        /*$index = array_search($observer, $this->_observers);
        if ($index === FALSE || ! array_key_exists($index, $this->_observers)) {
            return FALSE;
        }

        unset($this->_observers[$index]);
        return TRUE;*/
        $this->_observers->detach($observer);
    }

    /**
     * 通知所有注册过的观察者对象
     */
    public function notifyObservers() {
        /*if (!is_array($this->_observers)) {
            return FALSE;
        }*/

        foreach ($this->_observers as $observer) {
            $observer->update();
        }

        return TRUE;
    }

}