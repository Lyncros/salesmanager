<?php 

class ContactsTableSeeder extends BaseTableSeeder {

    public function run() {
        $contacts = array(
            [
                'consolidated_code' => '#10000001',
                'ten_digits_code' => '0010000001',
                'sap_code' => 'SAP0010000001',
                'id_honorific' => 3,
                'firstname' => 'Mick',
                'lastname' => 'Jagger',
                'company_area' => 'band',
                'company_name' => 'Rolling Stones S.A.',
                'phone' => '5555-1111',
                'skype' => 'mick.jagger',
                'email' => 'mick@rollingstones.com',
                'position' => '',
                'id_market' => 4,
                'street' => '321 Abbey Road',
                'region' => 'London',
                'city' => 'Knebworth',
                'id_country' => 192,
                'postal_code' => '14280',
                'id_language' => 2,
                'id_contact_type' => 1,
                'id_group_area' => 1,
                'career' => 'singer, vocals',
                'linkedin_profile' => 'https://ar.linkedin.com/in/mick-jagger-40446313',
                'christmas_presents' => true,
                'action' => true,
            ],
            [
                'consolidated_code' => '#10000002',
                'id_honorific' => 3,
                'firstname' => 'Keith',
                'lastname' => 'Richards',
                'company_area' => 'band',
                'company_name' => 'Rolling Stones S.A.',
                'phone' => '5555-2222',
                'skype' => 'keith.richards',
                'email' => 'keith@rollingstones.com',
                'position' => 'Lead guitar',
                'id_market' => 4,
                'street' => '321 Abbey Road',
                'region' => 'London',
                'city' => 'Knebworth',
                'id_country' => 192,
                'postal_code' => '14280',
                'id_language' => 2,
                'id_contact_type' => 2,
                'id_group_area' => 1,
                'career' => 'guitar and melodiy',
                'linkedin_profile' => '',
            ],
            [
                'consolidated_code' => '#10000003',
                'id_honorific' => 3,
                'firstname' => 'Charlie',
                'lastname' => 'Watts',
                'company_area' => 'band',
                'company_name' => 'Rolling Stones S.A.',
                'phone' => '5555-3333',
                'skype' => 'charlie.watts',
                'email' => 'charlie@rollingstones.com',
                'position' => 'Drums',
                'id_market' => 4,
                'street' => '321 Abbey Road',
                'region' => 'London',
                'city' => 'Knebworth',
                'id_country' => 192,
                'postal_code' => '14280',
                'id_language' => 2,
                'id_contact_type' => 3,
                'id_group_area' => 1,
                'career' => 'rithm',
                'linkedin_profile' => '',
            ],
            [
                'consolidated_code' => '#10000004',
                'id_honorific' => 3,
                'firstname' => 'Ron',
                'lastname' => 'Wood',
                'company_area' => 'band',
                'company_name' => 'Rolling Stones S.A.',
                'phone' => '5555-4444',
                'skype' => 'ron.wood',
                'email' => 'ron@rollingstones.com',
                'position' => 'Second guitar',
                'id_market' => 4,
                'street' => '321 Abbey Road',
                'region' => 'London',
                'city' => 'Knebworth',
                'id_country' => 192,
                'postal_code' => '14280',
                'id_language' => 2,
                'id_contact_type' => 4,
                'id_group_area' => 1,
                'career' => 'melodic guitar',
                'linkedin_profile' => '',
            ],
            [
                'consolidated_code' => '#10001001',
                'id_honorific' => 3,
                'firstname' => 'Roger',
                'lastname' => 'Waters',
                'company_area' => 'band',
                'company_name' => 'Pink FLoyd S.A.',
                'phone' => '5555-4444',
                'skype' => 'roger.waters',
                'email' => 'roger@pinkfloyd.com',
                'position' => 'Bass',
                'id_market' => 4,
                'street' => '321 Abbey Road',
                'region' => 'London',
                'city' => 'Knebworth',
                'id_country' => 192,
                'postal_code' => '14280',
                'id_language' => 2,
                'id_contact_type' => 4,
                'id_group_area' => 1,
                'career' => 'bass & composer',
                'linkedin_profile' => '',
            ],
            [
                'consolidated_code' => '#10001002',
                'id_honorific' => 3,
                'firstname' => 'David',
                'lastname' => 'Gilmour',
                'company_area' => 'band',
                'company_name' => 'Pink Floyd S.A.',
                'phone' => '5555-4444',
                'skype' => 'david.gilmour',
                'email' => 'david@pinkfloyd.com',
                'position' => 'Guitar',
                'id_market' => 4,
                'street' => '321 Abbey Road',
                'region' => 'London',
                'city' => 'Knebworth',
                'id_country' => 192,
                'postal_code' => '14280',
                'id_language' => 2,
                'id_contact_type' => 4,
                'id_group_area' => 1,
                'career' => 'guitar & composer',
                'linkedin_profile' => '',
            ],
            [
                'consolidated_code' => '#10001003',
                'id_honorific' => 3,
                'firstname' => 'Syd',
                'lastname' => 'Barret',
                'company_area' => 'band',
                'company_name' => 'Pink Floyd S.A.',
                'phone' => '5555-4444',
                'skype' => 'syd.barret',
                'email' => 'syd@pinkfloyd.com',
                'position' => 'Second guitar',
                'id_market' => 4,
                'street' => '321 Abbey Road',
                'region' => 'London',
                'city' => 'Knebworth',
                'id_country' => 192,
                'postal_code' => '14280',
                'id_language' => 2,
                'id_contact_type' => 4,
                'id_group_area' => 1,
                'career' => 'melodic guitar',
                'linkedin_profile' => '',
            ],
            [
                'consolidated_code' => '#10001004',
                'id_honorific' => 3,
                'firstname' => 'Nick',
                'lastname' => 'Mason',
                'company_area' => 'band',
                'company_name' => 'Pink Floyd S.A.',
                'phone' => '5555-4444',
                'skype' => 'nick.mason',
                'email' => 'nick@pinkfloyd.com',
                'position' => 'Drums',
                'id_market' => 4,
                'street' => '321 Abbey Road',
                'region' => 'London',
                'city' => 'Knebworth',
                'id_country' => 192,
                'postal_code' => '14280',
                'id_language' => 2,
                'id_contact_type' => 4,
                'id_group_area' => 1,
                'career' => 'drums',
                'linkedin_profile' => '',
            ],
            [
                'consolidated_code' => '#10002001',
                'id_honorific' => 3,
                'firstname' => 'John',
                'lastname' => 'Lennon',
                'company_area' => 'band',
                'company_name' => 'Beatles S.A.',
                'phone' => '5555-4444',
                'skype' => 'john.lennon',
                'email' => 'john@beatles.com',
                'position' => 'Piano & vocals',
                'id_market' => 4,
                'street' => '321 Abbey Road',
                'region' => 'London',
                'city' => 'Knebworth',
                'id_country' => 192,
                'postal_code' => '14280',
                'id_language' => 2,
                'id_contact_type' => 4,
                'id_group_area' => 1,
                'career' => 'guitar & composer',
                'linkedin_profile' => '',
            ],
            [
                'consolidated_code' => '#10002002',
                'id_honorific' => 3,
                'firstname' => 'Paul',
                'lastname' => 'McCartney',
                'company_area' => 'band',
                'company_name' => 'Beatles S.A.',
                'phone' => '5555-4444',
                'skype' => 'paul.mccartney',
                'email' => 'paul@beatles.com',
                'position' => 'Bass',
                'id_market' => 4,
                'street' => '321 Abbey Road',
                'region' => 'London',
                'city' => 'Knebworth',
                'id_country' => 192,
                'postal_code' => '14280',
                'id_language' => 2,
                'id_contact_type' => 4,
                'id_group_area' => 1,
                'career' => 'bass & composer',
                'linkedin_profile' => '',
            ],
            [
                'consolidated_code' => '#10002003',
                'id_honorific' => 3,
                'firstname' => 'George',
                'lastname' => 'Harrison',
                'company_area' => 'band',
                'company_name' => 'Beatles S.A.',
                'phone' => '5555-4444',
                'skype' => 'george.harrison',
                'email' => 'george@beatles.com',
                'position' => 'Guitar',
                'id_market' => 4,
                'street' => '321 Abbey Road',
                'region' => 'London',
                'city' => 'Knebworth',
                'id_country' => 192,
                'postal_code' => '14280',
                'id_language' => 2,
                'id_contact_type' => 4,
                'id_group_area' => 1,
                'career' => 'melodic guitar',
                'linkedin_profile' => '',
            ],
            [
                'consolidated_code' => '#10002004',
                'id_honorific' => 3,
                'firstname' => 'Ringo',
                'lastname' => 'Star',
                'company_area' => 'band',
                'company_name' => 'Beatles S.A.',
                'phone' => '5555-4444',
                'skype' => 'ringo.star',
                'email' => 'ringo@beatles.com',
                'position' => 'Drums',
                'id_market' => 4,
                'street' => '321 Abbey Road',
                'region' => 'London',
                'city' => 'Knebworth',
                'id_country' => 192,
                'postal_code' => '14280',
                'id_language' => 2,
                'id_contact_type' => 4,
                'id_group_area' => 1,
                'career' => 'drums',
                'linkedin_profile' => '',
            ]
        );
            
        //$this->loadData('contacts', $contacts, 'App\Contact');
    }


}
