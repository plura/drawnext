<?php
// backend/lib/Auth.php

namespace Lib;

class Auth {
	
    // Auth mode constants
    const METHOD_EMAIL_ONLY = 'email_only';
    const METHOD_EMAIL_PASSWORD = 'email_password';
    const METHOD_MAGIC_LINK = 'magic_link';

    public static function init(): void {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function login(string $email, ?string $password = null): bool {
        self::init();
        $authMode = Config::get('auth_method');

        switch ($authMode) {
            case self::METHOD_EMAIL_ONLY:
                $_SESSION['user_email'] = $email;
                return true;

            case self::METHOD_EMAIL_PASSWORD:
                if ($password && self::validatePassword($email, $password)) {
                    $_SESSION['user_email'] = $email;
                    return true;
                }
                return false;

            default:
                error_log("Unknown auth mode: $authMode");
                return false;
        }
    }

	public static function getEmail(): ?string {
		self::init();
		return $_SESSION['user_email'] ?? null;
	}

	private static function validatePassword(string $email, string $password): bool {
		// TODO: Implement proper validation
		return false;
	}
}
