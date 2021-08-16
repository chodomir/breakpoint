<?php
/**
 * Modified Logger class writen by advename
 * @link https://github.com/advename/Simple-PHP-Logger
 */
class Logger
{
    private $file;
    private string $log_path;
    private string $log_format;

    public function __construct(string $logFormat)
    {
        $this->log_format = $logFormat;
        $this->log_path = __DIR__ . "/logs/log-" . date('d-M-Y') . ".txt";

        if (!file_exists(__DIR__ . "/logs")) {
            mkdir(__DIR__ . "/logs");
        }
        if (!file_exists($this->log_path)) {
            $this->file = fopen($this->log_path, 'w');
        }
    }

    public function i(string $message, array $context = [])
    {
        $bt = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 1);
        $this->log([
            'message' => $message,
            'bt' => $bt,
            'severity' => "INFO",
            'context' => $context
        ]);
    }

    public function w(string $message, array $context = [])
    {
        $bt = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 1);
        $this->log([
            'message' => $message,
            'bt' => $bt,
            'severity' => "WARNING",
            'context' => $context
        ]);
    }

    public function e(string $message, array $context = [])
    {
        $bt = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 1);
        $this->log([
            'message' => $message,
            'bt' => $bt,
            'severity' => "ERROR",
            'context' => $context
        ]);
    }

    private function log($args = [])
    {
        if (!is_resource($this->file)) {
            $this->file = fopen($this->log_path, 'a');
        }

        $time = date($this->log_format);
        $context = json_encode($args['context']);
        $caller = array_shift($args['bt']);
        $btLine = $caller['line'];
        $btPath = $caller['file'];
        $path = $this->absToRelPath($btPath);
        $timeLog = is_null($time) ? "[N/A] " : "[{$time}] ";
        $pathLog = is_null($path) ? "[N/A] " : "[{$path}] ";
        $lineLog = is_null($btLine) ? "[N/A] " : "[{$btLine}] ";
        $severityLog = is_null($args['severity']) ? "[N/A] " : "[{$args['severity']}] ";
        $messageLog = is_null($args['message']) ? "[N/A] " : "[{$args['message']}] ";
        $contextLog = empty($args['context']) ? "[N/A] " : "[{$context}] ";

        fwrite($this->file, "{$timeLog}{$pathLog}{$lineLog}: {$severityLog} - {$messageLog} {$contextLog}" . PHP_EOL);

        if ($this->file) {
            fclose($this->file);
        }
    }

    private function absToRelPath(string $path)
    {
        $pathAbs = str_replace(['/', '\\'], '/', $path);
        $documentRoot = str_replace(['/', '\\'], '/', $_SERVER['DOCUMENT_ROOT']);
        return $_SERVER['SERVER_NAME'] . str_replace($documentRoot, '', $pathAbs);
    }
}
