<?php 

namespace Pishgaman\PishgamanApi\Services;

use Pishgaman\Pishgaman\Database\Models\User\User;
use Pishgaman\PishgamanApi\Database\Models\WsWebService;
use Pishgaman\PishgamanApi\Database\Models\WsWebServiceAccess;
use Illuminate\Support\Facades\Hash;
use Log;

class AuthenticationService
{
    public function authenticateUser($username, $password, $apicode)
    {
        // چک کردن وجود کاربر با نام کاربری و رمز
        $user = $this->findUser($username, $password);

        if (!$user) {
            return ['error' => 'Invalid credentials'];
        }

        // چک کردن وجود WsWebService با apicode
        $wsWebService = $this->findWsWebService($apicode);

        if (!$wsWebService) {
            return ['error' => 'Invalid apicode'];
        }

        // چک کردن وجود رابطه در WsWebServiceAccess
        $wsWebServiceAccess = $this->findWsWebServiceAccess($user, $wsWebService);

        if ($wsWebServiceAccess == 0) {
            return ['error' => 'User does not have access to the specified web service'];
        }

        return ['success' => true];
    }

    protected function findUser($username, $password)
    {
        $user = User::where('username', $username)->first();
    
        // بررسی اینکه آیا کاربر وجود دارد یا خیر
        if (!$user) {
            return null; // یا هر نشانی دیگر که نشان دهنده عدم یافتن کاربر
        }
    
        $hashedPasswordFromDatabase = $user->password;
        
        // بررسی رمز عبور
        if (Hash::check($password, $hashedPasswordFromDatabase)) {
            return $user;
        }
    
        return null; // یا هر نشانی دیگر که نشان دهنده عدم صحت رمز عبور
    }

    protected function findWsWebService($apicode)
    {
        return WsWebService::where('code', $apicode)->first();
    }

    protected function findWsWebServiceAccess($user, $wsWebService)
    {
        return WsWebServiceAccess::where('user_id', $user->id)
            ->where('web_service_id', $wsWebService->id)
            ->count();
    }
}
