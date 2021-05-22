<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setPrimaryTable(array(
    'name' => 'movies',
    'indexes' =>
        array(
            'movies_author_id_foreign' =>
                array(
                    'columns' =>
                        array(
                            0 => 'author_id',
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
    'fieldName' => 'title',
    'columnName' => 'title',
    'type' => 'string',
    'nullable' => false,
    'length' => 255,
    'options' =>
        array(
            'fixed' => false,
        ),
));
$metadata->mapField(array(
    'fieldName' => 'price',
    'columnName' => 'price',
    'type' => 'decimal',
    'nullable' => false,
    'precision' => 8,
    'scale' => 2,
));
$metadata->mapField(array(
    'fieldName' => 'image',
    'columnName' => 'image',
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
$metadata->mapOneToOne(array(
    'fieldName' => 'author',
    'targetEntity' => 'Authors',
    'cascade' =>
        array(),
    'fetch' => 2,
    'mappedBy' => NULL,
    'inversedBy' => NULL,
    'joinColumns' =>
        array(
            0 =>
                array(
                    'name' => 'author_id',
                    'referencedColumnName' => 'id',
                ),
        ),
    'orphanRemoval' => false,
));
