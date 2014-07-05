<?php
class AdvanceTplAction extends UserAction{
    public function _initialize() {
        parent::_initialize();
        //
        $this->canUseFunction('advanceTpl');
        header('Location:/138mb/manage/index.php');
    }
}

