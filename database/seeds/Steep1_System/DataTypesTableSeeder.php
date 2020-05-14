<?php

use Illuminate\Database\Seeder;

class DataTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\DataTypes::truncate();
        /*BIGINT equivalent column.
        ( $table->bigInteger('votes'); )*/

        \App\Models\DataTypes::create([
                'id' => 2,
                'data_type_code' => 'bigInteger',
                'data_type_name' => 'bigInteger',
                'data_type_rem' => 'BIGINT equivalent column.',
                'created_by' => 10000,
                'updated_by' => 10000,
                ]);

        /*BOOLEAN equivalent column.
        ( $table->boolean('confirmed'); )*/

        \App\Models\DataTypes::create([
                'id' => 4,
                'data_type_code' => 'boolean',
                'data_type_name' => 'boolean',
                'data_type_rem' => 'BOOLEAN equivalent column.',
                'created_by' => 10000,
                'updated_by' => 10000,
                ]);
        /*CHAR equivalent column with an optional length.
        ( $table->char('name', 100); )*/

        \App\Models\DataTypes::create([
                'id' => 5,
                'data_type_code' => 'char',
                'data_type_name' => 'char',
                'data_type_rem' => 'CHAR equivalent column with an optional length.',
                'created_by' => 10000,
                'updated_by' => 10000,
                ]);

        /*DATE equivalent column.
        ( $table->date('created_at'); )*/

        \App\Models\DataTypes::create([
                'id' => 6,
                'data_type_code' => 'date',
                'data_type_name' => 'date',
                'data_type_rem' => 'DATE equivalent column.',
                'created_by' => 10000,
                'updated_by' => 10000,
                ]);

        /*DATETIME equivalent column.
        ( $table->dateTime('created_at'); )*/

        \App\Models\DataTypes::create([
                'id' => 7,
                'data_type_code' => 'dateTime',
                'data_type_name' => 'dateTime',
                'data_type_rem' => 'DATETIME equivalent column.',
                'created_by' => 10000,
                'updated_by' => 10000,
                ]);
        /*DATETIME (with timezone) equivalent column.
        ( $table->dateTimeTz('created_at'); )*/

        \App\Models\DataTypes::create([
                'id' => 8,
                'data_type_code' => 'dateTimeTz',
                'data_type_name' => 'dateTimeTz',
                'data_type_rem' => 'DATETIME (with timezone) equivalent column.',
                'created_by' => 10000,
                'updated_by' => 10000,
                ]);

        /*DECIMAL equivalent column with a precision (total digits) and scale (decimal digits).
        ( $table->decimal('amount', 8, 2); )*/

        \App\Models\DataTypes::create([
                'id' => 9,
                'data_type_code' => 'decimal',
                'data_type_name' => 'decimal',
                'data_type_rem' => 'DECIMAL equivalent column with a precision (total digits) and scale (decimal digits).',
                'created_by' => 10000,
                'updated_by' => 10000,
                ]);

        /*DOUBLE equivalent column with a precision (total digits) and scale (decimal digits).
        ( $table->double('amount', 8, 2); )*/

        \App\Models\DataTypes::create([
                'id' => 10,
                'data_type_code' => 'double',
                'data_type_name' => 'double',
                'data_type_rem' => 'DOUBLE equivalent column with a precision (total digits) and scale (decimal digits).',
                'created_by' => 10000,
                'updated_by' => 10000,
                ]);

        /*FLOAT equivalent column with a precision (total digits) and scale (decimal digits).
        ( $table->float('amount', 8, 2); )*/

        \App\Models\DataTypes::create([
                'id' => 12,
                'data_type_code' => 'float',
                'data_type_name' => 'float',
                'data_type_rem' => 'FLOAT equivalent column with a precision (total digits) and scale (decimal digits).',
                'created_by' => 10000,
                'updated_by' => 10000,
                ]);

        /*INTEGER equivalent column.
        ( $table->integer('votes'); )*/

        \App\Models\DataTypes::create([
                'id' => 16,
                'data_type_code' => 'integer',
                'data_type_name' => 'integer',
                'data_type_rem' => 'INTEGER equivalent column.',
                'created_by' => 10000,
                'updated_by' => 10000,
                ]);

        /*IP address equivalent column.
        ( $table->ipAddress('visitor'); )*/

        \App\Models\DataTypes::create([
                'id' => 17,
                'data_type_code' => 'ipAddress',
                'data_type_name' => 'ipAddress',
                'data_type_rem' => 'IP address equivalent column.',
                'created_by' => 10000,
                'updated_by' => 10000,
                ]);

        /*LINESTRING equivalent column.
        ( $table->lineString('positions'); )*/

        \App\Models\DataTypes::create([
                'id' => 20,
                'data_type_code' => 'lineString',
                'data_type_name' => 'lineString',
                'data_type_rem' => 'LINESTRING equivalent column.',
                'created_by' => 10000,
                'updated_by' => 10000,
                ]);

        /*LONGTEXT equivalent column.
        ( $table->longText('description'); )*/

        \App\Models\DataTypes::create([
                'id' => 21,
                'data_type_code' => 'longText',
                'data_type_name' => 'longText',
                'data_type_rem' => 'LONGTEXT equivalent column.',
                'created_by' => 10000,
                'updated_by' => 10000,
                ]);

        /*MAC address equivalent column.
        ( $table->macAddress('device'); )*/

        \App\Models\DataTypes::create([
                'id' => 22,
                'data_type_code' => 'macAddress',
                'data_type_name' => 'macAddress',
                'data_type_rem' => 'MAC address equivalent column.',
                'created_by' => 10000,
                'updated_by' => 10000,
                ]);

        /*MEDIUMINT equivalent column.
        ( $table->mediumInteger('votes'); )*/

        \App\Models\DataTypes::create([
                'id' => 24,
                'data_type_code' => 'mediumInteger',
                'data_type_name' => 'mediumInteger',
                'data_type_rem' => 'MEDIUMINT equivalent column.',
                'created_by' => 10000,
                'updated_by' => 10000,
                ]);

        /*MEDIUMTEXT equivalent column.
        ( $table->mediumText('description'); )*/

        \App\Models\DataTypes::create([
                'id' => 25,
                'data_type_code' => 'mediumText',
                'data_type_name' => 'mediumText',
                'data_type_rem' => 'MEDIUMTEXT equivalent column.',
                'created_by' => 10000,
                'updated_by' => 10000,
                ]);

        /*MULTILINESTRING equivalent column.
        ( $table->multiLineString('positions'); )*/

        \App\Models\DataTypes::create([
                'id' => 27,
                'data_type_code' => 'multiLineString',
                'data_type_name' => 'multiLineString',
                'data_type_rem' => 'MULTILINESTRING equivalent column.',
                'created_by' => 10000,
                'updated_by' => 10000,
                ]);

        /*Adds a nullable remember_tokenVARCHAR(100) equivalent column.
        ( $table->rememberToken(); )*/

        \App\Models\DataTypes::create([
                'id' => 34,
                'data_type_code' => 'rememberToken',
                'data_type_name' => 'rememberToken',
                'data_type_rem' => 'Adds a nullable remember_tokenVARCHAR(100) equivalent column.',
                'created_by' => 10000,
                'updated_by' => 10000,
            ]);

        /*SMALLINT equivalent column.
        ( $table->smallInteger('votes'); )*/

        \App\Models\DataTypes::create([
                'id' => 36,
                'data_type_code' => 'smallInteger',
                'data_type_name' => 'smallInteger',
                'data_type_rem' => 'SMALLINT equivalent column.',
                'created_by' => 10000,
                'updated_by' => 10000,
                ]);

        /*VARCHAR equivalent column with a optional length.
        ( $table->string('name', 100); )*/

        \App\Models\DataTypes::create([
                'id' => 39,
                'data_type_code' => 'string',
                'data_type_name' => 'string',
                'data_type_rem' => 'VARCHAR equivalent column with a optional length.',
                'created_by' => 10000,
                'updated_by' => 10000,
                ]);

        /*TEXT equivalent column.
        ( $table->text('description'); )*/

        \App\Models\DataTypes::create([
                'id' => 40,
                'data_type_code' => 'text',
                'data_type_name' => 'text',
                'data_type_rem' => 'TEXT equivalent column.',
                'created_by' => 10000,
                'updated_by' => 10000,
                ]);

        /*TIME equivalent column.
        ( $table->time('sunrise'); )*/

        \App\Models\DataTypes::create([
                'id' => 41,
                'data_type_code' => 'time',
                'data_type_name' => 'time',
                'data_type_rem' => 'TIME equivalent column.',
                'created_by' => 10000,
                'updated_by' => 10000,
                ]);

        /*TIME (with timezone) equivalent column.
        ( $table->timeTz('sunrise'); )*/

        \App\Models\DataTypes::create([
                'id' => 42,
                'data_type_code' => 'timeTz',
                'data_type_name' => 'timeTz',
                'data_type_rem' => 'TIME (with timezone) equivalent column.',
                'created_by' => 10000,
                'updated_by' => 10000,
                ]);

        /*TIMESTAMP (with timezone) equivalent column.
        ( $table->timestampTz('added_on'); )*/

        \App\Models\DataTypes::create([
                'id' => 44,
                'data_type_code' => 'timestampTz',
                'data_type_name' => 'timestampTz',
                'data_type_rem' => 'TIMESTAMP (with timezone) equivalent column.',
                'created_by' => 10000,
                'updated_by' => 10000,
                ]);

        /*TINYINT equivalent column.
        ( $table->tinyInteger('votes'); )*/

        \App\Models\DataTypes::create([
                'id' => 48,
                'data_type_code' => 'tinyInteger',
                'data_type_name' => 'tinyInteger',
                'data_type_rem' => 'TINYINT equivalent column.',
                'created_by' => 10000,
                'updated_by' => 10000,
                ]);

        /*UUID equivalent column.
        ( $table->uuid('id'); )*/

        \App\Models\DataTypes::create([
                'id' => 55,
                'data_type_code' => 'uuid',
                'data_type_name' => 'uuid',
                'data_type_rem' => 'UUID equivalent column.',
                'created_by' => 10000,
                'updated_by' => 10000,
                ]);

        /*YEAR equivalent column.
        ( $table->year('birth_year'); )*/

        \App\Models\DataTypes::create([
                'id' => 56,
                'data_type_code' => 'year',
                'data_type_name' => 'year',
                'data_type_rem' => 'YEAR equivalent column.',
                'created_by' => 10000,
                'updated_by' => 10000,
                ]);


        \App\Models\DataTypes::create([
                'id' => 57,
                'data_type_code' => 'storedFile',
                'data_type_name' => 'storedFile',
                'data_type_rem' => 'Stored File',
                'created_by' => 'seed',
                'updated_by' => 'seed',
                ]);

    }
}
