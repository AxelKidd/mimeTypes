<?php

/**
 * MIME Types tools
 *
 * @version v1.20220606
 * @author Axel Kidd <axel.kidd@gmail.com>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */
class mimeTypes {
    
    private const APACHE_MIME_TYPES_URL = 'http://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types';
    
    private array $mime_types;
    
    public function __construct() {
        $this->mime_types = self::init();        
    }
    
    private static function init() {
        $matches = array();
        $mime_types = array();
        $stream = file_get_contents(self::APACHE_MIME_TYPES_URL);
        $pattern = '/^([\w-]+\/[\w\d.+-_]+)\t+(([\w\d-]+\s?)+)$/m';
        preg_match_all($pattern, $stream, $matches, PREG_SET_ORDER, 0);
        foreach ($matches as $match) {
            $mime_types[$match[1]] = explode(' ', $match[2]);
        }
        return $mime_types;
    }
    
    /**
     * Return an array of all Apache MIME types
     * @return array
     */
    public function get_all(): array {
        return array_keys($this->mime_types);
    }
    
    
    /**
     * Get extension(s) for specified MIME Type
     * @param string $mime_type
     * @return array|null
     */
    public function get_extensions(string $mime_type): ?array {
        foreach ($this->mime_types as $key => $value) {
            if ($key == $mime_type) { return $value; }
        }
        return null;
    }
}
