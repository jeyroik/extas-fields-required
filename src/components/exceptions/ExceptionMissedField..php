<?php
namespace extas\components\exceptions;

use extas\interfaces\exceptions\IExceptionMissedField;
use Throwable;

/**
 * Class ExceptionMissedField
 *
 * @package extas\components\exceptions
 * @author jeyroik@gmail.com
 */
class ExceptionMissedField extends \Exception implements IExceptionMissedField
{
    /**
     * ExceptionMissedField constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct(
            'Missed field "' . $message . '"',
            404,
            $previous
        );
    }
}
