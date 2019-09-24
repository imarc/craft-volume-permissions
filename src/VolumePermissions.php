<?php
namespace Imarc\Craft\Modules;


/**
 * Volume Permissions module class.
 *
 * Learn more about Yii module development in Yii's documentation:
 * http://www.yiiframework.com/doc-2.0/guide-structure-modules.html
 */
class VolumePermissions extends \yii\base\Module
{
    /**
     * Initializes the module.
     */
    public function init()
    {
        $prop = new \ReflectionProperty('League\Flysystem\Adapter\Local', 'permissions');
        $prop->setAccessible(true);
        $prop->setValue([
            'file' => [
                'public' => $this->getOctal(getenv('VOLUME_FILE_PUBLIC_PERMISSION'), 0644),
                'private' => $this->getOctal(getenv('VOLUME_FILE_PRIVATE_PERMISSION'), 0600),
            ],
            'dir' => [
                'public' => $this->getOctal(getenv('VOLUME_DIR_PUBLIC_PERMISSION'), 0755),
                'private' => $this->getOctal(getenv('VOLUME_DIR_PRIVATE_PERMISSION'), 0700),
            ],
        ]);

        parent::init();
    }

    /**
     * Ensure the supplied mask is an octal
     */
    protected function getOctal($mask = null, $default)
    {
        if (!$mask) {
            return $default;
        }

        return intval($mask, 8);
    }
}
