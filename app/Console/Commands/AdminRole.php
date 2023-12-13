<?php

	namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;


	class AdminRole extends Command
	{
		/**
			* The name and signature of the console command.
			*
			* @var string
		*/
		protected $signature = 'superadmin:make {id} {--role=superadmin} {--action=create}';

		/**
			* The console command description.
			*
			* @var string
		*/
		protected $description = 'Create New Super Admin';

		/**
			* Create a new command instance.
			*
			* @return void
		*/
		public function __construct()
		{
			parent::__construct();
		}

		/**
			* Execute the console command.
			*
			* @return mixed
		*/
		public function handle()
		{
			$options = $this->options();
			app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

			$user = User::find($this->argument('id'));
			if($options['action'] == 'create'){
				$user->assignRole($options['role']);
				}elseif($options['action'] == 'delete'){
				$user->removeRole($options['role']);
			}
			$this->info('Assigned Successfully');
		}
	}
