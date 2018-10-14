<?php
// +------------------------------------------------------------------
// | File: BaseJob.php
// +------------------------------------------------------------------
// | Author: jinhui - <ryokinki@163.com>
// +------------------------------------------------------------------
// | Create: 2018-10-12 15:48:43
// +------------------------------------------------------------------

namespace App\Jobs;

class BaseJob {

	public function callJob($queue, $job, $data, $method) {
		try {
			$this->{$method}($data);
			$job->delete();
		} catch (\Exception $e) {
			if ($e instanceof App\Jobs\RetryException) {
				$job->release(['delay' => $e->delay()]);
			} else {
				$job->release(['delay' => 10]);
			}
			//需要处理重试次数多次仍然失败问题
			$msg = msge($e);
			//写入日志
			var_dump($msg);
		}
	}
}
