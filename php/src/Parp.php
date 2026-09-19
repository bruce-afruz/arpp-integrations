<?php
declare(strict_types=1);
namespace PiruzAfruz\Parp;

final class Parp {
    public const TYPE = 'application/vnd.piruz.agent-rights';
    public const REL = 'https://github.com/bruce-afruz/piruz-agent-receipt/blob/main/SPEC.md#transport';

    /** Call before any response body is emitted. */
    public static function link(string $manifestPath): void {
        if (!str_starts_with($manifestPath, '/')) throw new \InvalidArgumentException('Use an absolute site path');
        header('Link: <' . $manifestPath . '>; rel="' . self::REL . '"; type="' . self::TYPE . '"', false);
    }
    /** Serve a pre-signed manifest token. */
    public static function manifest(string $token): never {
        header('Content-Type: ' . self::TYPE);
        header('Cache-Control: private, no-store');
        echo $token;
        exit;
    }
}
