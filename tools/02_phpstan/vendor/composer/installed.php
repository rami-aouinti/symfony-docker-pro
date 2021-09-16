<?php return array(
    'root' => array(
        'pretty_version' => 'dev-master',
        'version' => 'dev-master',
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'reference' => 'a0907105c2b029bfd59f1d826bd94b83de5ba384',
        'name' => 'dimadeush/docker-apache-php-symfony-tools',
        'dev' => true,
    ),
    'versions' => array(
        'dimadeush/docker-apache-php-symfony-tools' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'reference' => 'a0907105c2b029bfd59f1d826bd94b83de5ba384',
            'dev_requirement' => false,
        ),
        'phpstan/phpstan' => array(
            'pretty_version' => '0.12.96',
            'version' => '0.12.96.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../phpstan/phpstan',
            'aliases' => array(),
            'reference' => 'a98bdc51318f20fcae8c953d266f81a70254917f',
            'dev_requirement' => true,
        ),
        'phpstan/phpstan-phpunit' => array(
            'pretty_version' => '0.12.22',
            'version' => '0.12.22.0',
            'type' => 'phpstan-extension',
            'install_path' => __DIR__ . '/../phpstan/phpstan-phpunit',
            'aliases' => array(),
            'reference' => '7c01ef93bf128b4ac8bdad38c54b2a4fd6b0b3cc',
            'dev_requirement' => true,
        ),
        'phpstan/phpstan-symfony' => array(
            'pretty_version' => '0.12.42',
            'version' => '0.12.42.0',
            'type' => 'phpstan-extension',
            'install_path' => __DIR__ . '/../phpstan/phpstan-symfony',
            'aliases' => array(),
            'reference' => '2c240808116be56c7129d9d48b8dd40d1344e0eb',
            'dev_requirement' => true,
        ),
        'roave/security-advisories' => array(
            'pretty_version' => 'dev-latest',
            'version' => 'dev-latest',
            'type' => 'metapackage',
            'install_path' => NULL,
            'aliases' => array(
                0 => '9999999-dev',
            ),
            'reference' => '295e62200d6e91c0bd5b3d78715b00c3bdc8f28f',
            'dev_requirement' => true,
        ),
    ),
);
