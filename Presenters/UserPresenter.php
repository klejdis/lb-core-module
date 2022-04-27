<?php

namespace Modules\LBCore\Presenters;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter
{

    /**
     * @return string
     */
    public function fullname()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
