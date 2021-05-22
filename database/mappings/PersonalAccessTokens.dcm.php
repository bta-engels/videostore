<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setPrimaryTable(array(
    'name' => 'personal_access_tokens',
    'uniqueConstraints' =>
        array(
            'personal_access_tokens_token_unique' =>
                array(
                    'columns' =>
                        array(
                            0 => 'token',
                        ),
                ),
        ),
    'indexes' =>
        array(
            'personal_access_tokens_tokenable_type_tokenable_id_index' =>
                array(
                    'columns' =>
                        array(
                            0 => 'tokenable_type',
                            1 => 'tokenable_id',
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
    'fieldName' => 'tokenableType',
    'columnName' => 'tokenable_type',
    'type' => 'string',
    'nullable' => false,
    'length' => 255,
    'options' =>
        array(
            'fixed' => false,
        ),
));
$metadata->mapField(array(
    'fieldName' => 'tokenableId',
    'columnName' => 'tokenable_id',
    'type' => 'bigint',
    'nullable' => false,
    'options' =>
        array(
            'unsigned' => true,
        ),
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
    'fieldName' => 'token',
    'columnName' => 'token',
    'type' => 'string',
    'nullable' => false,
    'length' => 64,
    'options' =>
        array(
            'fixed' => false,
        ),
));
$metadata->mapField(array(
    'fieldName' => 'abilities',
    'columnName' => 'abilities',
    'type' => 'text',
    'nullable' => true,
    'length' => 65535,
    'options' =>
        array(
            'fixed' => false,
        ),
));
$metadata->mapField(array(
    'fieldName' => 'lastUsedAt',
    'columnName' => 'last_used_at',
    'type' => 'datetime',
    'nullable' => true,
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
