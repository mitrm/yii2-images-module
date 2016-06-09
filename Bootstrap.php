<?php
namespace mitrm\images;

use yii\base\BootstrapInterface;

/**
 * Gallery module bootstrap class.
 */
class Bootstrap implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        // Add module URL rules.
        $app->getUrlManager()->addRules(
            [
                'mitrm_images/<_c:[a-zA-Z0-9_-]+>/<action:[a-zA-Z0-9_-]+>' => 'mitrm_images/<_c>/<action>',
                //'l/<token:[a-zA-Z0-9_-]{1,500}+>' => 'short_link/short-links/redirect',
            ]
        );
    }
}