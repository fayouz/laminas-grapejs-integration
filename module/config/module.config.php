<?php

namespace Fayouz\Laminas\GrapeJs;

use Fayouz\Laminas\GrapeJs\Controller\IndexController;
use Fayouz\Laminas\GrapeJs\Controller\IndexControllerFactory;
use Fayouz\Laminas\GrapeJs\Controller\TemplateController;
use Fayouz\Laminas\GrapeJs\Controller\TemplateControllerFactory;
use Fayouz\Laminas\GrapeJs\Options\Options;
use Fayouz\Laminas\GrapeJs\Options\OptionsFactory;
use Fayouz\Laminas\GrapeJs\Service\GrapeJsService;
use Fayouz\Laminas\GrapeJs\Service\GrapeJsServiceFactory;
use Fayouz\Laminas\GrapeJs\Service\TemplateService;
use Fayouz\Laminas\GrapeJs\Service\TemplateServiceFactory;
use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;

return [
    'router' => [
      'routes' => [
          'grapejs' => [
              'type' => Literal::class,
              'options' => [
                  'route' => '/grapejs'
              ],
              'may_terminate' => false,
              'child_routes' => [
                  'classic' => [
                      'type' => Segment::class,
                      'options' => [
                          'route' => '[/:action]',
                          'defaults' => [
                              'controller' => IndexController::class,
                              'action' => 'index'
                          ]
                      ],
                  ],
                  'template' => [
                      'type' => Segment::class,
                      'options' => [
                          'route' => '/template[/:id]',
                          'constraints' => [
                              'id' => '[0-9]+'
                          ],
                          'defaults' => [
                              'controller' => TemplateController::class
                          ]
                      ],
                  ],
              ]
          ]
      ]
    ],
    'controllers' => [
        'factories' => [
            IndexController::class => IndexControllerFactory::class,
            TemplateController::class => TemplateControllerFactory::class,
        ]
    ],
    'service_manager' => [
        'factories'=>[
            GrapeJsService::class => GrapeJsServiceFactory::class,
            TemplateService::class => TemplateServiceFactory::class,
            Options::class => OptionsFactory::class
        ]
    ],
    'asset_manager' => [
        'resolver_configs' => [
            'paths' => [
                __DIR__ . '/../dist/',
            ],
        ],
    ],
    'view_manager'  => [
        'template_path_stack' => [
             __DIR__ . '/../view/laminas-grapejs-integration',
        ],
        'template_map' => [
            'grapejs/layout' => __DIR__ . '/../view/laminas-grapejs-integration/fayouz/laminas/grape-js/layout/layout.phtml'
        ]
    ],
    'grapejs' => [
        'template' => [
            'location' => __DIR__ . '/../../../../../data/templates'
        ],
        'blocks' => [
            [
                'id' => 'test',
                'label' => 'test',
                'attributes' => [
                    'class' => 'fa fa-th'
                ],
                'content' => 'coucou'
            ]
        ]
    ]
];
