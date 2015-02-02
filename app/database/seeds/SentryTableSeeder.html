<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SentryTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		# Create sample user accounts
		
		Sentry::getUserProvider()->create(array(
      'email'       => 'master@master.com',
      'password'    => 'master',
      'first_name'  => 'Master',
      'last_name'   => 'User',
      'activated'   => 1,
    ));

    Sentry::getUserProvider()->create(array(
      'email'       => 'accounts@user.com',
      'password'    => 'accounts',
      'first_name'  => $faker->firstName,
      'last_name'   => $faker->lastName,
      'activated'   => 1,
    ));

    Sentry::getUserProvider()->create(array(
      'email'       => 'user@user.com',
      'password'    => 'user',
      'first_name'  => $faker->firstName,
      'last_name'   => $faker->lastName,
      'activated'   => 1,
    ));

		# Create user groups and permissions
		
		Sentry::getGroupProvider()->create(array(
      'name'        => 'Master',
      'permissions' => array('all' => 1),
    ));

    Sentry::getGroupProvider()->create(array(
      'name'        => 'Accountant',
      'permissions' => array('reports.view' => 1, 'deposit' => 1, 'withdraw' => 1),
    ));

    # Assign users to groups
    
    $masterUser  = Sentry::getUserProvider()->findByLogin('master@master.com');
    $accountantUser  = Sentry::getUserProvider()->findByLogin('accounts@user.com');
    $user  = Sentry::getUserProvider()->findByLogin('user@user.com');

    $masterGroup = Sentry::getGroupProvider()->findByName('Master');
    $accountantGroup = Sentry::getGroupProvider()->findByName('Accountant');

    $masterUser->addGroup($masterGroup);
    $accountantUser->addGroup($accountantGroup);
    $user->addGroup($masterGroup);
	}

}