<?php

	namespace App\Http\Middleware;
	use Illuminate\Support\Facades\Auth;
	use App\Models\UsersPermission as permission;

	use Closure;

	class CheckPermission
	{
		/**
			* Handle an incoming request.
			*
			* @param  \Illuminate\Http\Request  $request
			* @param  \Closure  $next
			* @return mixed
		*/
		public function handle($request, Closure $next,$PermissionType)
		{
			$user = permission::where('user_id', Auth::id())->first();

			if ($user->$PermissionType == 'true') {
				return $next($request);
				}else{
				return redirect('pa/access');
			}

		}
	}
