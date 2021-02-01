<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Resources\LoginResource;

use App\Traits\Messages;

class LoginController extends Controller
{
    use Messages;

    public function __construct()
    {
        $this->middleware('auth:api')->only('logout');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            return $this->jsonErrorDataValidation($validator->errors());
        }

        $login = $validator->valid();

        if (!Auth::attempt($login)) {
            return $this->jsonErrorInvalidCredentials();
        }

        $token = Auth::user()->createToken('authToken');
        $user = User::find(Auth::id());
        $user->token = $token->accessToken;

        $data = new LoginResource($user);

        return $this->jsonSuccessResponse($data, 200);
    }

    public function logout()
    {
        $revoked = Auth::guard('api')->user()->token()->revoke();
        if ($revoked) {
            return $this->jsonSuccessLogout();
        }
        return $this->jsonFailedResponse(null, $this->http_code_error, 'Something went wrong.');
    }
}
