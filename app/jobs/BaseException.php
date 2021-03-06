<?php
// +------------------------------------------------------------------
// | File: BaseException.php
// +------------------------------------------------------------------
// | Author: jinhui - <ryokinki@163.com>
// +------------------------------------------------------------------
// | Create: 2018-10-11 15:56:39
// +------------------------------------------------------------------

namespace App\Jobs;

class BaseException extends \Exception {

	public $delayTime = 10;//10s
	public function __construct($delay = 1) {
		$this->delayMinutes = $delay * 60;
	}

	public function delay() {
		return $this->delayTime;
	}
}
