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
                'images/short-links-new' => 'images/short-links/new',
                'short_link/<_c:[a-zA-Z0-9_-]+>/<action:[a-zA-Z0-9_-]+>' => 'short_link/<_c>/<action>',
                'l/<token:[a-zA-Z0-9_-]{1,500}+>' => 'short_link/short-links/redirect',
            ]
        );
    }
}