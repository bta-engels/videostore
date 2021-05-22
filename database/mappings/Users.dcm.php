<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setPrimaryTable(array(
    'name' => 'users',
    'uniqueConstraints' =>
        array(
            'users_email_unique' =>
                array(
                    'columns' =>
                        array(
                            0 => 'email',
                        ),
                ),
        ),
));
$metadata->setChangeTrackingPolicy(ClassMetadataInfo::CHANGETRACKING_DEFERRED_IMPLICIT);
$metadata->mapField(array(
    'fieldName' => 'id',
    'columnName' => 'id',
    'type' => 'bigint',
    'nullable' => false,
    'options' =>
        array(
            'unsigned' => true,
        ),
    'id' => true,
));
$metadata->mapField(array(
    'fieldName' => 'name',
    'columnName' => 'name',
    'type' => 'string',
    'nullable' => false,
    'length' => 255,
    'options' =>
        array(
            'fixed' => false,
        ),
));
$metadata->mapField(array(
    'fieldName' => 'email',
    'columnName' => 'email',
    'type' => 'string',
    'nullable' => false,
    'length' => 50,
    'options' =>
        array(
            'fixed' => false,
        ),
));
$metadata->mapField(array(
    'fieldName' => 'emailVerifiedAt',
    'columnName' => 'email_verified_at',
    'type' => 'datetime',
    'nullable' => true,
));
$metadata->mapField(array(
    'fieldName' => 'password',
    'columnName' => 'password',
    'type' => 'string',
    'nullable' => false,
    'length' => 255,
    'options' =>
        array(
            'fixed' => false,
        ),
));
$metadata->mapField(array(
    'fieldName' => 'rememberToken',
    'columnName' => 'remember_token',
    'type' => 'string',
    'nullable' => true,
    'length' => 100,
    'options' =>
        array(
            'fixed' => false,
        ),
));
$metadata->mapField(array(
    'fieldName' => 'createdAt',
    'columnName' => 'created_at',
    'type' => 'datetime',
    'nullable' => true,
));
$metadata->mapField(array(
    'fieldName' => 'updatedAt',
    'columnName' => 'updated_at',
    'type' => 'datetime',
    'nullable' => true,
));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_IDENTITY);
