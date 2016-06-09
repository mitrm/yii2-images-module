Yii2 images , загрузка, отображение изображений
===============================================


## Install
```
composer require --prefer-dist mitrm/yii2-images-module "dev-master"
```


- Run migrations:

```
php yii migrate --migrationPath=@mitrm/images/migrations
```

In config file:

```php
'modules' => [
    'mitrm_images' => [
        'class' => 'mitrm\images\Module',
        'domain' => site.ru,
        'base_path' => '@statics/web/mt/images',
        'base_dir' => '/statics/mt/images',
    ],
]
```

## Usage
```
<?= \mitrm\images\widgets\ImagesUploadWidget::widget([
    'toggleButton' => [
        'label' => 'Загрузить',
        'tag' => 'a'
    ]
])?>

```