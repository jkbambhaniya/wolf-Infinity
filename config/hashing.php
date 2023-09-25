<?php

return [

	/*
    |--------------------------------------------------------------------------
    | Default Hash Driver
    |--------------------------------------------------------------------------
    |
    | This option controls the default hash driver that will be used to hash
    | passwords for your application. By default, the bcrypt algorithm is
    | used; however, you remain free to modify this option if you wish.
    |
    | Supported: "bcrypt", "argon", "argon2id"
    |
    */

	'driver' => 'bcrypt',

	/*
    |--------------------------------------------------------------------------
    | Bcrypt Options
    |--------------------------------------------------------------------------
    |
    | Here you may specify the configuration options that should be used when
    | passwords are hashed using the Bcrypt algorithm. This will allow you
    | to control the amount of time it takes to hash the given password.
    |
    */

	'bcrypt' => [
		'rounds' => env('BCRYPT_ROUNDS', 16),
	],

	/*
    |--------------------------------------------------------------------------
    | Argon Options
    |--------------------------------------------------------------------------
    |
    | Here you may specify the configuration options that should be used when
    | passwords are hashed using the Argon algorithm. These will allow you
    | to control the amount of time it takes to hash the given password.
    |
    */

	'argon' => [
		'memory' => 65536,
		'threads' => 1,
		'time' => 4,
	],

	/*
    |--------------------------------------------------------------------------
    | Salt String
    |--------------------------------------------------------------------------
    |
    | This salt string is used for generating HashIDs and should be set
    | to a random string, otherwise these generated HashIDs will not be
    | safe. Please do this definitely before deploying your application!
    |
    */

	'salt' => env('HASHID_SALT', 'your-secret-salt-string'),

	/*
    |--------------------------------------------------------------------------
    | Raw HashID Length
    |--------------------------------------------------------------------------
    |
    | This is the length of the raw HashID. The model prefix, separator
    | and the raw HashID are combined all together. So the Model HashID
    | length is the sum of raw HashID, separator, and model prefix lengths.
    |
    | Default: 13
    |
    */

	'length' => 20,

	/*
    |--------------------------------------------------------------------------
    | HashID Alphabet
    |--------------------------------------------------------------------------
    |
    | This alphabet will generate raw HashIDs. Please keep in mind that it
    | must contain at least 16 unique characters and can't contain spaces.
    |
    | Default: 'abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890'
    |
    */

	'alphabet' => 'abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890',

	/*
    |--------------------------------------------------------------------------
    | Model Prefix Length
    |--------------------------------------------------------------------------
    |
    | Here you can specify the length of the model prefix. By default, they
    | will generate it from the first letters of short class name.
    | Set it -1 to use full short class name as prefix.
    | Set it 0 to not use any prefix at all.
    |
    | Default: 3
    |
    */

	'prefix_length' => 0,

	/*
    |--------------------------------------------------------------------------
    | Model Prefix Case
    |--------------------------------------------------------------------------
    |
    | Here you can set the case of the prefix. Please keep in mind that for
    | some prefix cases, underscore (‘_’) characters will be added to the
    | prefix if your model name is multi word.
    |
    | Default: 'lower'
    |
    | Supported: "lower", "upper", "camel", "snake", "kebab",
    |            "title", "studly", "plural_studly"
    |
    */

	'prefix_case' => 'lower',

	/*
    |--------------------------------------------------------------------------
    | HashID Model Prefix Separator
    |--------------------------------------------------------------------------
    |
    | Here you can set the separator for your HashIDs. The separator
    | will be added between model prefix and the raw HashID.
    |
    | Default: '_'
    |
    */

	'separator' => '-',

	/*
    |--------------------------------------------------------------------------
    | HashID Database Column
    |--------------------------------------------------------------------------
    |
    | By using `SavesHashIDs` trait, you can save model HashIDs to database.
    | Here you can set the database column name for HashIDs to save.
    |
    | Default: 'hash_id'
    |
    */

	'database_column' => 'hash_id',

	/*
    |--------------------------------------------------------------------------
    | Model Specific Generators
    |--------------------------------------------------------------------------
    |
    | Here you can set specific HashID generators for individual Models.
    | Each one of the setting above can be defined per model. You can
    | see an example below as a comment.
    |
    */

	'model_generators' => [
		// App\Models\User::class => [
		//     'salt'            => 'your-model-specific-salt-string',
		//     'length'          => 13,
		//     'alphabet'        => 'abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890',
		//     'prefix_length'   => 3,
		//     'prefix_case'     => 'lower',
		//     'separator'       => '_',
		//     'database_column' => 'hash_id',
		// ],

		// App\Models\Post::class => [
		//     'salt'            => 'your-model-specific-salt-string',
		//     'length'          => 13,
		//     'alphabet'        => 'abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890', 
		//     'prefix'          => 'abc', // Custom prefix that is not auto-generated
		//     'separator'       => '_',
		// ],
	],

];
