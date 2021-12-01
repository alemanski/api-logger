<?php

namespace ALemanski\ApiLogger\Logger\Handler;

use Monolog\Logger as MonologLogger;
use Magento\Framework\Logger\Handler\Base as BaseHandler;

/**
 * ApiRequestHandler class.
 * Log stream handler.
 */
class ApiRequestsHandler extends BaseHandler
{

    /**
     * Logging level
     *
     * @var int
     */
    protected $loggerType = MonologLogger::INFO;

    /**
     * File name
     *
     * @var string
     */
    protected $fileName = '/var/log/api-logger/info.log';

}
