<?php

namespace Modules\Core\Services;

use UnexpectedValueException;

class CoreCrypt
{

    /**
     * Encrypts given data with given key, iv and aad, returns a base64 encoded string.
     *
     * @param string $plaintext - Text to encode.
     * @param string $key - The secret key, 32 bytes string.
     * @param string $iv - The initialization vector, 16 bytes string.
     * @param string $aad - The additional authenticated data, maybe empty string.
     *
     * @return string - The base64-encoded ciphertext.
     */
    public static function encrypt(
        string $plaintext,
        string $key = 'SSH',
        string $iv = 'base64-encoded',
        string $aad = ''
    ): string {
        $ciphertext = openssl_encrypt($plaintext, 'aes-256-gcm', $key, OPENSSL_RAW_DATA, $iv, $tag, $aad, 16);

        if (false === $ciphertext) {
            throw new UnexpectedValueException('Encrypting the input $plaintext error, please checking your $key and $iv whether or nor correct.');
        }

        return base64_encode($ciphertext . $tag);
    }

    /**
     * Takes a base64 encoded string and decrypts it using a given key, iv and aad.
     *
     * @param string $ciphertext - The base64-encoded ciphertext.
     * @param string $key - The secret key, 32 bytes string.
     * @param string $iv - The initialization vector, 16 bytes string.
     * @param string $aad - The additional authenticated data, maybe empty string.
     *
     * @return string - The utf-8 plaintext.
     */
    public static function decrypt(
        string $ciphertext,
        string $key = 'SSH',
        string $iv = 'base64-encoded',
        string $aad = ''
    ): string {
        $ciphertext = base64_decode($ciphertext);
        $authTag = substr($ciphertext, -16);
        $tagLength = strlen($authTag);

        /* Manually checking the length of the tag, because the `openssl_decrypt` was mentioned there, it's the caller's responsibility. */
        if ($tagLength > 16 || ($tagLength < 12 && $tagLength !== 8 && $tagLength !== 4)) {
            return false;
        }

        $plaintext = openssl_decrypt(substr($ciphertext, 0, -16), 'aes-256-gcm', $key, OPENSSL_RAW_DATA, $iv, $authTag, $aad);

        if (false === $plaintext) {
            return false;
        }

        return $plaintext;
    }

}
