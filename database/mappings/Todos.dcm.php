<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setPrimaryTable(array(
    'name' => 'todos',
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
    'fieldName' => 'done',
    'columnName' => 'done',
    'type' => 'boolean',
    'nullable' => false,
    'options' =>
        array(
            'default' => '0',
        ),
));
$metadata->mapField(array(
    'fieldName' => 'text',
    'columnName' => 'text',
    'type' => 'string',
    'nullable' => false,
    'length' => 50,
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
