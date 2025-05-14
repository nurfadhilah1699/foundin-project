<?php

namespace App\Helpers;

class FormatTextHelper
{
    /**
     * Format teks dengan opsi newline ke <br> atau <p>
     *
     * @param string $text Teks yang mau diformat
     * @param string $newlineType 'br' atau 'p'
     * @return string
     */
    public static function formatText($text, $newlineType = 'br')
    {
        $text = e($text);

        // Daftar valid domain extension yang didukung
        $validExtensions = 'com|net|org|id|co\.id|io|dev|ai|xyz|info';

        // Regex untuk link: http/https, www, atau domain valid
        $pattern = '/((https?:\/\/|www\.)[^\s]+|[a-z0-9\-]+\.(?:' . $validExtensions . ')(\/[^\s]*)?)/i';

        $text = preg_replace_callback(
            $pattern,
            function ($matches) {
                $url = $matches[0];
                // Tambahin http kalau belum ada
                if (!preg_match('/^https?:\/\//', $url)) {
                    $url = 'http://' . $url;
                }
                return '<a href="' . $url . '" target="_blank" rel="noopener noreferrer" class="text-primary">' . $matches[0] . '</a>';
            },
            $text
        );

        if ($newlineType === 'p') {
            $lines = explode("\n", $text);
            $lines = array_map(fn($line) => '<p>' . $line . '</p>', $lines);
            $text = implode('', $lines);
        } else {
            $text = nl2br($text);
        }

        return $text;
    }

}
