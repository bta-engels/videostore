<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setPrimaryTable(array(
    'name' => 'translations',
    'indexes' =>
        array(
            'language' =>
                array(
                    'columns' =>
                        array(
                            0 => 'language',
                        ),
                ),
            'translatable_id' =>
                array(
                    'columns' =>
                        array(
                            0 => 'translatable_id',
                            1 => 'translatable_type',
                        ),
                ),
        ),
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
    'fieldName' => 'translatableId',
    'columnName' => 'translatable_id',
    'type' => 'integer',
    'nullable' => false,
    'options' =>
        array(
            'unsigned' => true,
        ),
));
$metadata->mapField(array(
    'fieldName' => 'translatableType',
    'columnName' => 'translatable_type',
    'type' => 'string',
    'nullable' => false,
    'length' => 50,
    'options' =>
        array(
            'fixed' => false,
        ),
));
$metadata->mapField(array(
    'fieldName' => 'language',
    'columnName' => 'language',
    'type' => 'string',
    'nullable' => false,
    'length' => 2,
    'options' =>
        array(
            'fixed' => false,
        ),
));
$metadata->mapField(array(
    'fieldName' => 'content',
    'columnName' => 'content',
    'type' => 'text',
    'nullable' => false,
    'length' => 0,
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
