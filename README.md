# Craft Volume Permissions

This is a Craft 3 module which allows settings the default permissions 
of all local volumes with environment variables. The following environment
variables are available:

    VOLUME_FILE_PUBLIC_PERMISSION=644
    VOLUME_FILE_PRIVATE_PERMISSION=660
    VOLUME_DIR_PUBLIC_PERMISSION=755
    VOLUME_DIR_PRIVATE_PERMISSION=700

Being able to setting the proper non-standard file permissions can be critical in certain environments.

### Dirty Hack?

This module is a bit of a hack as it uses Reflection to alter Flysystem's
hardcoded Local adapter defaults. Ideally a better solution is found in the future.

## License

The MIT License (MIT)

## Copyright 

Copyright (c) 2019 iMarc LLC

