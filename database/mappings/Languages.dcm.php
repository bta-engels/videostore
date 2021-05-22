<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setPrimaryTable(array(
    'name' => 'languages',
));
$metadata->setChangeTrackingPolicy(ClassMetadataInfo::CHANGETRACKING_DEFERRED_IMPLICIT);
$metadata->mapField(array(
    'fieldName' => 'id',
    'columnName' => 'id',
    'type' => 'integer',
    'nullable' => false,
    'options' =>
        array(
            'unsigned' => true,
        ),
    'id' => true,
));
$metadata->mapField(array(
    'fieldName' => 'code',
    'columnName' => 'code',
    'type' => 'string',
    'nullable' => false,
    'length' => 2,
    'options' =>
        array(
            'fixed' => false,
            'default' => '',
        ),
));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_IDENTITY);
