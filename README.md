# Craft Volume Permissions

This is a Craft 3 module which allows settings the default permissions 
of all local volumes with environment variables. The following environment
variables are available:

    VOLUME_FILE_PUBLIC_PERMISSION=664
    VOLUME_FILE_PRIVATE_PERMISSION=660
    VOLUME_DIR_PUBLIC_PERMISSION=775
    VOLUME_DIR_PRIVATE_PERMISSION=770

Being able to set the proper non-standard file permissions can be critical in certain environments. 
A specific example is deploying to a filesystem using ACLs where it is essential that directories and files are group writable.

## Install

Install in your Craft 3 project using composer:

    composer require imarc/craft-volume-permissions

Then enable the module within your `config/app.php` file:

    <?php
    return [
        'modules' => [
            'volume-permissions' => \Imarc\Craft\Modules\VolumePermissions::class,
        ],
        'bootstrap' => [
            'volume-permissions',
        ],
    ];

Then use the environment variables to configure the permissions.

### Dirty Hack?

This module is a bit of a hack as it uses Reflection to alter Flysystem's
hardcoded Local adapter defaults. Ideally a better solution is found in the future.

## License

The MIT License (MIT)

## Copyright 

Copyright (c) 2019 iMarc LLC

