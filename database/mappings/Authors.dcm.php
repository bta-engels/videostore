<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setPrimaryTable(array(
    'name' => 'authors',
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
    'fieldName' => 'firstname',
    'columnName' => 'firstname',
    'type' => 'string',
    'nullable' => false,
    'length' => 50,
    'options' =>
        array(
            'fixed' => false,
        ),
));
$metadata->mapField(array(
    'fieldName' => 'lastname',
    'columnName' => 'lastname',
    'type' => 'string',
    'nullable' => false,
    'length' => 50,
    'options' =>
        array(
            'fixed' => false,
        ),
));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_IDENTITY);
