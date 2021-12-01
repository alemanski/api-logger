<?php

namespace ALemanski\ApiLogger\Plugin;

use Magento\Framework\App\RequestInterface;
use Magento\Webapi\Controller\Rest;
use /** @noinspection PhpMultipleClassDeclarationsInspection */
    Psr\Log\LoggerInterface as PsrLoggerInterface;

/**
 * RestApiLog plugin.
 *
 * Plugin dedicated to writing all the information related to the REST API
 * requests to the log file.
 * @noinspection PhpUnused PhpMultipleClassDeclarationsInspection
 */
class RestApiLog
{

    /**
     * Handle for the logger instance.
     *
     * @var PsrLoggerInterface
     * @noinspection PhpMultipleClassDeclarationsInspection
     */
    private PsrLoggerInterface $logger;

    /**
     * RestApiLog constructor.
     *
     * @param PsrLoggerInterface $logger
     * @noinspection PhpMultipleClassDeclarationsInspection PhpUnused
     */
    public function __construct(PsrLoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Log all the details for the given API request data and proceed to the
     * normal execution of the code.
     *
     * @param Rest $subject
     * @param RequestInterface $request
     * @noinspection PhpUnused PhpPossiblePolymorphicInvocationInspection
     */
    public function beforeDispatch(
        /** @noinspection PhpUnusedParameterInspection */ Rest $subject,
        RequestInterface $request
    ) {
        $requestData = [
            'source' => $request->getClientIp(),
            'method' => $request->getMethod(),
            'headers' => $request->getHeaders()->toArray(),
            'params' => $request->getParams(),
            'path' => $request->getPathInfo(),
            'content' => $request->getContent()
        ];

        $this->logger->info(serialize($requestData));
    }

}
