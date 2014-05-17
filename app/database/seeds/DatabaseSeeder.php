<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('OauthClientSeeder');
		$this->call('oauthClientEndpointSeeder');
		$this->call('OauthScopeSeeder');
	}

}

class UserTableSeeder extends Seeder {
	public function run()
	{
		DB::table('users')->delete();

		DB::table('users')->insert([
			'email' => 'your-email@example.com',
			'password' => Hash::make('password'),
		]);
	}
}

class OauthClientSeeder extends Seeder {
	public function run()
	{
		DB::table('oauth_clients')->delete();

		DB::table('oauth_clients')->insert([
			'id' => 'my_client_id',
			'secret' => 'my_client_secret',
			'name' => 'My first client',
		]);
	}
}

class oauthClientEndpointSeeder extends Seeder {
	public function run()
	{
		DB::table('oauth_client_endpoints')->delete();

		DB::table('oauth_client_endpoints')->insert([
			'client_id' => 'my_client_id',
			'redirect_uri' => rtrim(Config::get('app.url'), '/').'/'.'callback',
		]);
	}
}

class OauthScopeSeeder extends Seeder {
	public function run()
	{
		DB::table('oauth_scopes')->delete();

		DB::table('oauth_scopes')->insert([
			[
				'scope' => 'scope1',
				'name' => 'SCOPE 1',
				'description' => 'Description for SCOPE 1',
			],
			[
				'scope' => 'scope2',
				'name' => 'SCOPE 2',
				'description' => 'Description for SCOPE 2',
			],
			[
				'scope' => 'scope3',
				'name' => 'SCOPE 3',
				'description' => 'Description for SCOPE 3',
			],
		]);
	}
}
