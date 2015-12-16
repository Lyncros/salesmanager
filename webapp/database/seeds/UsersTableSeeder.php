<?php

class UsersTableSeeder extends BaseTableSeeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = array(
            [
                'firstname' => 'Camilo', 'lastname' => 'Gomez',
                'email' => 'camilo.gomez@cafedecolombia.com',
                'linkedin_profile' => 'https://co.linkedin.com/in/CamiloGomezGomez', 
                'password' => '$2y$10$iRUNNY14LFKjDwDiaLBYwecMd/xRTNWVoOW.fJjfgNhMc1XO1ffPq',
                'role' => 100,
            ],
            [
                'firstname' => 'Juliana', 'lastname' => 'Diaz',
                'email' => 'juliana.diaz@cafedecolombia.com',
                'linkedin_profile' => 'https://co.linkedin.com/in/juliana-diaz-montoya-451a241a', 
                'password' => '$2y$10$iRUNNY14LFKjDwDiaLBYwecMd/xRTNWVoOW.fJjfgNhMc1XO1ffPq',
                'role' => 100,
            ],
            [
                'firstname' => 'Lorena', 'lastname' => 'Serna',
                'email' => 'Lorena.Serna@cafedecolombia.com',
                'linkedin_profile' => 'https://co.linkedin.com/in/lorena-serna-zuluaga-88a5899b', 
                'password' => '$2y$10$iRUNNY14LFKjDwDiaLBYwecMd/xRTNWVoOW.fJjfgNhMc1XO1ffPq',
                'role' => 100,
            ],
            [
                'firstname' => 'Valentina', 'lastname' => 'Botero',
                'email' => 'valentina.botero@cafedecolombia.com',
                'linkedin_profile' => 'https://co.linkedin.com/in/valentinabotero', 
                'password' => '$2y$10$iRUNNY14LFKjDwDiaLBYwecMd/xRTNWVoOW.fJjfgNhMc1XO1ffPq',
                'role' => 100,
            ],
            [
                'firstname' => 'Natalia', 'lastname' => 'Jimenez',
                'email' => 'natalia.jimenez@cafedecolombia.com',
                'linkedin_profile' => 'https://co.linkedin.com/in/nataliajimenezr', 
                'password' => '$2y$10$iRUNNY14LFKjDwDiaLBYwecMd/xRTNWVoOW.fJjfgNhMc1XO1ffPq',
                'role' => 100,
            ],
            [
                'firstname' => 'Sebastian', 'lastname' => 'Uribe',
                'email' => 'suribe@buendiacoffee.com',
                'linkedin_profile' => 'https://www.linkedin.com/in/sebastian-uribe-704b0623/es', 
                'password' => '$2y$10$iRUNNY14LFKjDwDiaLBYwecMd/xRTNWVoOW.fJjfgNhMc1XO1ffPq',
                'role' => 100,
            ],
            [
                'firstname' => 'Manuel', 'lastname' => 'Mejia',
                'email' => 'mmejia@buendiacoffee.com',
                'linkedin_profile' => 'https://co.linkedin.com/in/manuel-mejía-arango-5a4730a3', 
                'password' => '$2y$10$iRUNNY14LFKjDwDiaLBYwecMd/xRTNWVoOW.fJjfgNhMc1XO1ffPq',
                'role' => 100,
            ],
            [
                'firstname' => 'Jia-Hang', 'lastname' => 'Wu',
                'email' => 'wjh@cafedecolombia.cn',
                'linkedin_profile' => 'https://cn.linkedin.com/in/jiahang-wu-4a8b954b/es', 
                'password' => '$2y$10$iRUNNY14LFKjDwDiaLBYwecMd/xRTNWVoOW.fJjfgNhMc1XO1ffPq',
                'role' => 100,
            ],
            [
                'firstname' => 'Jiro', 'lastname' => 'Muramatsu',
                'email' => 'jmuramatsu@cafedecolombia.com.co', 
                'linkedin_profile' => '', 
                'password' => '$2y$10$iRUNNY14LFKjDwDiaLBYwecMd/xRTNWVoOW.fJjfgNhMc1XO1ffPq',
                'role' => 100,
            ],
            [
                'firstname' => 'Federico', 'lastname' => 'Gomez',
                'email' => 'Federico.Gomez@cafedecolombia.com',
                'linkedin_profile' => 'https://co.linkedin.com/in/federicogomezg', 
                'password' => '$2y$10$iRUNNY14LFKjDwDiaLBYwecMd/xRTNWVoOW.fJjfgNhMc1XO1ffPq',
                'role' => 1000,
            ],
            [
                'firstname' => 'Cristina', 'lastname' => 'Madriña',
                'email' => 'Cristina.Madrinan@cafedecolombia.com',
                'linkedin_profile' => 'https://co.linkedin.com/in/cristina-madriñan-rivas-114ab165', 
                'password' => '$2y$10$iRUNNY14LFKjDwDiaLBYwecMd/xRTNWVoOW.fJjfgNhMc1XO1ffPq',
                'role' => 1000,
            ],

    	);

    	$this->loadData('users', $data, 'App\User');
    }
}
