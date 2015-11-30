<?php 

class ContactsTableSeeder extends BaseTableSeeder {

    public function run() {
        $contacts = array(
            [
                'consolidated_code' => '#10000001',
                'ten_digits_code' => '0010000001',
                'honorific' => 'Mr.',
                'firstname' => 'Mick',
                'lastname' => 'Jagger',
                'company' => 'Rolling Stones S.A.',
                'phone' => '5555-1111',
                'skype' => 'mick.jagger',
                'email' => 'mick@rollingstones.com',
                'position' => '',
                'id_market' => 4,
                'street' => '321 Abbey Road',
                'city' => 'Knebworth, London',
                'id_country' => 192,
                'postal_code' => '14280',
                'language' => 'English',
                'id_contact_type' => 1,
                'id_group_area' => 1,
                'career' => 'singer, vocals',
                'linkedin_profile' => 'https://ar.linkedin.com/in/mick-jagger-40446313',
            ],
            [
                'consolidated_code' => '#10000002',
                'honorific' => 'Mr.',
                'firstname' => 'Keith',
                'lastname' => 'Richards',
                'company' => 'Rolling Stones S.A.',
                'phone' => '5555-2222',
                'skype' => 'keith.richards',
                'email' => 'keith@rollingstones.com',
                'position' => 'Lead guitar',
                'id_market' => 4,
                'street' => '321 Abbey Road',
                'city' => 'Knebworth, London',
                'id_country' => 192,
                'postal_code' => '14280',
                'language' => 'English',
                'id_contact_type' => 2,
                'id_group_area' => 1,
                'career' => 'guitar and melodiy',
                'linkedin_profile' => '',
            ],
            [
                'consolidated_code' => '#10000003',
                'honorific' => 'Mr.',
                'firstname' => 'Charlie',
                'lastname' => 'Watts',
                'company' => 'Rolling Stones S.A.',
                'phone' => '5555-3333',
                'skype' => 'charlie.watts',
                'email' => 'charlie@rollingstones.com',
                'position' => 'Drums',
                'id_market' => 4,
                'street' => '321 Abbey Road',
                'city' => 'Knebworth, London',
                'id_country' => 192,
                'postal_code' => '14280',
                'language' => 'English',
                'id_contact_type' => 3,
                'id_group_area' => 1,
                'career' => 'rithm',
                'linkedin_profile' => '',
            ],
            [
                'consolidated_code' => '#10000004',
                'honorific' => 'Mr.',
                'firstname' => 'Ron',
                'lastname' => 'Wood',
                'company' => 'Rolling Stones S.A.',
                'phone' => '5555-4444',
                'skype' => 'ron.wood',
                'email' => 'ron@rollingstones.com',
                'position' => 'Second guitar',
                'id_market' => 4,
                'street' => '321 Abbey Road',
                'city' => 'Knebworth, London',
                'id_country' => 192,
                'postal_code' => '14280',
                'language' => 'English',
                'id_contact_type' => 4,
                'id_group_area' => 1,
                'career' => 'melodic guitar',
                'linkedin_profile' => '',
            ],
            [
                'consolidated_code' => '#10001001',
                'honorific' => 'Mr.',
                'firstname' => 'Roger',
                'lastname' => 'Waters',
                'company' => 'Pink FLoyd S.A.',
                'phone' => '5555-4444',
                'skype' => 'roger.waters',
                'email' => 'roger@pinkfloyd.com',
                'position' => 'Bass',
                'id_market' => 4,
                'street' => '321 Abbey Road',
                'city' => 'Knebworth, London',
                'id_country' => 192,
                'postal_code' => '14280',
                'language' => 'English',
                'id_contact_type' => 4,
                'id_group_area' => 1,
                'career' => 'bass & composer',
                'linkedin_profile' => '',
            ],
            [
                'consolidated_code' => '#10001002',
                'honorific' => 'Mr.',
                'firstname' => 'David',
                'lastname' => 'Gilmour',
                'company' => 'Pink Floyd S.A.',
                'phone' => '5555-4444',
                'skype' => 'david.gilmour',
                'email' => 'david@pinkfloyd.com',
                'position' => 'Guitar',
                'id_market' => 4,
                'street' => '321 Abbey Road',
                'city' => 'Knebworth, London',
                'id_country' => 192,
                'postal_code' => '14280',
                'language' => 'English',
                'id_contact_type' => 4,
                'id_group_area' => 1,
                'career' => 'guitar & composer',
                'linkedin_profile' => '',
            ],
            [
                'consolidated_code' => '#10001003',
                'honorific' => 'Mr.',
                'firstname' => 'Syd',
                'lastname' => 'Barret',
                'company' => 'Pink Floyd S.A.',
                'phone' => '5555-4444',
                'skype' => 'syd.barret',
                'email' => 'syd@pinkfloyd.com',
                'position' => 'Second guitar',
                'id_market' => 4,
                'street' => '321 Abbey Road',
                'city' => 'Knebworth, London',
                'id_country' => 192,
                'postal_code' => '14280',
                'language' => 'English',
                'id_contact_type' => 4,
                'id_group_area' => 1,
                'career' => 'melodic guitar',
                'linkedin_profile' => '',
            ],
            [
                'consolidated_code' => '#10001004',
                'honorific' => 'Mr.',
                'firstname' => 'Nick',
                'lastname' => 'Mason',
                'company' => 'Pink Floyd S.A.',
                'phone' => '5555-4444',
                'skype' => 'nick.mason',
                'email' => 'nick@pinkfloyd.com',
                'position' => 'Drums',
                'id_market' => 4,
                'street' => '321 Abbey Road',
                'city' => 'Knebworth, London',
                'id_country' => 192,
                'postal_code' => '14280',
                'language' => 'English',
                'id_contact_type' => 4,
                'id_group_area' => 1,
                'career' => 'drums',
                'linkedin_profile' => '',
            ],
            [
                'consolidated_code' => '#10002001',
                'honorific' => 'Mr.',
                'firstname' => 'John',
                'lastname' => 'Lennon',
                'company' => 'Beatles S.A.',
                'phone' => '5555-4444',
                'skype' => 'john.lennon',
                'email' => 'john@beatles.com',
                'position' => 'Piano & vocals',
                'id_market' => 4,
                'street' => '321 Abbey Road',
                'city' => 'Knebworth, London',
                'id_country' => 192,
                'postal_code' => '14280',
                'language' => 'English',
                'id_contact_type' => 4,
                'id_group_area' => 1,
                'career' => 'guitar & composer',
                'linkedin_profile' => '',
            ],
            [
                'consolidated_code' => '#10002002',
                'honorific' => 'Mr.',
                'firstname' => 'Paul',
                'lastname' => 'McCartney',
                'company' => 'Beatles S.A.',
                'phone' => '5555-4444',
                'skype' => 'paul.mccartney',
                'email' => 'paul@beatles.com',
                'position' => 'Bass',
                'id_market' => 4,
                'street' => '321 Abbey Road',
                'city' => 'Knebworth, London',
                'id_country' => 192,
                'postal_code' => '14280',
                'language' => 'English',
                'id_contact_type' => 4,
                'id_group_area' => 1,
                'career' => 'bass & composer',
                'linkedin_profile' => '',
            ],
            [
                'consolidated_code' => '#10002003',
                'honorific' => 'Mr.',
                'firstname' => 'George',
                'lastname' => 'Harrison',
                'company' => 'Beatles S.A.',
                'phone' => '5555-4444',
                'skype' => 'george.harrison',
                'email' => 'george@beatles.com',
                'position' => 'Guitar',
                'id_market' => 4,
                'street' => '321 Abbey Road',
                'city' => 'Knebworth, London',
                'id_country' => 192,
                'postal_code' => '14280',
                'language' => 'English',
                'id_contact_type' => 4,
                'id_group_area' => 1,
                'career' => 'melodic guitar',
                'linkedin_profile' => '',
            ],
            [
                'consolidated_code' => '#10002004',
                'honorific' => 'Mr.',
                'firstname' => 'Ringo',
                'lastname' => 'Star',
                'company' => 'Beatles S.A.',
                'phone' => '5555-4444',
                'skype' => 'ringo.star',
                'email' => 'ringo@beatles.com',
                'position' => 'Drums',
                'id_market' => 4,
                'street' => '321 Abbey Road',
                'city' => 'Knebworth, London',
                'id_country' => 192,
                'postal_code' => '14280',
                'language' => 'English',
                'id_contact_type' => 4,
                'id_group_area' => 1,
                'career' => 'drums',
                'linkedin_profile' => '',
            ]
        );
            
        $this->loadData('contacts', $contacts, 'App\Contact');
    }


}