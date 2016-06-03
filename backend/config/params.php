<?php
return [
    'adminEmail' => 'admin@example.com',
	'menus'      => [
		[
			'label'=>'直播管理',
			'menus' => [
				[
					'label' => '作业直播',
					'url'   => ['/homework']
				],
				[
					'label' => '文化直播',
					'url'   => ['/cultures']
				],
				[
					'label' => '艺术直播',
					'url'   => ['/arts']
				],
				[
					'label' => '直播收入',
					'menus' => [
						[
							'label' =>  '每日收入',
							'url'   => ['/online-income']
						],
						[
							'label' =>  '分类收入',
							'url'   => ['/online-income/category']
						],
					]
				],
			],
		],
		[
			'label'=>'视频管理',
			'menus' => [
				[
					'label' => '发布视频',
					'url'   => ['/videos/create']
				],
				[
					'label' => '所有视频',
					'url'   => ['/videos/index']
				],
				[
					'label' => '视频分类',
					'url'   => ['/videos/categories']
				],
				[
					'label' => '视频收入',
					'url'   => ['/videos/income']
				],
			],
		],
		[
			'label'=>'订单管理',
			'menus' => [
				[
					'label' => '所有订单',
					'url'   => ['/orders']
				],
				[
					'label' => '订单日志',
					'url'   => ['/order-log']
				],
			],
		],
		[
			'label'=>'我要教(学)',
			'menus' => [
				[
					'label' => '我要教',
					'url'   => ['/']
				],
				[
					'label' => '我要学',
					'url'   => ['/']
				]
			],
		],
		[
			'label'=>'教案管理',
			'menus' => [
				[
					'label' => '所有教案',
					'url'   => ['/teaching-plan']
				],
			],
		],
		[
			'label'=>'问答管理',
			'menus' => [
				[
					'label' => '在线问答',
					'url'   => ['/online-questions']
				],
				[
					'label' => '课后互动',
					'url'   => ['/after-class-interactive']
				]
			],
		],
		[
			'label'=>'作业管理',
			'menus' => [
				[
					'label'=>'所有作业',
					'url'  => ['/homework-after-class']
				],
			],
		],
		[
			'label'=>'作文管理',
			'menus' => [
				[
					'label'=>'发布作文',
					'url'  => ['/composition/create']
				],
				[
					'label'=>'所有作文',
					'url'  => ['/composition']
				],
			],
		],
		[
			'label'=>'CMS(内容管理系统)',
			'menus' => [
				[
					'label' => '发布文章',
					'url'   => ['/posts/create']
				],
				[
					'label' => '文章',
					'url'   => ['/posts']
				],
				[
					'label' => 'CMS分类',
					'url'   => ['/post-categories']
				],
			],
		],
		[
			'label' => '商城',
			'menus' => []
		],
		[
			'label' => '用户管理',
			'menus' => [
				[
					'label' => '学生管理',
					'url'   => ['/students']
				],
				[
					'label' => '老师管理',
					'url'   => ['/teachers']
				],
				[
					'label' => '机构管理',
					'url'   => ['/institutions']
				],

			]
		],
		[
			'label' => '友情链接',
			'menus' => [
				[
					'label'  => '所有链接',
					'url'    => ['/links']
				],
				[
					'label'  => '添加链接',
					'url'    => ['/links/create']
				]
			]
		],
		[
			'label' => '系统管理',
			'menus' => [
				[
					'label' => '管理员管理',
					'url'   => ['/admins']
				],
				[
					'label' => '焦点图',
					'url'   => ['/focus-map']
				]
			]
		],
	]
];
